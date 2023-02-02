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
    public function add($title, $desc, $price, $rename, $order, $grpName, $directory, $fileTempName)
    {
        $con = $this->connect();
        $stmt = "INSERT INTO gallery (title, description, price, imgName, orderGallery, groupName) VALUES (?,?,?,?,?,?);";

        $stmt2 = $con->prepare($stmt);
        $stmt2->execute([$title, $desc, $price, $rename, $order, $grpName]);

        move_uploaded_file($fileTempName, $directory);
    }
    //adding the file
    public function post($rename, $content,  $directory, $fileTempName)
    {
        $con = $this->connect();
        $stmt = "INSERT INTO newsfeed (filename, content) VALUES (?,?);";

        $stmt2 = $con->prepare($stmt);
        $stmt2->execute([$rename, $content]);

        move_uploaded_file($fileTempName, $directory);
    }


}

