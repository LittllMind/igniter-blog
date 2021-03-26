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
        $model = new MembersModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
          'pseudo' => [
            'label' => 'pseudo',
            'rules' => 'required|min_length[3]|max_length[15]',
            'errors' => [
                'required' => 'All accounts must have {field} provided',
                'min_length' => 'Pseudo is too short',
                'max_length' => 'Pseudo is too long'
            ]
          ],
          'mail' => [
            'label' => 'mail',
            'rules' => 'required|valid_email',
            'errors' => [
              'required' => 'All accounts must have {field} provided',
              'valid_email' => 'Please check the email field, It does not appear to be valid.'
            ]
          ],
          'password' => [
              'label' => 'password',
              'rules' => 'required|min_length[6]',
              'errors' => [
                'required' => 'All accounts must have {field} provided',
                'min_length' => 'Your password is too short. You want to get hacked ?'
              ]
            ],
            'password' => [
                'label' => 'pass_confirm',
                'rules' => 'required|min_length[6]|matches[password]',
                'errors' => [
                  'required' => 'All accounts must have {field} provided',
                  'min_length' => 'Your password is too short. You want to get hacked ?',
                  'matches' => 'Passwords don\'t match'
            ]
          ]
        ]);

        // $data['newMember'] = [
        //   'pseudo' => $this->request->getPost('pseudo'),
        //   'mail' => $this->request->getPost('mail'),
        //   'password' => $this->request->getPost('password'),
        //   'pass_confirm' => $this->request->getPost('pass_confirm'),
        // ];
        //
        // $validation->run($data, 'signUp');

        if ($this->request->getMethod() == 'post' && $this->validate([
            'pseudo' => 'required|min_length[3]|max_length[15]',
            'mail' => 'required',
            'password' => 'required',
        ])) {
            $model->save([
                'pseudo' => $this->request->getPost('pseudo'),
                'password' => $this->request->getPost('password'),
                'mail' => $this->request->getPost('mail')
            ]);
            echo view('templates/header', ['title' => 'Create a new Member']);
            echo view('member/success');
            echo view('templates/footer');
        } else {
            echo view('templates/header', ['title' => 'Create a new Member']);
            echo view('member/create');
            echo view('templates/footer');
        }
    }
}
