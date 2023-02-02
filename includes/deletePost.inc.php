<?php

if (isset($_POST['submit'])) {

    //getting data
    $id = $_POST['id'];
    $imgName = $_POST['imgname'];

    //requiring files
    require_once '../classes/dbh.class.php';
    require_once '../classes/models/delete.mod.php';
    require_once '../classes/controller/delete.con.php';

    //running the delete function
    $delete = new Deletecontroller($id, $imgName);
    $delete->deletenf();


    //back to home page
    header("Location: ../newsFeed.php?delete=successfull");

}