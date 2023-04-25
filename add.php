<?php
        require_once 'classes/dbh.class.php';
        include_once 'classes/models/gallery.mod.php';
    
        //for gallery filter items
        $filter = new Gallery();
        $fdata = $filter->filter();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/06b9f7a3c7.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
</head>
<body>
    <section class="form">
        <div class="form-wrapper bg-light p-3 py-5 rounded">
            <a href="index.php" class="link btn btn-outline-primary">Home</a>
            <br>
            <br>
                <h1>Add new product</h1>
                 <!-- para mag kwa sang error sa url kag mag display -->
                <?php 
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    if (strpos($fullUrl, "error=overPrice") == true) {
                        echo '<p class="text-danger">The product price is too big!</p>';
                    }else if (strpos($fullUrl, "extensionfailed") == true) {
                        echo '<p class="text-danger">Please select another image!</p>';
                    }else if (strpos($fullUrl, "error=imagesize") == true) {
                        echo '<p class="text-danger">Image size is too large!</p>';
                    }
                ?>
                <form action="includes/add.inc.php" method="post" enctype="multipart/form-data">
                    <label for="select">Select product category name or Create new category name</label>
                    <div class="group-name">
                        <select name="groupName" aria-label="Group name" id="select" class="form-select p-1">
                            <option value="">None</option>
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
                        <p>or</p>
                        <input type="text" name="newGroupName" placeholder="Enter your new product group name" id="newitem" class="form-control">
                    </div>
                    
                    <input type="file" name="file" required class="form-control">
                    <input type="text" name="title" placeholder="Enter your procuct title" required class="form-control">
                    <input type="text" name="desc" placeholder="Enter your product description" required class="form-control">
                    <input type="number" name="price" placeholder="Enter your product price" required class="form-control">
                    <br>
                    <button type="submit" name="submit" class="btn btn-outline-primary">Add product</button>
                </form>
        </div>
    </section>
    
</body>
</html>