<?php

class Groupcontroller extends Edit{

    private $grpName;
    private $newGName;


    public function __construct($newGName,$grpName){
        $this->grpName = $grpName;
        $this->newGName = $newGName;
    }

    public function edit(){

        if ($this->checkEmpty() == false) {
            header("Location: ../index.php?emptyinput");
            exit();
        }

        $this->editGroupName($this->newGName,$this->grpName);

    }

    public function checkEmpty(){
        $result = false;
        if (empty($this->grpName) || empty($this->newGName)) {
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }

}