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
</head>
<body>
    <section class="form">
        <div class="form-wrapper">
        <a href="index.php" class="link">Home</a>
            <h1>Edit Company Details</h1>
            <form action="includes/editContent.inc.php" method="post" enctype="multipart/form-data">
                                 <!-- fetching company's name -->
            <?php
            while ($data2 = $datas2->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <input type="text" name="name" value="<?= $data2['companyName'] ?>" placeholder="Enter your company name">
                <input type="text" name="number" value="<?= $data2['number'] ?>" placeholder="Enter your contact number">
                <input type="text" name="fb" value="<?= $data2['fb'] ?>" placeholder="Enter your facebook link">
                <input type="text" name="address" value="<?= $data2['address'] ?>" placeholder="Enter your store location address">
                <textarea class="about" name="about"><?= $data2['about'] ?></textarea>
                <button type="submit" name="submit">Edit Details</button>
            <?php
            }
            ?>
            </form>
        </div>
    </section>
    
</body>
</html>