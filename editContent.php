<?php
    //making sure that the request is from the form in index page
    if (!isset($_POST['submit'])) {
        header("Location: ./index.php?WrongWayToEnter");
        exit();
    } else {
        require_once 'classes/dbh.class.php';
        include_once 'classes/models/gallery.mod.php';
    
        //for system company name
        $gallery2 = new Gallery();
        $datas2 = $gallery2->systemDetails();

        //for recovery value
        $recover = new Gallery();
        $recovery = $recover->recoveryVal();
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/06b9f7a3c7.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="form">
        <h3 class="p-5 text-center">Settings</h3>
        <div class="form-wrapper bg-light p-3 py-5 rounded">
            <a href="index.php" class="btn btn-outline-primary">Home</a>
                <h1>Edit Company Details</h1>
                <form action="includes/editContent.inc.php" method="post" enctype="multipart/form-data">
                                    <!-- fetching company's name -->
                <?php
                while ($data2 = $datas2->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <input type="text" name="name" value="<?= $data2['companyName'] ?>" placeholder="Enter your company name" required class="form-control">
                    <input type="text" name="number" value="<?= $data2['number'] ?>" placeholder="Enter your contact number" required class="form-control">
                    <input type="text" name="fb" value="<?= $data2['fb'] ?>" placeholder="Enter your facebook link" required class="form-control">
                    <input type="text" name="address" value="<?= $data2['address'] ?>" placeholder="Enter your store location address" required class="form-control">
                    <textarea class="about form-control" name="about" required><?= $data2['about'] ?></textarea>
                    <br>
                    <button type="submit" name="submit" class="btn btn-outline-primary">Edit Details</button>
                <?php
                }
                ?>
                </form>
                <br>
                <hr>
                <h1>Edit Credentails</h1>
                <form action="includes/changeCred.inc.php" method="post">
                    <input type="text" name="username" placeholder="Enter your new username" required class="form-control">
                    <input type="password" name="password"  placeholder="Enter your new password" required class="form-control">
                    <input type="password" name="rPassword"  placeholder="Repeat your password" required class="form-control">
                    <br>
                    <button type="submit" name="submit" class="btn btn-outline-primary">Change credentials</button>
                </form>
                <br>
                <hr>
                <h1>Edit password recovery</h1>
                <form action="includes/recoveryQuestions.inc.php" method="post">
                                      <!-- fetching recovery data -->
                <?php
                while ($recover1 = $recovery->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <input type="text" name="fFriend" value="<?= $recover1['fFriend'] ?>" placeholder="Enter your favorite friend" required class="form-control">
                    <input type="text" name="fColor"  value="<?= $recover1['fColor'] ?>" placeholder="Enter your favorite color" required class="form-control">
                    <input type="number" name="fNumber"  value="<?= $recover1['fNumber'] ?>" placeholder="Repeat your favorite number" required class="form-control">
                    <input type="date" name="mDate"  value="<?= $recover1['mDate'] ?>" placeholder="Enter your new memorable date" required class="form-control">
                    <input type="text" name="fMovie"  value="<?= $recover1['fMovie'] ?>" placeholder="Repeat your favorite movie" required class="form-control">
                    <br>
                    <button type="submit" name="submit" class="btn btn-outline-primary">Save answers</button>
                <?php
                }
                ?>
                </form>
        </div>
    </section>
    
</body>
</html>