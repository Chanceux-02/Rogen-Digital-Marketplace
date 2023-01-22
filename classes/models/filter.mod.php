<?php

class Filter extends Dbh{

    public function filter(){
        $con = $this->connect();
        $stmt = "SELECT DISTINCT groupName FROM gallery";
        $stmt2 = $con->prepare($stmt);
        $stmt2->execute();
        // $result = $stmt2->fetch(PDO::FETCH_ASSOC);
        // return $result;
        return $stmt2;

    }

}