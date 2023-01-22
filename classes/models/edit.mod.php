<?php

class Edit extends Dbh{
    public function editItem($title,$desc,$id){
        $con = $this->connect();
        $sql = "UPDATE gallery SET title = ?, description = ? WHERE id = ?;";

        $stmt2 = $con->prepare($sql);
        $stmt2->execute([$title, $desc, $id]);
        
    }
}