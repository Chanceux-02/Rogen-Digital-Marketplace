<?php

class Delete extends Dbh{
    public function deleteItem($id, $imgName){
        $con = $this->connect();
        $stmt = "DELETE FROM gallery WHERE id = ?;";
        $stmt2 = $con->prepare($stmt);
        $stmt2->execute([$id]);

        unlink("../images/gallery/" . $imgName);
    }
    public function deletePost($id, $imgName){
        $con = $this->connect();
        $stmt = "DELETE FROM newsfeed WHERE id = ?;";
        $stmt2 = $con->prepare($stmt);
        $stmt2->execute([$id]);

        unlink("../images/gallery/" . $imgName);
    }
}