<?php

namespace App\Models;

use CodeIgniter\Model;

class MembersModel extends Model
{
    protected $table = 'membre';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pseudo', 'password', 'mail', 'registration_date'];

    public function getMembers($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }

    public function getMemberByPseudo($pseudo)
    {
        return $this->where(['pseudo' => $pseudo])
                    ->first();
    }

    public function getMemberByMail($mail)
    {
        return $this->where(['mail' => $mail])
                    ->first();
    }
}
