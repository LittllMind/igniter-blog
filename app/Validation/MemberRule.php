<?php

namespace App\Validation;

use App\Models\MembersModel;

class MemberRules
{
    public function validateMember(string $str, string $fields, array $data)
    {
        $model = new MembersModel();

        $member = $model->where('email', $data['email'])->first();

        if (! $member)
            return false;

        return password_verify($data['password'], $member['password']);
    }
}
