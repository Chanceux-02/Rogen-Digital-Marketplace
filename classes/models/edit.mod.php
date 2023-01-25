<?php

class Edit extends Dbh{
    
    //editing items
    public function editItem($title,$desc,$price,$grpName,$id){
        $con = $this->connect();
        $sql = "UPDATE gallery SET title = ?, description = ?, price = ?, groupName = ? WHERE id = ?;";

        $stmt2 = $con->prepare($sql);
        $stmt2->execute([$title, $desc, $price,$grpName, $id]);
    }

    //editing system info
    public function editSystem($name,$about,$number,$fb,$address){
    $con = $this->connect();
    $sql = "UPDATE details SET `companyName` = ?, `about` = ?, `number` = ?, `fb` = ?, `address` = ? WHERE id = 1;";

    $stmt2 = $con->prepare($sql);
    $stmt2->execute([$name,$about,$number,$fb,$address]);
    
    }
    public function editGroupName($newGName,$grpName){
    $con = $this->connect();
    $sql = "UPDATE gallery SET `groupName` = ? WHERE groupName = ?;";

    $stmt2 = $con->prepare($sql);
    $stmt2->execute([$newGName,$grpName]);
    
    }
    
}
