<?php

if (isset($_POST['submit'])) {

    //grabbing data
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $id = $_POST['id'];

    //requiring files
    require_once '../classes/dbh.class.php';
    require_once '../classes/models/edit.mod.php';
    require_once '../classes/controller/edit.con.php';

    //running function
    $edit = new Editcontroller($title,$desc,$id);
    $edit->edit();

    //going back to homepage
    header("Location: ../index.php?edit=successful");

    
}