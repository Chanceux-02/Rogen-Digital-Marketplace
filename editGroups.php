<?php
    require_once 'classes/dbh.class.php';
    include_once 'classes/models/filter.mod.php';

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
    <title>Edit product group</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <section class="form">
        <div class="form-wrapper">
        <a href="index.php" class="link">Home</a>
            <h1>Edit Group Name</h1>
            <form action="includes/groupEdit.inc.php" method="post" enctype="multipart/form-data">
                <label for="select">Select group name and enter your new group name</label>
                <div class="group-name">
                    <select name="groupName" aria-label="Group name" id="select">
                        <option value="">Select to edit</option>
                        <?php
                            while ($filterdata = $fdata->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value=$filterdata[groupName]>$filterdata[groupName]</option>";
                            }
                        ?>
                    </select>
                    <p>to</p>
                    <input type="text" name="newGroupName" placeholder="Enter your new product group name">
                </div>
                <button type="submit" name="submit">Edit product group name</button>
            </form>
        </div>
    </section>
    
</body>
</html>