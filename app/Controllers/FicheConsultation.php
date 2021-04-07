<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class FicheConsultation extends Controller
{
    public function indexFormGeneraliste()
    {
        $data =[
          'title' => 'Consultation Généraliste',
        ];

        echo view('templates/header', $data);
        echo view('forms/consultationGeneraliste');
        echo view('templates/footer');
    }

    public function submitGeneraliste()
    {
        
    }
}
