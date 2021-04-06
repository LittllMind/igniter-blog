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
          'title' => ''
        ];

        echo view('templates/header', $data);
        echo view('pages/calendar', $data);
        echo view('templates/footer');
    }

    public function changeMonth($num_mois, $num_an)
    {

        $tab_mois = array("","Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre");
        $data = [
          'mois' => $num_mois,
          'annee' => $num_an,
          'title' => $tab_mois[$num_mois],
        ];

        echo view('templates/header', $data);
        echo view('pages/calendar', $data);
        echo view('templates/footer');
    }
}
