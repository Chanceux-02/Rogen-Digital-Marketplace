<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/06b9f7a3c7.js" crossorigin="anonymous"></script>
</head>
<body>
<section class="form">
        <div class="form-wrapper pt-5">
        <a href="index.php" class="btn btn-outline-primary">Back</a>
        <h1>Log in</h1>
        <br>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="username" placeholder="Enter your User name" required class="form-control">
            <input type="password" name="pwd" placeholder="Enter your password" required class="form-control">
            <br>
            <button type="submit" name="submit" class="btn btn-outline-primary">Login</button>
            <br>
            <a href="recoverPage.php">Forget password</a>
        </form>
        </div>
    </section>
</body>
</html>