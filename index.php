<?php
    require_once 'classes/dbh.class.php';
    include_once 'classes/models/add.mod.php';
    include_once 'classes/models/filter.mod.php';
    include_once 'classes/models/gallery.mod.php';

    //for gallery items
    $gallery = new Gallery();
    $datas = $gallery->show();
    
    //for gallery filter items
    $filter = new Filter();
    $fdata = $filter->filter();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/main.css">
    
</head>
<body>

    <header class="header">
        <div class="header-container">
            <h1>Some Company Name</h1>
            <div class="header-links">
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
                <a href="add.php">Add Item</a>
            </div>
        </div>
    </header>

    <section class="filter">
        <form action="filter.php" method="post">
            <select name="filter" aria-label="Filter Options">
            <option value="">Select Filter</option>
            <?php
                while ($filterdata = $fdata->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=$filterdata[groupName]>$filterdata[groupName]</option>";
                }
            ?>
            </select>
            <button type="submit" name="submit">Filter</button>
        </form>
    </section>

    <section class="gallery">
        <div class="gallery-container">
            <?php 
                while ($data = $datas->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <a href="http://">
                    <?php
                        echo '<div class="gallery-image" style="background-image: url(images/gallery/'.$data["imgName"].');"></div>';
                    ?>
                    <h3><?=$data['title']?></h3>
                    <p><?=$data['description']?></p>
                    <div class="gallery-forms">
                        <form action="edit.php" method="post">
                            <input type="hidden" name="id" value=<?=$data['id']?>>
                            <button type="submit" name="submit">Edit</button>
                        </form>
                        <form action="includes/delete.inc.php" method="post">
                            <input type="hidden" name="imgname" value=<?=$data['imgName']?>>
                            <input type="hidden" name="id" value=<?=$data['id']?>>
                            <button type="submit" name="submit">Delete</button>
                        </form>
                    </div>
                </a>
            <?php } ?>
        </div>
    </section>
    
</body>
</html>