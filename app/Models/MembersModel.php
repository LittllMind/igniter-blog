<?php

namespace App\Models;

use CodeIgniter\Model;

class MembersModel extends Model
{
    protected $table = 'membre';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pseudo', 'password', 'mail', 'registration_date'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

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


    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        $data['data']['created_at'] = date('Y-m-d H:i:s');

        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->password_hash($data);
        $data['data']['updated_at'] = date('Y-m-d H:i:s');

        return $data;
    }

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }

        return $data;
    }
}
