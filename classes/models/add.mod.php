<?php

class Add extends Dbh{

    //getting rowcount
    public function rowCount(){
        $con = $this->connect();
        $stmt = "SELECT * FROM gallery;";
        $stmt2 = $con->prepare($stmt);
        $stmt2->execute();

        $rowCount = $stmt2->rowCount();
        $setImageOrder = $rowCount + 1;
        return $setImageOrder;
    }

    //adding the file
    public function add($title, $desc, $rename, $order, $grpName, $directory, $fileTempName)
    {
        $con = $this->connect();
        $stmt = "INSERT INTO gallery (title, description, imgName, orderGallery, groupName) VALUES (?,?,?,?,?);";

        $stmt2 = $con->prepare($stmt);
        $stmt2->execute([$title, $desc, $rename, $order, $grpName]);

        move_uploaded_file($fileTempName, $directory);
    }


}

