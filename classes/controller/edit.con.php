<?php

class Editcontroller extends Edit{
    private $id;
    private $title;
    private $desc;

    public function __construct($title,$desc,$id){
        $this->id = $id;
        $this->title = $title;
        $this->desc = $desc;
    }

    public function edit(){

        if ($this->checkEmpty() == false) {
            header("Location: ../index.php?emptyinput");
            exit();
        }

        $this->editItem($this->title,$this->desc,$this->id);

    }

    public function checkEmpty(){
        $result = false;
        if (empty($this->id) || empty($this->title) || empty($this->desc)) {
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }

}