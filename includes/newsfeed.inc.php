<?php

if (isset($_POST['submit'])) {
    //nag includes sang mga file
    require_once '../classes/dbh.class.php';
    require_once '../classes/models/add.mod.php';
    require_once '../classes/controller/newsfeed.con.php';

    
    $file = $_FILES['file'];
    $filename = "post";
    $content = strip_tags($_POST['content']);

    $fname = $file['name'];
    $fileTemapName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    //nag input sang mga data sa controller
    $add = new Newsfeedcontroller($filename, $content, $fname, $fileTemapName,  $fileError, $fileSize);

    //gin call ang function sang controller para i run ang validations kag mag supply sang data sa model
    $add->newItem();

    //back sa homepage
    header("Location: ../newsFeed.php?done");


}