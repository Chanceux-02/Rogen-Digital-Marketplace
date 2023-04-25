<?php

class Addcontroller extends Add{
    //properties
    private $grpName;
    private $fileName;
    private $title;
    private $desc;
    private $price;
    private $fname;
    private $fileTemapName;  
    private $fileError; 
    private $fileSize;
    private $rename;
    private $directory;

    //constructor
    public function __construct($grpName, $fname, $fileName, $title, $desc, $price, $fileTemapName,  $fileError, $fileSize){

        $this->grpName = $grpName;
        $this->fileName = $fileName;
        $this->title = $title;
        $this->desc = $desc;
        $this->price = $price;
        $this->fname = $fname;
        $this->fileTemapName = $fileTemapName;
        $this->fileError = $fileError;
        $this->fileSize = $fileSize;
        $this->rename = $this->rename();
        $this->directory = $this->directory();
        $this->grpName = $this->newCategoryName();

    }

    
    //function to input data in models
    public function newItem(){
        if ($this->emptyInput() == false) {
            header("Location: .../add.php?error=emptyinput");
            exit();
        } else if($this->checkExtension() == false){
            header("Location: ../add.php?error=extensionfailed");
            exit();
        } else if($this->checkError() == false){
            header("Location: ../add.php?error=extensionfailed");
            exit();
        } else if($this->checkSize() == false){
            header("Location: ../add.php?error=imagesize");
            exit();
        } else if ($this->checkPrice() == false) {
            header("Location: ../add.php?error=overPrice");
            exit();
        }

        //making some variables
        $order = $this->rowCount();
        $fileTempName = $this->fileTemapName;

        $this->add($this->title, $this->desc, $this->price, $this->rename, $order, $this->grpName, $this->directory, $fileTempName);
    }

    //making variables

    //making new file name
    public function rename(){
        $newFileName = $this->fileName;

        if (empty($newFileName)) {
            $newFileName = "gallery";
        }else{
            $newFileName = strtolower(str_replace(" ", "-", $newFileName));
        }
        $newName = $newFileName;
        $fname = $this->fname;
        
        $fileExt = explode(".", $fname);
        $fileActualExt = strtolower(end($fileExt));

        $imageFullName = $newName . "." . uniqid("", false) . "." . $fileActualExt;

        return $imageFullName;

    }
    //making new name for cateogry name or group name
    public function newCategoryName(){
        $newFileName = $this->grpName;

        if (empty($newFileName)) {
            $newFileName = "gallery";
        }else{
            $newFileName = strtolower(str_replace(" ", "-", $newFileName));
        }
        $newName = $newFileName;
       
        return $newName;
    }
    //making directory
    public function directory(){
        $imageFullName = $this->rename;

        $fileDestination = "../images/gallery/" . $imageFullName;

        return $fileDestination;

    }

    //validations

    //checking the variables if it is empty
    private function emptyInput(){

        $result = false;

        if (empty($this->grpName) || empty($this->fname) || empty($this->fileName) || empty($this->title) || empty($this->desc)|| empty($this->price)) {
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    //checking for extension
    public function checkExtension(){
        $fname = $this->fname;
        $newFileName = $this->fileName;
        
        $fileExt = explode(".", $fname);
        $fileActualExt = strtolower(end($fileExt));

        $result = false;
        $allowed = ["jpg", "jpeg", "png", "jfif"];
        if (!in_array($fileActualExt, $allowed)) {
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    //checking for errors
    public function checkError(){
        $fileError = $this->fileError;
        $result = false;
        if ($fileError !== 0) {
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    //checking for file size 
    public function checkSize(){
        $fileSize = $this->fileSize;
        $result = false;

        if ($fileSize > 2000000) {
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
    public function checkPrice(){
        $result = false;
        if (!preg_match('/^[0-9]{1,6}$/',$this->price)) {
            $result = false;
        }else{
            $result = true;
        }

        return $result;
    }

}