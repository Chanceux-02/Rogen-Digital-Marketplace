<?php

if (isset($_POST['submit'])) {

    //grabbing data
    $name = strip_tags($_POST['name']);
    $about = strip_tags($_POST['about']);
    $number = strip_tags($_POST['number']);
    $fb = strip_tags($_POST['fb']);
    $address = strip_tags($_POST['address']);

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