<?php
    require_once 'classes/dbh.class.php';
    include_once 'classes/models/add.mod.php';
    include_once 'classes/models/filter.mod.php';
    include_once 'classes/models/gallery.mod.php';

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

    <!-- filter -->
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
            <a href="index.php">View All</a>
        </form>
    </section>

    <!-- gallery -->
    <section class="gallery">
        <div class="gallery-container">
            <?php
                if (isset($_POST['submit'])) {
                    $gName = $_POST['filter'];
                    if (empty($gName)) {
                    header("Location: index.php?emptyfilter");
                    exit();
                    }
                    include_once "includes/dbh.inc.php";
                    $sql = "SELECT * FROM gallery WHERE groupName = '$gName';";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL statement failed! Error: selecting from gallery";
                    }else{
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <a href="http://">
                            <?php
                              echo '<div class="gallery-image" style="background-image: url(images/gallery/'.$row["imgName"].');"></div>';
                            ?>
                            <h3><?= $row["title"];?></h3>
                            <p><?= $row["description"];?></p>
                            <div class="gallery-forms">
                                <form action="edit.php" method="post">
                                    <input type="hidden" name="id" value=<?=$row['id']?>>
                                    <button type="submit" name="submit">Edit</button>
                                </form>
                                <form action="includes/delete.inc.php" method="post">
                                    <input type="hidden" name="imgname" value=<?=$row['imgName']?>>
                                    <input type="hidden" name="id" value=<?=$row['id']?>>
                                    <button type="submit" name="submit">Delete</button>
                                </form>
                            </div>
                        </a>

                        <?php

                        }
                    }
                }
            ?>
        </div>
    </section>
</body>
</html>