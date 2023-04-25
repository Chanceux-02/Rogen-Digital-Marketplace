<?php
    session_start();

    require_once 'classes/dbh.class.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/06b9f7a3c7.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
</head>
<body>
    <section class="header1">
        <div class="header2">
        <header class="header">
            <div class="header-container">
                <!-- fetching company's name -->
            <?php
            while ($data2 = $datas2->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <h1><?= $data2['companyName'] ?></h1>
        
                <div class="header-links">
                    <a href="about.php" class="btn btn-outline-light btn-sm">About</a>
                    <a href="#footer" class="btn btn-outline-light btn-sm">Contact</a>
                    <?php
                    if(!isset($_SESSION["stat"])){ 
                    ?>
                        <form action="login.php" method="post">
                            <button type="submit" name="submit" class="btn btn-outline-light btn-sm">Log in</button>
                        </form>
                    <?php
                    }else{
                    ?>
                        <form action="add.php" method="post">
                            <button type="submit" name="submit" class="btn btn-outline-light btn-sm">Add Item</button>
                        </form>
                        <form action="editContent.php" method="post">
                            <button type="submit" name="submit" class="btn btn-outline-light btn-sm">Settings</button>
                        </form>
                        <form action="includes/logout.php" method="post">
                            <button type="submit" name="submit" class="btn btn-outline-light btn-sm">Log out</button>
                        </form>
                    <?php        
                        }
                    ?>
                </div>
            </div>
        </header>
        </div>
    </section>
    <section class="filter" id="navbar">
        <div>
            <a href="index.php"><i class="fa-solid fa-house-user fa-lg"></i></a>    
            <a href="newsFeed.php" ><i class="fa-solid fa-newspaper fa-lg"></i></a>    
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
                <button type="submit" name="submit" class="iconSize"><i class="fa-solid fa-filter fa-lg"></i></button>
            </form>
            
            <?php
            if(isset($_SESSION["stat"])){ 
            ?>
            <form action="editGroups.php" method="post" class="filterform2">
                <button type="groupButton" name="groupName" class="iconSize"><i class="fa-solid fa-pen-to-square fa-lg"></i> Category</button>
            </form>
     
            <?php        
                }
            ?>
          
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

  
                    <?php
            if(isset($_SESSION["stat"])){ 
            ?>
                    <div class="gallery-forms">
                        <form action="edit.php" method="post">
                            <input type="hidden" name="id" value=<?=$data['id']?>>
                            <button type="submit" name="submit" class="btn btn-outline-primary btn-sm">Edit</button>
                        </form>
                        <form action="includes/delete.inc.php" method="post">
                            <input type="hidden" name="imgname" value=<?=$data['imgName']?>>
                            <input type="hidden" name="id" value=<?=$data['id']?>>
                            <button type="submit" name="submit" class="btn btn-outline-primary btn-sm">Delete</button>
                        </form>
                    </div>
            <?php        
                }
            ?> 
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
    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>