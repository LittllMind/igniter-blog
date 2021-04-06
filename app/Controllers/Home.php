<?php

namespace App\Controllers;

use App\Models\MembersModel;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'C D A D';

        echo view('/templates/header', $data);
        echo view('/pages/index');
        echo view('/templates/footer');
    }

    public function login()
    {
        $data['title'] = 'Login';

        echo view('/templates/header', $data);
        echo view('/member/logIn');
        echo view('/templates/footer');
    }
}
