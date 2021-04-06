<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Calendar extends Controller
{
    public function index()
    {
        $num_mois = date("n");
        $num_an = date("Y");

        $data = [
          'mois' => $num_mois,
          'annee' => $num_an,
        ];
        echo view('pages/calendar', $data);
    }

    public function changeMonth($num_mois, $num_an)
    {
        $data = [
          'mois' => $num_mois,
          'annee' => $num_an
        ];

        echo view('pages/calendar', $data);
    }
}
