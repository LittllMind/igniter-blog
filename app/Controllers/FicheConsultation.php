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
        $data = [
          'title' => 'Fiche de consultation généraliste : resultats',
        ];

        echo view('templates/header', $data);
        echo $this->request->getPost('nom_intervenant');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('date_permanence');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('lieu_permanence');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('commune_residence');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('quartier_politique');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('sexe');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('ressources_mensuelles');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('situation_professionelle');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('situation_foyer');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('orientation');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('domaine_juridique');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('domaine_juridique_autre');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('nature_entretien');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('precision');
    }

    public function indexFormJeune()
    {
        $data =[
          'title' => 'Consultation Jeune / Enfants',
        ];

        echo view('templates/header', $data);
        echo view('forms/consultationJeunes');
        echo view('templates/footer');
    }

    public function submitJeune()
    {
        $data = [
          'title' => 'Fiche de consultation Jeunes : resultats',
        ];

        echo view('templates/header', $data);
        echo $this->request->getPost('nom_intervenant');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('date_permanence');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('lieu_permanence');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('commune_residence');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('sexe');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('age');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('activite');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('activite_autre');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('orientation');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('domaine_juridique');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('domaine_juridique_autre');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('nature_entretien');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('precision');
    }

    public function indexFormEconomique()
    {
        $data =[
          'title' => 'Consultation Economique',
        ];

        echo view('templates/header', $data);
        echo view('forms/consultationEconomique');
        echo view('templates/footer');
    }

    public function submitEconomique()
    {
        $data = [
          'title' => 'Fiche de consultation Économique : resultats',
        ];

        echo view('templates/header', $data);
        echo $this->request->getPost('nom_intervenant');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('date_permanence');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('lieu_permanence');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('commune_residence');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('commune_implentation');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('ressources_mensuelles');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('status_entrepreneur');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('situation_entrepreneur');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('orientation');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('domaine_juridique');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('domaine_juridique_autre');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('nature_entretien');
        echo '<br>---------------------------<br>';
        echo $this->request->getPost('precision');
    }
}
