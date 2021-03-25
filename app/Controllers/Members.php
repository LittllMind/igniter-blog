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
        // $model = new MembersModel();

        $request = service('request');

        $request->uri->getPath();

        $pseudo = $request->getPost('pseudo');

            print_r($pseudo);

  



        // $requestData = [
        //     'pseudo' => $request->getPost('pseudo'),
        //     'password' => $request->getPost('password')
        // ];
        // $data = [
        //     'member' => $model->getMemberByPseudo($pseudo),
        //     'title' => 'Connection Test'
        // ];
        // if (empty($data['member'])) {
        //     throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the ');
        // }
        //
        //
        //
        //     echo view('templates/header', $data);
        //     echo view('member/memberHome', $data);
        //     echo view('templates/footer');
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

        if ($this->request->getMethod() == 'post' && $this->validate([
            'pseudo' => 'required|min_length[3]|max_length[15]',
            'password' => 'required',
            'mail' => 'required'
        ])) {
            $model->save([
                'pseudo' => $this->request->getPost('pseudo'),
                'password' => $this->request->getPost('password'),
                'mail' => $this->request->getPost('mail')
            ]);

            echo view('member/success');
        } else {
            echo view('templates/header', ['title' => 'Create a new Member']);
            echo view('member/create');
            echo view('templates/footer');
        }
    }
}
