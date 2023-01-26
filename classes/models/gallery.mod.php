<?php

class Gallery extends Dbh{

    //for showing all data in database (showing all order by oderGallery row to make it look good) 
    public function show(){
        $con = $this->connect();
        $stmt = "SELECT * FROM gallery ORDER BY orderGallery DESC";
        $stmt2 = $con->prepare($stmt);
        $stmt2->execute();
        // $result = $stmt2->fetch(PDO::FETCH_ASSOC);
        return $stmt2;
    }
    
    //for showing all category without overwritting the same name in product group name (to show all in select element)
    public function filter(){
        $con = $this->connect();
        $stmt = "SELECT DISTINCT groupName FROM gallery";
        $stmt2 = $con->prepare($stmt);
        $stmt2->execute();
        // $result = $stmt2->fetch(PDO::FETCH_ASSOC);
        // return $result;
        return $stmt2;
    }

    //for showing all the system details in database (System details)
    public function systemDetails(){
        $con = $this->connect();
        $stmt = "SELECT * FROM details";
        $stmt2 = $con->prepare($stmt);
        $stmt2->execute();
        // $result = $stmt2->fetch(PDO::FETCH_ASSOC);
        return $stmt2;
    }

    //for showing selected data or items from database using id (all data from gallery table)
    public function showSelectedItem($id){
        $con = $this->connect();
        $stmt = "SELECT * FROM gallery WHERE id = '$id';";
        $stmt2 = $con->prepare($stmt);
        $stmt2->execute();
        // $result = $stmt2->fetch(PDO::FETCH_ASSOC);
        return $stmt2;
    }

    //for showing selected category from database using a groupname selection (uses for displaying items based on their category)
    public function showSelectedCategory($gName){
        $con = $this->connect();
        $stmt = "SELECT * FROM gallery WHERE groupName = '$gName';";
        $stmt2 = $con->prepare($stmt);
        $stmt2->execute();
        // $result = $stmt2->fetch(PDO::FETCH_ASSOC);
        return $stmt2;
    }

    //for selecting groupname by using id (it uses to make a placeholder for the select element for the selected item)
    public function groupName($id){
        $con = $this->connect();
        $stmt = "SELECT groupName FROM gallery WHERE id = '$id';";
        $stmt2 = $con->prepare($stmt);
        $stmt2->execute();
        // $result = $stmt2->fetch(PDO::FETCH_ASSOC);
        return $stmt2;

        // amuni mag print
        // $galleryF = new Gallery();
        // $galleryFil = $galleryF->groupName($id);

        // while ($filterdata22 = $galleryFil->fetch(PDO::FETCH_ASSOC)) {
        //     echo "<option value=$filterdata22[groupName]>$filterdata22[groupName]</option>";
        // }
    }


}