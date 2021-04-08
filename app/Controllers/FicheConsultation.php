<?php

namespace App\Controllers;

use App\Models\ConsultationModel;
use CodeIgniter\Controller;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\IncomingRequest;

class FicheConsultation extends Controller
{
    public function index()
    {
        $model = new ConsultationModel();

        $data = [
          'fichesConsultations' => $model->getFichesConsultations(),
          'title' => 'Consultation liste'
        ];

        echo view('templates/header', $data);
        echo view('consultation/ficheConsultOverview', $data);
        echo view('templates/footer');
    }

    public function FicheConsultationView($ficheConsultId = null)
    {
        $model = new ConsultationModel();

        $data['ficheConsultation'] = $model->getFichesConsultations($ficheConsultId);

        // if (empty($data['ficheConsultation'])) {
        //     throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the ' . $ficheConsultId);
        // }

        $data['title'] = $data['ficheConsultation']['id'];

        echo view('templates/header', $data);
        echo view('consultation/ficheConsultView', $data);
        echo view('templates/footer');
    }


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

        helper(['form', 'url']);
        $validation = \Config\Services::validation();

        $input = $this->validate([
            'nom_intervenant' => 'required',
            'date_permanence' => 'required',
            'lieu_permanence' => 'required',
            'commune_residence' => 'required',
            'sexe' => 'required',
            'ressources_mensuelles' => 'required',
            'activite' => 'required',
            'situation_foyer' => 'required',
            'orientation' => 'required',
            'domaine_juridique' => 'required',
            'nature_entretien' => 'required',
        ]);

        $data = [
          'nom_intervenant' =>  $this->request->getPost('nom_intervenant'),
          'date_permanence' => $this->request->getPost('date_permanence'),
          'lieu_permanence' => $this->request->getPost('lieu_permanence'),
          'commune_residence' => $this->request->getPost('commune_residence'),
          'sexe' => $this->request->getPost('sexe'),
          'ressources_mensuelles' => $this->request->getPost('ressources_mensuelles'),
          'activite' => $this->request->getPost('activite'),
          'situation_foyer' => $this->request->getPost('situation_foyer'),
          'orientation' => $this->request->getPost('orientation'),
          'domaine_juridique' => $this->request->getPost('domaine_juridique'),
          'nature_entretien' => $this->request->getPost('nature_entretien'),
          'precision' => $this->request->getPost('precision'),
        ];

        if ($data['domaine_juridique'] === 'Autre') {
            $data['domaine_juridique'] = $this->request->getPost('domaine_juridique_autre');
        }

        $consultationModel = new ConsultationModel();

        $validation->run($data, 'ficheConsultation');

        if (!$input) {
            echo view('templates/header', ['title' => 'Consultation Généraliste']);
            echo view('forms/consultationGeneraliste', [
                'validation' => $this->validator
            ]);
            echo view('templates/footer');
        } else {
            $consultationModel->save($data);
            echo view('templates/header', ['title' => 'Formulaire enregistré']);
            echo view('member/success');
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
            echo $this->request->getPost('activite');
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
            echo view('templates/footer');
        }
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
        helper(['form', 'url']);
        $validation = \Config\Services::validation();

        $input = $this->validate([
            'nom_intervenant' => 'required',
            'date_permanence' => 'required',
            'lieu_permanence' => 'required',
            'commune_residence' => 'required',
            'sexe' => 'required',
            'age' => 'required',
            'activite' => 'required',
            'orientation' => 'required',
            'domaine_juridique' => 'required',
            'nature_entretien' => 'required',
        ]);

        $data = [
          'nom_intervenant' =>  $this->request->getPost('nom_intervenant'),
          'date_permanence' => $this->request->getPost('date_permanence'),
          'lieu_permanence' => $this->request->getPost('lieu_permanence'),
          'commune_residence' => $this->request->getPost('commune_residence'),
          'sexe' => $this->request->getPost('sexe'),
          'ressources_mensuelles' => 0,
          'activite' => $this->request->getPost('activite'),
          'situation_foyer' => '',
          'orientation' => $this->request->getPost('orientation'),
          'domaine_juridique' => $this->request->getPost('domaine_juridique'),
          'nature_entretien' => $this->request->getPost('nature_entretien'),
          'precision' => $this->request->getPost('precision'),
        ];

        if ($data['domaine_juridique'] === 'Autre') {
            $data['domaine_juridique'] = $this->request->getPost('domaine_juridique_autre');
        }

        if ($data['activite'] === 'Autre') {
            $data['activite'] = $this->request->getPost('activite_autre');
        }

        $consultationModel = new ConsultationModel();

        $validation->run($data, 'ficheConsultation');

        if (!$input) {
            echo view('templates/header', ['title' => 'Consultation Jeunes / Enfants']);
            echo view('forms/consultationJeunes', [
                'validation' => $this->validator
            ]);
            echo view('templates/footer');
        } else {
            $consultationModel->save($data);
            echo view('templates/header', ['title' => 'Formulaire enregistré']);
            echo view('member/success');

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
            echo view('templates/footer');
        }
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
        helper(['form', 'url']);
        $validation = \Config\Services::validation();

        $input = $this->validate([
            'nom_intervenant' => 'required',
            'date_permanence' => 'required',
            'lieu_permanence' => 'required',
            'commune_residence' => 'required',
            'commune_implentation' => 'required',
            'ressources_mensuelles' => 'required',
            'status_entrepreneur' => 'required',
            'situation_entrepreneur' => 'required',
            'orientation' => 'required',
            'domaine_juridique' => 'required',
            'nature_entretien' => 'required',
        ]);

        $data = [
          'nom_intervenant' =>  $this->request->getPost('nom_intervenant'),
          'date_permanence' => $this->request->getPost('date_permanence'),
          'lieu_permanence' => $this->request->getPost('lieu_permanence'),
          'commune_residence' => $this->request->getPost('commune_residence'),
          'commun_implentation_entreprise' => $this->request->getPost('commune_implentation'),
          'ressources_mensuelles' => $this->request->getPost('ressources_mensuelles'),
          'status_entrepreneur' => $this->request->getPost('status_entrepreneur'),
          'situation_entrepeneur' => $this->request->getPost('situation_entrepreneur'),
          'orientation' => $this->request->getPost('orientation'),
          'domaine_juridique' => $this->request->getPost('domaine_juridique'),
          'nature_entretien' => $this->request->getPost('nature_entretien'),
          'precision' => $this->request->getPost('precision'),
        ];

        if ($data['domaine_juridique'] === 'Autre') {
            $data['domaine_juridique'] = $this->request->getPost('domaine_juridique_autre');
        }

        $consultationModel = new ConsultationModel();

        $validation->run($data, 'ficheConsultation');

        if (!$input) {
            echo view('templates/header', ['title' => 'Consultation Généraliste']);
            echo view('forms/consultationEconomique', [
                'validation' => $this->validator
            ]);
            echo view('templates/footer');
        } else {
            $consultationModel->save($data);
            echo view('templates/header', ['title' => 'Formulaire enregistré']);
            echo view('member/success');
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
}
