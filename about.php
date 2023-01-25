<?php
    require_once 'classes/dbh.class.php';
    include_once 'classes/models/gallery.mod.php';

    //for system company name
    $gallery2 = new Gallery();
    $datas2 = $gallery2->systemDetails();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <section class="about">
        <div>
            <a href="index.php" class="aboutlink">Home</a>
            <h1>About Us</h1>
                 <!-- fetching company's name -->
        <?php
        while ($data2 = $datas2->fetch(PDO::FETCH_ASSOC)) {
        ?>
                 <p><?= $data2['about'] ?></p>
        <?php
        }
        ?>

        </div>
        <div>
            <h2>Developer</h2>
            <br>
            <h4>Louie Jay Cantores</h4>
            <br>
            <p>090-9151-3512</p>
        </div>
    </section>
</body>
</html>