<?php

namespace App\Controllers;

use App\Models\MembersModel;
use CodeIgniter\Controller;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\IncomingRequest;

class Members extends Controller
{

    public function create()
    {
        echo view('templates/header', ['title' => 'create account']);
        echo view('member/create');
        echo view('templates/footer');
    }

    public function createMemberValidation()
    {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();

        $input = $this->validate([
            'pseudo' => 'required|min_length[3]',
            'mail' => 'required|valid_email',
            'password' => 'required',
            'pass_confirm' => 'required'
        ]);

        $data = [
            'pseudo' => $this->request->getPost('pseudo'),
            'mail' => $this->request->getPost('mail'),
            'password' => $this->request->getPost('password'),
            'pass_confirm' => $this->request->getPost('pass_confirm'),
        ];


        $memberModel = new MembersModel();

        $validation->run($data, 'signUp');


        $pseudo = $this->request->getVar('pseudo');
        $check_pseudo = $memberModel->getMemberByPseudo($pseudo);
        print_r($check_pseudo);

        $mail = $this->request->getVar('mail');
        $check_mail = $memberModel->getMemberByMail($mail);
        print_r($check_mail);

        if (!$input) {
            echo view('templates/header', ['title' => 'create account']);
            echo view('member/create', [
                'validation' => $this->validator
            ]);
            echo view('templates/footer');
        } elseif (!empty($check_pseudo)) {
            echo view('templates/header', ['title' => 'create account']);
            echo view('member/create', [
                'validation' => $this->validator
            ]);
            echo view('templates/footer');
        } else {
            $password_hash = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
            $memberModel->save([
                'pseudo' => $this->request->getVar('pseudo'),
                'mail' => $this->request->getVar('mail'),
                'password' => $password_hash
              ]);
              echo view('templates/header', ['title' => 'Account succesfully created !']);
              echo view('member/success');
              echo view('templates/footer');
        }
    }

    public function signIn()
    {
        $model = new MembersModel();

        $request = service('request');

        $request->uri->getPath();

        $pseudo = $request->getPost('pseudo');
        $password = $request->getPost('password');

        print_r($pseudo);
        print_r($password);
        $data = [
            'member' => $model->getMemberByPseudo($pseudo),
            'title' => 'Connection Test'
        ];
        print_r($data);
        print_r($data['member']['pseudo']);
        // if (empty($data['member'])) {
        //     throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the ');
        // }
        //
        //
        //
            echo view('templates/header', $data);
            echo view('member/memberHome', $data);
            echo view('templates/footer');
    }

    public function memberView($userId = null)
    {
        $model = new MembersModel();

        $data['member'] = $model->getMembers($userId);

        if (empty($data['member'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the ' . $userId);
        }

        $data['title'] = $data['member']['pseudo'];

        echo view('templates/header', $data);
        echo view('member/memberView', $data);
        echo view('templates/footer', $data);
    }



    // public function create2()
    // {
    //     $validation = \Config\Services::validation();
    //     helper(['form', 'url']);
    //
    //
    //     $data = [
    //         'pseudo' => $this->request->getPost('pseudo'),
    //         'mail' => $this->request->getPost('mail'),
    //         'password' => $this->request->getPost('password'),
    //         'pass_confirm' => $this->request->getPost('pass_confirm'),
    //     ];
    //
    //
    //     $validation->run($data, 'signUp');
    //
    //     if (empty($data['pseudo'])) {
    //         if (!$this->validate([])) {
    //             echo view('templates/header', ['title' => 'create account']);
    //             echo view('member/create', ['validation' => $this->validator]);
    //             echo view('templates/footer');
    //         }
    //     } else {
    //         $model = new MembersModel();
    //
    //         $password_hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    //
    //         $model->save([
    //           'pseudo' => $this->request->getPost('pseudo'),
    //           'password' => $password_hash,
    //           'mail' => $this->request->getPost('mail')
    //         ]);
    //         echo view('templates/header', ['title' => 'Account succesfully created']);
    //         echo view('member/success');
    //         echo view('templates/footer');
    //     }
    //
    //     // if (!$this->validate([])) {
    //     //     echo view('templates/header', ['title' => 'create account']);
    //     //     echo view('member/create', ['validation' => $this->validator]);
    //     //     echo view('templates/footer');
    //     // } else {
    //     //     // $model = new MembersModel();
    //     //     // $model->save([
    //     //     //   'pseudo' => $this->request->getPost('pseudo'),
    //     //     //   'password' => $this->request->getPost('password'),
    //     //     //   'mail' => $this->request->getPost('mail')
    //     //     // ]);
    //     //       echo view('templates/header', ['title' => 'Account succesfully created']);
    //     //       echo view('member/success');
    //     //       echo view('templates/footer');
    //     // }
    // }
    //
    // public function create1()
    // {
    //     $validation = \Config\Services::validation();
    //     helper(['form', 'url']);
    //
    //
    //     $data = [
    //         'pseudo' => $this->request->getPost('pseudo'),
    //         'mail' => $this->request->getPost('mail'),
    //         'password' => $this->request->getPost('password'),
    //         'pass_confirm' => $this->request->getPost('pass_confirm'),
    //     ];
    //
    //     $validation->run($data, 'signUp');
    //
    //     if (empty($this->validate([]))) {
    //
    //             $model = new MembersModel();
    //
    //             $model->save([
    //               'pseudo' => $this->request->getPost('pseudo'),
    //               'password' => $this->request->getPost('password'),
    //               'mail' => $this->request->getPost('mail')
    //             ]);
    //             echo view('templates/header', ['title' => 'Account succesfully created']);
    //             echo view('member/success');
    //             echo view('templates/footer');
    //
    //     } else {
    //         echo view('templates/header', ['title' => 'create account']);
    //         echo view('member/create', ['validation' => $this->validator]);
    //         echo view('templates/footer');
    //     }
    // }
}
