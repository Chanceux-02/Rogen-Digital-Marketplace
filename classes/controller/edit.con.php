<?php

class Editcontroller extends Edit{
    private $id;
    private $title;
    private $desc;
    private $price;
    private $grpName;

    public function __construct($title,$desc,$price,$grpName,$id){
        $this->id = $id;
        $this->title = $title;
        $this->desc = $desc;
        $this->price = $price;
        $this->grpName = $grpName;
    }

    public function edit(){

        if ($this->checkEmpty() == false) {
            header("Location: ../index.php?emptyinput");
            exit();
        }

        $this->editItem($this->title,$this->desc,$this->price,$this->grpName,$this->id);

    }

    public function checkEmpty(){
        $result = false;
        if (empty($this->id) || empty($this->title) || empty($this->desc)|| empty($this->price)) {
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }

}