<?php
    require_once 'classes/dbh.class.php';
    include_once 'classes/models/add.mod.php';
    include_once 'classes/models/gallery.mod.php';

    //for gallery items
    $gallery = new Gallery();
    $datas = $gallery->show();
    
    //for gallery filter items
    $filter = new Gallery();
    $fdata = $filter->filter();

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
    <title>Gallery</title>
    <link rel="stylesheet" href="css/main.css">
    
</head>
<body>

    <header class="header">
        <div class="header-container">
            <!-- fetching company's name -->
        <?php
        while ($data2 = $datas2->fetch(PDO::FETCH_ASSOC)) {
            ?>
                 <h1><?= $data2['companyName'] ?></h1>
       
            <div class="header-links">
                <a href="about.php">About</a>
                <a href="#footer">Contact</a>
                <form action="add.php" method="post">
                    <button type="submit" name="submit">Add Item</button>
                </form>
                <form action="editContent.php" method="post">
                    <button type="submit" name="submit">Edit Details</button>
                </form>
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
        <form action="editGroups.php" method="post" class="filterform2">
        <button type="groupButton" name="groupName">Edit Group Names</button>
        </form>
    </section>
                
    <section class="gallery">
        <div class="gallery-container">
            <?php 
                while ($data = $datas->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <a href="selectedItem.php?id=<?=$data['id']?>">
                    <?php
                        echo '<div class="gallery-image" style="background-image: url(images/gallery/'.$data["imgName"].');"></div>';
                    ?>
                    <h5><?=$data['title']?></h5>
                    <p><?=$data['description']?></p>
                    <h5><?=$data['price']?> Pesos</h5>
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

    <footer id="footer">
    <section class="footer">
        <div class="footer-container">
            <h1>Contact_</h1>
            <div class="footer-links">

                <!-- fetching company's contact (amuni ang sugpon ya sa babaw)-->
                        <a href=<?= $data2['fb'] ?> style="text-decoration: none; color: white;"><?= $data2['fb'] ?></a>
                        <p><?= $data2['number'] ?></p>
                        <p><?= $data2['address'] ?></p>
                <?php
                }
                ?>
                <!-- end of while loop -->
            </div>
        </div>
    </section>
    </footer>
        
</body>
</html>