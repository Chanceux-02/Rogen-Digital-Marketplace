<?php

if (isset($_POST['submit'])) {

//getting data
$fFriend = strip_tags($_POST['fFriend']);
$fColor = strip_tags($_POST['fColor']);
$fNumber = strip_tags($_POST['fNumber']);
$mDate = strip_tags($_POST['mDate']);
$fMovie = strip_tags($_POST['fMovie']);
$id = 1;

//requiring files
require_once '../classes/dbh.class.php';
require_once '../classes/models/changeCred.mod.php';
require_once '../classes/controller/Recover.con.php';

//running the delete function
$recover = new Recovery ($fFriend, $fColor, $fNumber, $mDate, $fMovie, $id);
$recover->recover();

//back to home page
header("Location: ../index.php?recoverySetup=Successful");

}