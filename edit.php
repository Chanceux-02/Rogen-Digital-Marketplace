<?php
    require_once 'classes/dbh.class.php';
    include_once 'classes/models/add.mod.php';
    include_once 'classes/models/filter.mod.php';
    include_once 'classes/models/gallery.mod.php';

    //for viewing images
    $gallery = new Gallery();
    $datas = $gallery->show();

    //for gallery filter items
    $filter = new Filter();
    $fdata = $filter->filter();

    //making sure that the id is from the form
    if (!isset($_POST['submit'])) {
        $id = "";
    } else {
        $id = $_POST['id'];
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
                       <option value="">Select group</option>
                <!-- making some query to fetch selected data from database in groupName row -->
                        <?php
                            if (isset($_POST['submit'])) {
                                if (empty($id)) {
                                    header("Location: index.php?emptyfilter");
                                    exit();
                                }
                                include_once "includes/dbh.inc.php";
                                $sql1 = "SELECT groupName FROM gallery WHERE id = '$id';";
                                $stmt1 = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($stmt1, $sql1)) {
                                    echo "SQL statement failed! Error: selecting from gallery";
                                } else {
                                    mysqli_stmt_execute($stmt1);
                                    $result1 = mysqli_stmt_get_result($stmt1);
                                }
                            }
                            ?>

                <!-- fetching all data data from the group name with a distinct order -->
                            <?php
                                while ($filterdata = $fdata->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value=$filterdata[groupName]>$filterdata[groupName]</option>";
                                }
                            ?>
                        </select>
                        <?php

                // fetching the selected data for groupName
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            ?>
                            <input type="text" name="newGroupName" value="<?=$row1['groupName']?>" placeholder="Enter your new product group name" id="newitem">
                            <?php } ?>
                    </div>

                <!-- making some query to show a selected data from gallery -->
                    <?php
                    if (isset($_POST['submit'])) {
                        if (empty($id)) {
                            header("Location: index.php?emptyfilter");
                            exit();
                        }
                        include_once "includes/dbh.inc.php";
                        $sql = "SELECT * FROM gallery WHERE id = '$id';";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "SQL statement failed! Error: selecting from gallery";
                        } else {
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                        }
                    }
                    
                // fetching the selected data
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <section class="gallery">
                        <div class="gallery-container">
                                <a href="http://">
                                    <?php
                                        echo '<div class="gallery-image" style="background-image: url(images/gallery/'.$row["imgName"].');"></div>';
                                    ?>
                                    <h5><?=$row['title']?></h5>
                                    <p><?=$row['description']?></p>
                                    <span>20 dollars</span>

                                </a>
                        </div>
                    </section>
                    <input type="hidden" name="id" value=<?=$id?>>
                    <input type="text" name="title" value="<?=$row['title']?>">
                    <input type="text" name="desc" value="<?=$row['description']?>">
                    <input type="text" name="price" value="<?=$row['price']?>">
                    <button type="submit" name="submit">Edit product</button>
                    <?php } ?>
                </form>
        </div>
    </section>
    
</body>
</html>