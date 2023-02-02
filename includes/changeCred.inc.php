<?php

if (isset($_POST['submit'])) {

    //getting data
    $username = strip_tags($_POST['username']);
    $newPassword = strip_tags($_POST['password']);
    $rPassword = strip_tags($_POST['rPassword']);

    //requiring files
    require_once '../classes/dbh.class.php';
    require_once '../classes/models/changeCred.mod.php';
    require_once '../classes/controller/changeCred.con.php';

    //running the delete function
    $change = new ChangeCredcontroller($username, $newPassword, $rPassword);
    $change->change();

    //back to home page
    header("Location: ../index.php?changePassword=successfull");

}