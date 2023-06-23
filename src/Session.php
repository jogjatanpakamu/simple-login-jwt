<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Session
{

    public function __construct(public string  $name, public string  $status)
    {
    }
}


class SessionControl
{


    private static string $KEY = 'vsgdfuyfgytgvyejhbf nemf beyg4c7tuvg4ybhtb wejfbsdj';
    static string $KEY_SESSION = 'TEST-GET_JWT';
    public static  function login(string $user, string $password): bool
    {

        if ($user == "amar" && $password == "rahasia") {
            #add payload for jwt encode
            $payload = [
                'name' => 'amar',
                'status' => 1,
            ];
            #isi dari session
            $jwt = JWT::encode($payload, self::$KEY, 'HS256');
            setcookie(self::$KEY_SESSION, $jwt);
            return true;
        } else {
            return false;
        }
    }

    public static function loginSession(): Session
    {
        if ($_COOKIE[self::$KEY_SESSION]) {
            $jwt = $_COOKIE[self::$KEY_SESSION];
            try {
                $payload = JWT::decode($jwt, new Key(self::$KEY, 'HS256'));

                return new Session(name: $payload->name, status: $payload->status);
            } catch (Exception $exception) {
                throw new Exception("User is not login");
            }
        } else {
            throw new Exception("User is not login");
        }
    }
}
