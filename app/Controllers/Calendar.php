<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Calendar extends Controller
{
    public function index()
    {
        echo view('pages/calendar');
    }
}
