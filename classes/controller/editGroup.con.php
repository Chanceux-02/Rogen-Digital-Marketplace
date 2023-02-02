<?php

class Groupcontroller extends Edit{

    private $grpName;
    private $newGName;


    public function __construct($newGName,$grpName){
        $this->grpName = $grpName;
        $this->newGName = $newGName;
        $this->newGName = $this->newCategoryName();
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
    //making new name for cateogry name or group name
    public function newCategoryName(){
        $newFileName = $this->newGName;

        if (empty($newFileName)) {
            $newFileName = "gallery";
        }else{
            $newFileName = strtolower(str_replace(" ", "-", $newFileName));
        }
        $newName = $newFileName;
    
        return $newName;
    }
}