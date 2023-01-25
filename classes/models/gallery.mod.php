<?php

class Gallery extends Dbh{

    public function show(){
        $con = $this->connect();
        $stmt = "SELECT * FROM gallery ORDER BY orderGallery DESC";
        $stmt2 = $con->prepare($stmt);
        $stmt2->execute();
        // $result = $stmt2->fetch(PDO::FETCH_ASSOC);
        return $stmt2;

    }
    public function systemDetails(){
        $con = $this->connect();
        $stmt = "SELECT * FROM details";
        $stmt2 = $con->prepare($stmt);
        $stmt2->execute();
        // $result = $stmt2->fetch(PDO::FETCH_ASSOC);
        return $stmt2;

    }

}