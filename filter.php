<?php
session_start();
    //making sure that the request is from the form in index page
    if (!isset($_POST['submit'])) {
        $gName = "";
        header("Location: ./index.php?WrongWayToEnter");
        exit();
    } else {
    require_once 'classes/dbh.class.php';
    include_once 'classes/models/gallery.mod.php';

    //for gallery filter items
    $filter = new Gallery();
    $fdata = $filter->filter();
    
    //getting data from the form
    $gName = $_POST['filter'];

    //query for selected category filter items
    $filterGroup = new Gallery();
    $filterG = $filterGroup->showSelectedCategory($gName);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/06b9f7a3c7.js" crossorigin="anonymous"></script>
</head>
<body>

    <header class="header">
        <div class="header-container">
            <h1>Some Company Name</h1>
            <div class="header-links">
                <a href="about.php" class="btn btn-outline-light btn-sm">About</a>
                <a href="contact.php" class="btn btn-outline-light btn-sm">Contact</a>
            </div>
        </div>
    </header>

    <!-- filter -->
    <section class="filter" id="navbar">
        <div>
            <a href="index.php"><i class="fa-solid fa-house-user fa-lg"></i></a>    
            <a href="newsFeed.php"><i class="fa-solid fa-newspaper fa-lg"></i></a>    
        </div>
            <form action="filter.php" method="post">
                <select name="filter" aria-label="Filter Options">
                <option value="">Select Filter</option>
                <?php
                    while ($filterdata = $fdata->fetch(PDO::FETCH_ASSOC)) {
                         //making new name for cateogry name or group name
                        $newFileName = $filterdata['groupName'];

                        // converting dash to space
                        $newFileName = strtolower(str_replace("-", " ", $newFileName));
                        // converting first word small letter to big
                        $firstLetter = ucwords($newFileName);
                        $newName = $firstLetter;

                        echo "<option value=$filterdata[groupName]>$newName</option>";
                    }
                ?>
                </select>
                <button type="submit" name="submit"><i class="fa-solid fa-filter fa-lg"></i></button>
            </form>
            <a href="index.php">View all</i></a>
    </section>
    <!-- gallery -->
    <section class="gallery">
        <div class="gallery-container">
            <?php          
                while ($groupFilter = $filterG->fetch(PDO::FETCH_ASSOC)) {
            ?>
                    <a href="selectedItem.php?id=<?=$groupFilter['id']?>">
                        <?php
                            echo '<div class="gallery-image" style="background-image: url(images/gallery/'.$groupFilter["imgName"].');"></div>';
                        ?>
                        <h5><?= $groupFilter["title"];?></h5>
                        <p><?= $groupFilter["description"];?></p>
                        <h4><?= $groupFilter["price"];?> Pesos</h4>
                        <?php
                        if(isset($_SESSION["stat"])){ 
                        ?>
                        <div class="gallery-forms">
                            <form action="edit.php" method="post">
                                <input type="hidden" name="id" value=<?=$groupFilter['id']?>>
                                <button type="submit" name="submit" class="btn btn-outline-primary btn-sm">Edit</button>
                            </form>
                            <form action="includes/delete.inc.php" method="post">
                                <input type="hidden" name="imgname" value=<?=$groupFilter['imgName']?>>
                                <input type="hidden" name="id" value=<?=$groupFilter['id']?>>
                                <button type="submit" name="submit" class="btn btn-outline-primary btn-sm">Delete</button>
                            </form>
                        </div>
                        <?php        
                            }
                        ?>
                    </a>

                <?php  
                }
                ?>
        </div>
    </section>
    <script src="js/main.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>   
</body>
</html>