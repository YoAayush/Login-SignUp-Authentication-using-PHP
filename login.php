<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>after login page</title>
</head>
<body>
    <h1 style="text-align: center;">
        Welcome <?php 
            echo $_SESSION["uname"];
        ?>
    </h1>
    <p>this is the after login panel</p>
    <a href="logout.php">click here to logout</a>
</body>
</html>