<?php

class ChangeCredcontroller extends Credentials{
    private $username;
    private $newPassword;
    private $rPassword;

    public function __construct($username,  $newPassword, $rPassword){
        $this->username = $username;
        $this->newPassword = $newPassword;
        $this->rPassword = $rPassword;
    }

    // supplier
    public function change(){
        if ($this->checkEmpty() == false) {
            header("Location: ../index.php?emptyinput");
            exit();
        }
        if ($this->checkPwd() == false) {
            header("Location: ../index.php?pleaseTryAgain");
            exit();
        }


        $this->changeNow($this->username, $this->newPassword);
    }
    public function recoverChange(){
        if ($this->checkEmpty() == false) {
            header("Location: ../index.php?emptyinput");
            exit();
        }
        if ($this->checkPwd() == false) {
            header("Location: ../index.php?pleaseTryAgain");
            exit();
        }


        $this->rChange($this->newPassword);
    }

    // validations

    public function checkEmpty(){
        $result = false;
        if (empty($this->username)|| empty($this->newPassword)) {
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }
    public function checkPwd(){
        $result = false;
        if ($this->newPassword !== $this->rPassword) {
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }


}