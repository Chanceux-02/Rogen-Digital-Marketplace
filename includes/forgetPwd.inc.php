<?php
    //amuni ang halin sa recovery questions ma drecho dayun sa resetPwd.php kung sakto kag ma reset sang password
    if (!isset($_POST['submit'])) {
    header("location: ../notfound.php?pagenotfound");
    }else{
        
        require_once '../classes/dbh.class.php';
        include_once '../classes/models/changeCred.mod.php';
        //getting data
        $fFriend = strtolower(strip_tags($_POST['fFriend']));
        $fColor = strtolower(strip_tags($_POST['fColor']));
        $fNumber = strip_tags($_POST['fNumber']);
        $mDate = strip_tags($_POST['mDate']);
        $fMovie = strtolower(strip_tags($_POST['fMovie']));
    
        //for validating the data
        $gallery = new Credentials();
        $datas = $gallery->forgetPass($fFriend, $fColor, $fNumber, $mDate, $fMovie);
        print_r($datas);

        if ($datas === 'false') {
            header("location: ../index.php?sala");
        }else{
            header("location: ../resetPwd.php?resetThePwd");
        }
    }





















// if (isset($_POST['submit'])) {

//     //getting data
//     $fFriend = strip_tags($_POST['fFriend']);
//     $fColor = strip_tags($_POST['fColor']);
//     $fNumber = strip_tags($_POST['fNumber']);
//     $mDate = strip_tags($_POST['mDate']);
//     $fMovie = strip_tags($_POST['fMovie']);
//     $id = 1;

//     //requiring files
//     require_once '../classes/dbh.class.php';
//     require_once '../classes/models/changeCred.mod.php';
//     require_once '../classes/controller/ForgetPassword.con.php';

//     //running the delete function
//     $recover = new Recovery ($fFriend, $fColor, $fNumber, $mDate, $fMovie, $id);
//     $recover->recover();

//     //back to home page
//     header("Location: ../index.php?passwordChanged!");

// }