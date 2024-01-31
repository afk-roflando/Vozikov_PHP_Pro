<?php

namespace App\Control\Api;

use App\Models\User;
use Core\Controller;
use ReallySimpleJWT\Token;

class BaseApiController extends Controller
{
    public function before(string $action, array $params = []): bool
    {
        $headers = apache_request_headers();
        if(empty($heders['Authorization']))
        {
            throw new \Exception('The request should contain an auth token', 422);
        }

        $requestToken = getToken();
        $user = User::find(authId());

        if (!Token::validate($requestToken, $user->password))
        {
            throw new \Exception('Token is invalid', 422);
        }

        return true;
    }
}

