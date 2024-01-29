<?php

namespace App\Control;

use App\Models\User;
use App\Validators\Auth\AuthValidator;
use App\Validators\Auth\RegisterValidator;
use Core\Controller;

class AuthControl extends Controller
{
    public function signup(): array
    {
        $data = requestBody();
        $validator = new RegisterValidator();


        if ($validator->validate($data))
        {
            $id = User::create
            ([
                ...$data,
                'password' => password_hash($data['password'], PASSWORD_BCRYPT)
            ]);

            return $this->response(200, body:User::find($id)->toArray());
        }

        return $this->response(200, body:[], errors: $validator->getErrors());
    }

    public function singin(): array
    {
        $data = requestBody();
        $validator = new AuthValidator();

        if($validator->validate($data))
        {
            $user = User::findBy('email', $data['email']);
            if (password_verify($data['password'], $user->password))
            {
                $token = random_bytes(32);
                return $this->response(200, compact('token'));
            }
        }

        return $this->response(200, [], $validator->getErrors());
    }


}