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
            <h1>Big Company</h1>
            <div class="header-links">
                <a href="http://">About</a>
                <a href="http://">Contact</a>
                <a href="add.html">Add Item</a>
            </div>
        </div>
    </header>

    <section class="filter">
        <form action="index.html" method="post">
            <select name="filter" aria-label="Filter Options">
                <option value="">Select Filter</option>
                <option value="">Select Filter</option>
                <option value="">Select Filter</option>
            </select>
            <button type="submit" name="submit">Filter</button>
            <a href="index.html">View all</a>
        </form>
    </section>

    <section class="gallery">
        <div class="gallery-container">
            <a href="http://">
                <div class="gallery-image"></div>
                <h3>This is the title</h3>
                <p>This is the description</p>
                <div class="gallery-forms">
                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="">
                        <button type="submit" name="submit">Edit</button>
                    </form>
                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="">
                        <button type="submit" name="submit">Delete</button>
                    </form>
                </div>
            </a>
            <a href="http://">
                <div class="gallery-image"></div>
                <h3>This is the title</h3>
                <p>This is the description</p>
                <div class="gallery-forms">
                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="">
                        <button type="submit" name="submit">Edit</button>
                    </form>
                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="">
                        <button type="submit" name="submit">Delete</button>
                    </form>
                </div>
            </a>
            <a href="http://">
                <div class="gallery-image"></div>
                <h3>This is the title</h3>
                <p>This is the desc ria sdfas dfasd fadsfa sdfad sfads ption </p>
                <div class="gallery-forms">
                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="">
                        <button type="submit" name="submit">Edit</button>
                    </form>
                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="">
                        <button type="submit" name="submit">Delete</button>
                    </form>
                </div>
            </a>
            <a href="http://">
                <div class="gallery-image"></div>
                <h3>This is the title</h3>
                <p>This is the description</p>
                <div class="gallery-forms">
                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="">
                        <button type="submit" name="submit">Edit</button>
                    </form>
                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="">
                        <button type="submit" name="submit">Delete</button>
                    </form>
                </div>
            </a>
            <a href="http://">
                <div class="gallery-image"></div>
                <h3>This is the title</h3>
                <p>This is the description</p>
                <div class="gallery-forms">
                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="">
                        <button type="submit" name="submit">Edit</button>
                    </form>
                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="">
                        <button type="submit" name="submit">Delete</button>
                    </form>
                </div>
            </a>
            <a href="http://">
                <div class="gallery-image"></div>
                <h3>This is the title</h3>
                <p>This is the description</p>
                <div class="gallery-forms">
                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="">
                        <button type="submit" name="submit">Edit</button>
                    </form>
                    <form action="edit.php" method="post">
                        <input type="hidden" name="id" value="">
                        <button type="submit" name="submit">Delete</button>
                    </form>
                </div>
            </a>
        </div>
    </section>
    
</body>
</html>