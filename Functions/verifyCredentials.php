<?php
    require_once(__DIR__."../../Errors/InvalidParamsError.php");
    require_once(__DIR__."../../Domains/User/Model/User.php");

    function verifyCredentials($email, $password){
        $users = User::getRecordsByField('email', $email);
        $user = $users[0];

        if(!$user)
            throw new InvalidParamsError("Email ou senha incorretos");

        if($password != $user->getPassword())
            throw new InvalidParamsError("Email ou senha incorretos");

        return $user;
        print_r($user);
    }
?>