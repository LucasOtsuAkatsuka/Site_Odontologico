<?php
    require_once(__DIR__."../../../../Errors/PermissionError.php");
    require_once(__DIR__."../../../../Functions/verifyCredentials.php");
    require_once(__DIR__."../../../User/Model/User.php");

    class Login{
        protected User $loggedUser;
        protected bool $isLogged = false;

        public function login($email, $password){
            if($this->isLogged() == true)
                throw new PermissionError("VocÊ já está logado no sistema");
    
            $this->loggedUser = verifyCredentials($email, $password);
            session_start();
            echo("Login realizado com sucesso");
            $this->isLogged = true;
        }

        public function logout(){
            if($this->isLogged() == true){
                session_destroy();
                echo("Logout realizado com sucesso");
                $this->isLogged = false;
            }else
                throw new PermissionError("Você precisa estar logado para fazer isso");            
        }

        public function isLogged(){
            return $this->isLogged;
        }

        public function getLogged(){
            if($this->isLogged() == true)
                return $this->loggedUser;
            else
                throw new PermissionError("Nenhum usuário logado no sistema");
        }
    };
?>