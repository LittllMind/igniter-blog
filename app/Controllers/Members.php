<?php

namespace App\Controllers;

use App\Models\MembersModel;
use CodeIgniter\Controller;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\IncomingRequest;

class Members extends Controller
{
    public function index()
    {
        $model = new MembersModel();
        $data = [
            'members' => $model->getMembers(),
            'title' => 'Members archive'
        ];

        echo view('templates/header', $data);
        echo view('member/membersOverview', $data);
        echo view('templates/footer', $data);
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



    public function create()
    {
        $validation = \Config\Services::validation();
        helper(['form', 'url']);


        $data = [
            'pseudo' => $this->request->getPost('pseudo'),
            'mail' => $this->request->getPost('mail'),
            'password' => $this->request->getPost('password'),
            'pass_confirm' => $this->request->getPost('pass_confirm'),
        ];


        $validation->run($data, 'signUp');

        if (empty($data['pseudo'])) {
            if (!$this->validate([])) {
                echo view('templates/header', ['title' => 'create account']);
                echo view('member/create', ['validation' => $this->validator]);
                echo view('templates/footer');
            }
        } else {
            $model = new MembersModel();
            $model->save([
              'pseudo' => $this->request->getPost('pseudo'),
              'password' => $this->request->getPost('password'),
              'mail' => $this->request->getPost('mail')
            ]);
            echo view('templates/header', ['title' => 'Account succesfully created']);
            echo view('member/success');
            echo view('templates/footer');
        }

        // if (!$this->validate([])) {
        //     echo view('templates/header', ['title' => 'create account']);
        //     echo view('member/create', ['validation' => $this->validator]);
        //     echo view('templates/footer');
        // } else {
        //     // $model = new MembersModel();
        //     // $model->save([
        //     //   'pseudo' => $this->request->getPost('pseudo'),
        //     //   'password' => $this->request->getPost('password'),
        //     //   'mail' => $this->request->getPost('mail')
        //     // ]);
        //       echo view('templates/header', ['title' => 'Account succesfully created']);
        //       echo view('member/success');
        //       echo view('templates/footer');
        // }
    }

    public function create1()
    {
        $validation = \Config\Services::validation();
        helper(['form', 'url']);


        $data = [
            'pseudo' => $this->request->getPost('pseudo'),
            'mail' => $this->request->getPost('mail'),
            'password' => $this->request->getPost('password'),
            'pass_confirm' => $this->request->getPost('pass_confirm'),
        ];

        $validation->run($data, 'signUp');

        if (empty($this->validate([]))) {

                $model = new MembersModel();

                $model->save([
                  'pseudo' => $this->request->getPost('pseudo'),
                  'password' => $this->request->getPost('password'),
                  'mail' => $this->request->getPost('mail')
                ]);
                echo view('templates/header', ['title' => 'Account succesfully created']);
                echo view('member/success');
                echo view('templates/footer');

        } else {
            echo view('templates/header', ['title' => 'create account']);
            echo view('member/create', ['validation' => $this->validator]);
            echo view('templates/footer');
        }
    }
}
