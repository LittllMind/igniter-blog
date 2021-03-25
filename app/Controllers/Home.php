<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Acceuil';
        echo view('/templates/header', $data);
        echo view('/pages/index');
        echo view('/templates/footer');
    }

    // public function signIn()
    // {
    //     echo $data
    // }
}
