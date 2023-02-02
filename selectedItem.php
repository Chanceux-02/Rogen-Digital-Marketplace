<?php
        $id = $_GET['id'];
        require_once 'classes/dbh.class.php';
        include_once 'classes/models/gallery.mod.php';

        // para mag fetch sang selected Items gamit ang id
        $gallerySelected = new Gallery();
        $gallerySel = $gallerySelected->showSelectedItem($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/06b9f7a3c7.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="form">
        <div class="selected-wrapper">
            <h1>Product Details</h1>
            <br>
            <a href="index.php" class="btn btn-outline-primary">Back</a>
            <br>
            <br>
                    <!-- making some query to show a selected data from gallery -->
                    <?php
                    // fetching the selected data
                    while ($selectedItem = $gallerySel->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <section class="gallery">
                            <div class="gallery-container">
                                    <div>
                                        <?php
                                            echo '<div class="gallery-image" style="background-image: url(images/gallery/'.$selectedItem["imgName"].');"></div>';
                                        ?>
                                        <h1><?=$selectedItem['title']?></h1>
                                        <p><?=$selectedItem['description']?></p>
                                        <h1><?=$selectedItem['price']?> Pesos</h1>
                                    </div>
                            </div>
                        </section>
                    <?php } ?>
        </div>
    </section>
    
</body>
</html>