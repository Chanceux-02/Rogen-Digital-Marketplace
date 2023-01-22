<?php
    require_once 'classes/dbh.class.php';
    include_once 'classes/models/add.mod.php';
    include_once 'classes/models/gallery.mod.php';

    $gallery = new Gallery();
    $datas = $gallery->show();

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
                        <select name="itemName" aria-label="Group name" id="select">
                            <option value="">Group Name</option>
                            <option value="">Group Name</option>
                            <option value="">Group Name</option>
                        </select>
                        <input type="text" name="newItemName" placeholder="Enter your new product group name" id="newitem">
                    </div>
                    <input type="hidden" name="id" value=<?=$id?>>
                    <input type="text" name="title" placeholder="Enter your procuct title" id="">
                    <input type="text" name="desc" placeholder="Enter your product description" id="">
                    <button type="submit" name="submit">Edit product</button>
                </form>
        </div>
    </section>
    
</body>
</html>