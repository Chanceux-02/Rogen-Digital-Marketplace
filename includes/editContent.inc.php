<?php

if (isset($_POST['submit'])) {

    //grabbing data
    $name = $_POST['name'];
    $about = $_POST['about'];
    $number = $_POST['number'];
    $fb = $_POST['fb'];
    $address = $_POST['address'];

    //requiring files
    require_once '../classes/dbh.class.php';
    require_once '../classes/models/edit.mod.php';
    require_once '../classes/controller/editContent.con.php';

    //running function and validation
    $edit = new EditContentcontroller($name,$about,$number,$fb,$address);
    $edit->editDetails();

    //going back to homepage
    header("Location: ../index.php?edit=successful");

}