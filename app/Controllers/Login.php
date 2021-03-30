<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MembersModel;

class Login extends Controller
{
    public function index()
    {
        helper(['from']);
        echo view('/templates/header', ['title' => 'Connexion From LoginController']);
        echo view('/');
        echo view('/templates/footer');
    }

    public function auth()
    {
        $session = session();
        $model = new MembersModel();
        $mail = $this->request->getVar('mail');
        $password = $this->request->getVar('password');
        $data = $model->where('mail', $mail)->first();

        if ($data) {
            $memberPass = $data['password'];
            $verifyPass = password_verify($password, $memberPass);
            if ($verifyPass) {
                $sessionData = [
                    'user_id' => $data['id'],
                    'user_pseudo' => $data['pseudo'],
                    'user_mail' => $data['mail'],
                    'logged_in' => true,
                ];
                $session->set($sessionData);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashData('msg', 'Wrong Password');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashData('msg', 'Email not found');
            return redirect()->to('/');
            // print_r('var mail' . $this->request->getVar('email'));
            // echo '<br>-------------------------------<br>';
            // print_r('var password' . $this->request->getVar('password'));
            // echo '<br>-------------------------------<br>';
            // print_r('mail' . $mail);
            // echo '<br>-------------------------------<br>';
            // print_r('password' . $password);
            // echo '<br>-------------------------------<br>';
            // print_r('data' . $data);

        }
    }

    public function logout()
    {
          $session = session();
          $session->destroy();
          return redirect()->to('/index');
    }
}
