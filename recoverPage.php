<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recovery</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/06b9f7a3c7.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="form">
        <h3 class="p-5 text-center">Forget password</h3>
        <div class="form-wrapper bg-light p-3 py-5 rounded">
                <a href="index.php" class="btn btn-outline-primary ms-1">Back</a>
                <h1>Password recovery</h1>
                <form action="includes/forgetPwd.inc.php" method="post">
                    <input type="text" name="fFriend" placeholder="Enter your favorite friend" required class="form-control">
                    <input type="text" name="fColor" placeholder="Enter your favorite color" required class="form-control">
                    <input type="number" name="fNumber" placeholder="Repeat your favorite number" required class="form-control">
                    <input type="date" name="mDate" placeholder="Enter your new memorable date" required class="form-control">
                    <input type="text" name="fMovie" placeholder="Repeat your favorite movie" required class="form-control">
                    <br>
                    <button type="submit" name="submit" class="btn btn-outline-primary">Save answers</button>
                </form>
        </div>
    </section>
    
</body>
</html>