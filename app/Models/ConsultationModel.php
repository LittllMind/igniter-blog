<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultationModel extends Model
{
    protected $table = 'consultation';
    protected $primaryKey = 'id';
    protected $allowedFields = [
      'id_ayant_droit',
      'id_intervenant',
      'nom_intervenant',
      'date_permanence',
      'lieu_permanence',
      'commune_residence',
      'commune_implentation_entreprise',
      'quartier_politique',
      'sexe',
      'age',
      'status_entrepreneur',
      'situation_entrepreneur',
      'ressources_mensuelles',
      'activite',
      'situation_foyer',
      'orientation',
      'domaine_juridique',
      'nature_entretien',
      'precisions_nature_entretien'
    ];

    public function getFichesConsultations($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }
}
