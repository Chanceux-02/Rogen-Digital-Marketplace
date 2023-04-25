<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/06b9f7a3c7.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
</head>
<body>
    <section class="form">
        <div class="form-wrapper bg-light rounded py-5 px-2">
            <a href="index.php" class="btn btn-outline-primary">Home</a>
            <br>
                <h1>Add new post</h1>
                <form action="includes/newsfeed.inc.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file" required class="form-control px-4">
                    <textarea class="about form-control" name="content" placeholder="Enter your content" required></textarea>
                    <br>
                    <button type="submit" name="submit" class="btn btn-outline-primary">Add post</button>
                </form>
        </div>
    </section>
    
</body>
</html>