<?php

if (isset($_POST['submit'])) {

    //getting data
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['pwd']);

    //requiring files
    require_once '../classes/dbh.class.php';
    require_once '../classes/models/login.mod.php';
    require_once '../classes/controller/login.con.php';

    //running the login function
    $loginuser = new Logincontroller($username, $password);
    $loginuser->login();

    //back to home page
    header("Location: ../index.php?login=successfull");

}