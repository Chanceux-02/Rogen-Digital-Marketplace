<?php

if (isset($_POST['submit'])) {

    //grabbing data
    $groupName = strip_tags($_POST['groupName']); //select
    $newGName = strip_tags($_POST['newGroupName']); // input

    //requiring files
    require_once '../classes/dbh.class.php';
    require_once '../classes/models/edit.mod.php';
    require_once '../classes/controller/editGroup.con.php';

    //running function
    $edit = new Groupcontroller($newGName,$groupName);
    $edit->edit();

    //going back to homepage
    header("Location: ../index.php?edit=successful");

    
}