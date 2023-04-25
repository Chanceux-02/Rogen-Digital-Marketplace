<?php
    require_once 'classes/dbh.class.php';
    include_once 'classes/models/gallery.mod.php';

    //for gallery filter items
    $filter = new Gallery();
    $fdata = $filter->filter();

    $fdata2 = $filter->filter();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit product group</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/06b9f7a3c7.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="form">
        <div class="form-wrapper bg-light p-3 py-5 rounded mt-5">
            <a href="index.php" class="btn btn-outline-primary">Home</a>
                <h1>Edit Category Name</h1>
                <form action="includes/groupEdit.inc.php" method="post">
                    <label for="select">Select category name and enter your new category name</label>
                    <div class="group-name">
                        <select name="groupName" aria-label="Group name" id="select" class="form-select">
                            <option value="">Select category name</option>
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
                        <p>to</p>
                        <input type="text" name="newGroupName" placeholder="Enter your new product category name" class="form-control">
                    </div>
                    <br>
                    <button type="submit" name="submit" class="btn btn-outline-primary">Edit category category name</button>
                    <br>
                    <h1>Delete Category and Items</h1>
                </form>
                <form action="includes/deleteCategory.inc.php" method="post">
                <label for="select">Select category to delete</label>
                    
                        <select name="groupName" aria-label="Group name" id="select" class="form-select ps-3">
                            <option value="">Select category name</option>
                            <?php
                        while ($filterdata2 = $fdata2->fetch(PDO::FETCH_ASSOC)) {
                            //making new name for cateogry name or group name
                            $newFileName = $filterdata2['groupName'];

                            // converting dash to space
                            $newFileName = strtolower(str_replace("-", " ", $newFileName));
                            // converting first word small letter to big
                            $firstLetter = ucwords($newFileName);
                            $newName = $firstLetter;

                            echo "<option value=$filterdata2[groupName]>$newName</option>";
                        }
                    ?>
                        </select>
                        <br>
                    <button type="submit" name="submit" class="btn btn-outline-primary">Delete</button>
                </form>
        </div>
    </section>
    
</body>
</html>