<?php

class Deletecontroller extends Delete{
    private $delete;
    private $imgName;

    public function __construct($delete, $imgName){
        $this->delete = $delete;
        $this->imgName = $imgName;
    }

    public function delete(){
        $this->deleteItem($this->delete, $this->imgName);
    }
    public function deletenf(){
        $this->deletePost($this->delete, $this->imgName);
    }

}