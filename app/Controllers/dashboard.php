<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class DashBoard extends Controller
{
    public function index()
    {
        $session = session();
        $data = [
          'title' => 'Welcome back '. $session->get('user_pseudo'),
          'session' => $session,
        ];

        echo view('templates/header', $data);
        echo view('pages/dashboard', $data);
        echo view('templates/footer');
        // echo '<br><p> <a href="/logout">Logout</a></p><br>';
        // echo view('templates/header', ['title' => 'Dashboard']);
        // echo "Welcome back, ".$session->get('user_pseudo');
        // echo "<br>Mail : ".$session->get('user_mail');
        // echo "<br> Password ".$session->get('user_password');
        // echo "<br> Logged_in : ".$session->get('logged_in');
        // echo view('templates/footer');
    }
}
