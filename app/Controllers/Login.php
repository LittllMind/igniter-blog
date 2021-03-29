<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);


        if ($this->request->getMethod() == 'post') {
          //let's do the validation here
            $rules = [
              'email' => 'required|min_length[6]|max_length[50]|valid_email',
              'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
              'password' => [
                'validateUser' => 'Email or Password don\'t match'
              ]
            ];

            if (! $this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))->first();

                $this->setUserSession($user);
                //$session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('dashboard');
            }
        }

        return view('login', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'pseudo' => $user['pseudo'],
            'mail' => $user['mail'],
            'password' => $user['id'],
            'isLoggedIn' => true
          ];

          session()->set($data);
          return true;
    }

    public function register() {
        $data = [];
        helper(['form']);

        if (! $this->validation->request->getMethod() == 'post') {
          // let's do the validation here
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
              ];

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new MembersModel;

                $newData = [
                    'pseudo' => $this->request->getVar('pseudo'),
                    'mail' => $this->request->getVar('mail,'),
                    'password' => $this->request->getVar('password')
                ];

                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');

                return redirect()->to('/');
            }
        }
        return view('register', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
