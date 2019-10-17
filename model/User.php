<?php

class User {
    private $name;
    private $email;
    private static $activeEmail = [
        'john.doe@example.com' =>[
            'name' =>'John Doe',
            'email' => 'john.doe@example.com'        ]
    ];

    public static function findUser($email)
    {
        if (isset(self::$activeEmail[$email])) {
            return self::$activeEmail[$email];
        }
        return false;
    }
    
}