<?php

if (isset($_POST['submit'])) {

    //getting data
    $categoryName = $_POST['groupName'];

    //requiring files
    require_once '../classes/dbh.class.php';
    require_once '../classes/models/delete.mod.php';
    require_once '../classes/controller/delete.con.php';

    //running the delete function
    $delete = new Deletecontroller($categoryName, $placeholder);
    $delete->deleteCategory();


    //back to home page
    header("Location: ../index.php?delete=successfull");
}