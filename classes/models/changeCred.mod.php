<?php

class Credentials extends Dbh{
    public function changeNow($username, $newPassword){
        $hashedPwd = password_hash($newPassword,  PASSWORD_DEFAULT);

        $con = $this->connect();
        $sql = "UPDATE user SET `username` = ?, `password` = ? WHERE id = 1;";
        $stmt2 = $con->prepare($sql);
        $stmt2->execute([$username, $hashedPwd]);
        $stmt2 = null;
    }
    public function recovery($fFriend, $fColor, $fNumber, $mDate, $fMovie, $id){

        $con = $this->connect();
        $sql = "UPDATE `recovery` SET `fFriend` = ?, `fColor` = ?, `fNumber` = ?, `mDate` = ?, `fMovie` = ? WHERE id = 1;";
        $stmt2 = $con->prepare($sql);
        $stmt2->execute([$fFriend, $fColor, $fNumber, $mDate, $fMovie]);
        $stmt2 = null;
    }
    public function forgetPass($fFriend, $fColor, $fNumber, $mDate, $fMovie){
        //getting data from database
        $con = $this->connect();
        $sql = "SELECT * FROM `recovery` WHERE id = 1;";
        $stmt2 = $con->prepare($sql);
        $stmt2->execute();
        $check = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        //assigning data
        $fFriend1 = $check[0]['fFriend'];
        $fColor1 = $check[0]['fColor'];
        $fNumber1 = $check[0]['fNumber'];
        $mDate1 = $check[0]['mDate'];
        $fMovie1 = $check[0]['fMovie'];

        $input = [$fFriend, $fColor, $fNumber, $mDate, $fMovie];
        $data = [$fFriend1, $fColor1, $fNumber1, $mDate1, $fMovie1];

        $result = null;
        if ($input != $data) {
            $result = 'false';
        }else{
            $result = 'true';
        }
        return $result;
    }
    public function rChange($newPassword){
        $hashedPwd = password_hash($newPassword,  PASSWORD_DEFAULT);

        $con = $this->connect();
        $sql = "UPDATE user SET  `password` = ? WHERE id = 1;";
        $stmt2 = $con->prepare($sql);
        $stmt2->execute([$hashedPwd]);
        $stmt2 = null;
    }
}