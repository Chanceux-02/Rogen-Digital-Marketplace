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
</head>
<body>
    <section class="form">
        <div class="selected-wrapper">
            <h1>Product Details</h1>
            <a href="index.php">Back</a>
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