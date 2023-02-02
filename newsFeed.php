<?php
    session_start();

    require_once 'classes/dbh.class.php';
    include_once 'classes/models/gallery.mod.php';
    

    //for displaying newsfeed
    $gallery2 = new Gallery();
    $datas2 = $gallery2->newsfeed();
    
    //for displaying system details
    $gallery2 = new Gallery();
    $datas = $gallery2->systemDetails();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/newsFeed.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/06b9f7a3c7.js" crossorigin="anonymous"></script>
</head>
<body>

    <header class="header">
        <div class="header-container">
            <!-- fetching company's name -->
        <?php
        while ($data = $datas->fetch(PDO::FETCH_ASSOC)) {
            ?>
                 <h1><?= $data['companyName'] ?></h1>
       
            <div class="header-links">
                <a href="about.php" class="btn btn-outline-light btn-sm">About</a>
                <a href="#footer" class="btn btn-outline-light btn-sm">Contact</a>
            </div>
        </div>
    </header>

    <section class="filter" id="navbar">
        <div class="d-flex justify-content-between">
            <a href="index.php" class="border border-0"><i class="fa-solid fa-house-user fa-lg"></i></a>    
            <a href="newsFeed.php" class="border border-0"><i class="fa-solid fa-newspaper fa-lg"></i></a>    
        </div>
          
        <?php
            if(isset($_SESSION["stat"])){ 
            ?>
             <form action="addPost.php" method="post" class="filterform2">
                <button type="groupButton" name="groupName">Add Post</button>
            </form>
            <?php        
                }
            ?>
    </section>
                
    <section class="gallery">
        <div class="gallery-container">
            <?php 
                while ($data1 = $datas2->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div>
                    <p><?=$data1['created_at']?></p>
                    <div class="image-container">
                        <?php
                            echo '<div class="gallery-image" style="background-image: url(images/gallery/'.$data1["filename"].');"></div>';
                        ?>
                    </div>
                    <p><?=$data1['content']?></p>
                    <div class="gallery-forms">
                        <form action="includes/deletePost.inc.php" method="post">
                            <input type="hidden" name="imgname" value=<?=$data1['filename']?>>
                            <input type="hidden" name="id" value=<?=$data1['id']?>>
                            <?php
                            if(isset($_SESSION["stat"])){ 
                            ?>
                            <button type="submit" name="submit" class="btn btn-outline-primary btn-sm">Delete</button>
                            <?php        
                                }
                            ?>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
                <?php
                }
                ?>
                <script src="js/main.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    
</body>
</html>