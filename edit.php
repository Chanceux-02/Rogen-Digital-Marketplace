<?php
    //making sure that the request is from the form in index page
    if (!isset($_POST['submit'])) {
        $id = "";
        header("Location: ./index.php?WrongWayToEnter");
        exit();
    } else {
        $id = $_POST['id'];

        require_once 'classes/dbh.class.php';
        include_once 'classes/models/add.mod.php';
        include_once 'classes/models/gallery.mod.php';
    
        //for category filter items
        $filter = new Gallery();
        $fdata = $filter->filter();

        // para mag fetch sang selected product group name gamit ang id
        $galleryF = new Gallery();
        $galleryFil = $galleryF->groupName($id);

        // para mag fetch sang selected Items gamit ang id
        $gallerySelected = new Gallery();
        $gallerySel = $gallerySelected->showSelectedItem($id);
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <section class="form">
        <div class="form-wrapper">
            <h1>Edit existing product</h1>
            <a href="index.php">Back</a>
                <form action="includes/edit.inc.php" method="post">
                    <label for="select">To edit group name, select or create new product name</label>
                    <div class="group-name">
                        <select name="groupName" aria-label="Group name" id="select">

                            <!-- making placeholder and value for default option -->
                            <?php
                            while ($filterdata22 = $galleryFil->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value=$filterdata22[groupName]>$filterdata22[groupName]</option>";
                            } 
                            ?>
                            <!-- fetching all data data from the group name with a distinct order -->
                            <?php
                                while ($filterdata = $fdata->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value=$filterdata[groupName]>$filterdata[groupName]</option>";
                                }
                            ?>
                        </select>
                            <input type="text" name="newGroupName" placeholder="Enter your new product group name" id="newitem">
                    </div>

                    <!-- making some query to show a selected data from gallery -->
                    <?php
                    // fetching the selected data
                    while ($selectedItem = $gallerySel->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <section class="gallery">
                        <div class="gallery-container">
                                <a href="http://">
                                    <?php
                                        echo '<div class="gallery-image" style="background-image: url(images/gallery/'.$selectedItem["imgName"].');"></div>';
                                    ?>
                                    <h5><?=$selectedItem['title']?></h5>
                                    <p><?=$selectedItem['description']?></p>
                                    <span>20 dollars</span>

                                </a>
                        </div>
                    </section>
                    <input type="hidden" name="id" value=<?=$id?>>
                    <input type="text" name="title" value="<?=$selectedItem['title']?>">
                    <input type="text" name="desc" value="<?=$selectedItem['description']?>">
                    <input type="text" name="price" value="<?=$selectedItem['price']?>">
                    <button type="submit" name="submit">Edit product</button>
                    <?php } ?>
                </form>
        </div>
    </section>
    
</body>
</html>