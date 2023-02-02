<?php

class Newsfeedcontroller extends Add{
    //properties
    private $filename;
    private $content;
    private $fname;
    private $fileTemapName;  
    private $fileError; 
    private $fileSize;
    private $rename;
    private $directory;

    //constructor
    public function __construct($filename, $content, $fname, $fileTemapName,  $fileError, $fileSize){


        $this->fname = $fname;
        $this->filename = $filename;
        $this->content = $content;
        $this->fileTemapName = $fileTemapName;
        $this->fileError = $fileError;
        $this->fileSize = $fileSize;
        $this->rename = $this->rename();
        $this->directory = $this->directory();

    }

    
    //function to input data in models
    public function newItem(){
        if ($this->emptyInput() == false) {
            header("Location: .../index.php?error=emptyinput");
            exit();
        } else if($this->checkExtension() == false){
            header("Location: .../index.php?error=extensionfailed");
            exit();
        } else if($this->checkError() == false){
            header("Location: .../index.php?error=extensionfailed");
            exit();
        } else if($this->checkSize() == false){
            header("Location: .../index.php?error=extensionfailed");
            exit();
        }

        //making some variables
        $order = $this->rowCount();
        $fileTempName = $this->fileTemapName;

        $this->post($this->rename, $this->content, $this->directory, $fileTempName);
    }

    //making variables

    //making new file name
    public function rename(){
        $newFileName = $this->filename;

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
    // //making directory
    public function directory(){
        $imageFullName = $this->rename;

        $fileDestination = "../images/gallery/" . $imageFullName;

        return $fileDestination;

    }

    //validations

    //checking the variables if it is empty
    private function emptyInput(){

        $result = false;

        if (empty($this->fname) ||  empty($this->filename) || empty($this->content)) {
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    //checking for extension
    public function checkExtension(){
        $fname = $this->fname;
        $newFileName = $this->filename;
        
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

}