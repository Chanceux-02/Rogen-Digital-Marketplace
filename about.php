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
    <link rel="stylesheet" href="css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/06b9f7a3c7.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="about bg-light p-5 mb-5">
        <div>
            <a href="index.php" class="aboutlink btn btn-outline-primary">Home</a>
            <br>
            <br>
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
            <hr>
            <h2>Developer</h2>
            <br>
            <h4>Louie Jay Cantores</h4>
            <br>
            <p>090-9151-3512</p>
        </div>
    </section>
</body>
</html>