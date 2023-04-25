<?php

class Logincontroller extends Login{
    private $username;
    private $password;

    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
    }

    public function login(){
        if($this->emptyCheck() == false){
            header("Location: ../login.php?error=loginfailed");
            exit();
        }
        $this->getUser($this->username, $this->password);
    }

    public function emptyCheck(){
        $result = false;
        if (empty($this->username) || empty($this->password)) {
            $result = false;
          } else { 
            $result = true;
          }

        return $result;
    }

}