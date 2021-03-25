<?php

namespace App\Controllers;

use App\Models\MembersModel;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Acceuil';

        echo view('/templates/header', $data);
        echo view('/pages/index');
        echo view('/templates/footer');
    }
}
