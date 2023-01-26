<?php
    //making sure that the request is from the form in index page
    if (!isset($_POST['submit'])) {
        header("Location: ./index.php?WrongWayToEnter");
        exit();
    } else {
        require_once 'classes/dbh.class.php';
        include_once 'classes/models/gallery.mod.php';
    
        //for gallery filter items
        $filter = new Gallery();
        $fdata = $filter->filter();
    }

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
</head>
<body>
    <section class="form">
        <div class="form-wrapper">
        <a href="index.php" class="link">Home</a>
            <h1>Add new product</h1>
            <form action="includes/add.inc.php" method="post" enctype="multipart/form-data">
                <label for="select">Select product group name or Create new product name</label>
                <div class="group-name">
                    <select name="groupName" aria-label="Group name" id="select">
                        <option value="">None</option>
                        <?php
                            while ($filterdata = $fdata->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value=$filterdata[groupName]>$filterdata[groupName]</option>";
                            }
                        ?>
                    </select>
                    <p>or</p>
                    <input type="text" name="newGroupName" placeholder="Enter your new product group name" id="newitem">
                </div>
                
                <input type="file" name="file">
                <input type="text" name="fileName" placeholder="Enter your product picture file name" id="">
                <input type="text" name="title" placeholder="Enter your procuct title" id="">
                <input type="text" name="desc" placeholder="Enter your product description" id="">
                <button type="submit" name="submit">Add product</button>
            </form>
        </div>
    </section>
    
</body>
</html>