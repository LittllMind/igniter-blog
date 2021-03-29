<?php
namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [];
        return view('templates/header', $data);
        return view('dashboard', $data);
        return view('templates/footer');
    }
}
