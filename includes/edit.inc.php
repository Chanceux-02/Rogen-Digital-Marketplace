<?php

if (isset($_POST['submit'])) {

    //grabbing data
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $id = $_POST['id'];

    //nag kwa sang mga data sa forms
    $groupName = strip_tags($_POST['groupName']); //select
    $newGName = strip_tags($_POST['newGroupName']); // input

    $gName = strip_tags($_POST['groupName']);

    if(!empty($groupName)){
        $gName = $groupName;
    }else{
        $gName = $newGName;
    }

    $grpName = $gName;

    //requiring files
    require_once '../classes/dbh.class.php';
    require_once '../classes/models/edit.mod.php';
    require_once '../classes/controller/edit.con.php';

    //running function
    $edit = new Editcontroller($title,$desc,$price,$grpName,$id);
    $edit->edit();

    //going back to homepage
    header("Location: ../index.php?edit=successful");

    
}