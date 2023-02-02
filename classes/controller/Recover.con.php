<?php

class Recovery extends Credentials{
    private $fFriend;
    private $fColor;
    private $fNumber;
    private $mDate;
    private $fMovie;
    private $id;
    private $strlF;
    private $strlC;
    private $strlM;

    public function __construct($fFriend, $fColor, $fNumber, $mDate, $fMovie, $id){
        $this->fFriend = $fFriend;
        $this->fColor = $fColor;
        $this->fNumber = $fNumber;
        $this->mDate = $mDate;
        $this->fMovie = $fMovie;
        $this->id = $id;

        //string to lower
        $this->strlF = $this->friend($this->fFriend);
        $this->strlC = $this->friend($this->fColor);
        $this->strlM = $this->friend($this->fMovie);
    }

    public function recover(){
        if ($this->emptyInput() == false) {
            header("Location: ../index.php?pleaseTryAgain");
            exit();
        }
        if ($this->lenght() == false) {
            header("Location: ../index.php?3digitsAllowed");
            exit();
        }


        $this->recovery($this->strlF, $this->strlC, $this->fNumber, $this->mDate, $this->strlM, $this->id);
    }


    //validations

    //checking the variables if it is empty
    private function emptyInput(){

        $result = false;

        if (empty($this->fFriend) || empty($this->fColor) || empty($this->fNumber) || empty($this->mDate) || empty($this->fMovie)) {
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
     //string to lower
     public function friend($data){
        $lowerCase = strtolower($data);
        return  $lowerCase;
    }
     public function lenght(){
        $number = $this->fNumber;
        $result = false;
        if (strlen($number) > 3) {
            $result = false;
        }else{
            $result = true;
        }
        return  $result;
    }

}