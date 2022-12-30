<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="diary.css">
    <title>Diary</title>
</head>
<body>
    <nav>
        <p>
           Hello, <strong>
           <?php
                if(isset($_SESSION['name'])){
                    echo ucfirst($_SESSION['name']);
                }else echo "Guest";
            ?></strong>. Welcome to the Secret Diary!
        </p>
        <?php
        if(isset($_SESSION['name'])){
            echo "<a href='logout.php'>Logout</a>";
        }else echo "<a href='index.php'>Sign-in</a>";
        ?>
    </nav>
    <textarea autofocus name="" id="" placeholder="I'm loving this!!"></textarea>
</body>
</html>