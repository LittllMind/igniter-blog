<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class DashBoard extends Controller
{
    public function index()
    {
        $session = session();
        echo "Welcome back, ".$session->get('user_pseudo');
    }
}
