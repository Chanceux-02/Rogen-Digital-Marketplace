<?php

class EditContentcontroller extends Edit{

    private $name;
    private $about;
    private $number;
    private $fb;
    private $address;



    public function __construct($name,$about,$number,$fb,$address){
        $this->name = $name;
        $this->number = $number;
        $this->fb = $fb;
        $this->address = $address;
        $this->about = $about;
    }

    //supplying data in model


    //for editing company details
    public function editDetails(){

        if ($this->checkEmpty2() == false) {
            header("Location: ../index.php?emptyinput");
            exit();
        }
        if ($this->validNumber() == false) {
            header("Location: ../index.php?invalidPHoneNumber");
            exit();
        }
        $this->editSystem($this->name,$this->about,$this->number,$this->fb,$this->address);
    }

    //running validations
    //para sa mag edit sang system
    public function checkEmpty2(){
        $result = false;
        if (empty($this->name) || empty($this->about) || empty($this->number) || empty($this->fb) || empty($this->address)) {
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }
    public function validNumber(){
        $result = false;
        if (!preg_match('/^\d{11}$/', $this->number)) {
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }

}