<?php

if (isset($_POST['submit'])) {
    //nag includes sang mga file
    require_once '../classes/dbh.class.php';
    require_once '../classes/models/add.mod.php';
    require_once '../classes/controller/add.con.php';

    //nag kwa sang mga data sa forms
    $groupName = $_POST['groupName']; //select
    $newGName = $_POST['newGroupName']; // input

    $gName = $_POST['groupName'];

    if(!empty($groupName)){
        $gName = $groupName;
    }else{
        $gName = $newGName;
    }

    $grpName = $gName;
    $fileName = $_POST['fileName'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $file = $_FILES['file'];


    // nag kwa sang mga data sa $file
    $fname = $file['name'];
    $fileTemapName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    //nag input sang mga data sa controller
    $add = new Addcontroller($grpName, $fname, $fileName, $title, $desc, $fileTemapName,  $fileError, $fileSize);

    //gin call ang function sang controller para i run ang validations kag mag supply sang data sa model
    $add->newItem();

    //back sa homepage
    header("Location: ../index.php");


}