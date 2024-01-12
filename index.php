<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'newdb') or die();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <style>
        #dis-flex {
            display: flex;
            column-gap: 15px;
        }

        div {
            margin: 20px auto;
        }
    </style>
</head>

<body>
    <form action="index.php" method="post">
        <div>username :- <input type="text" name="uname" id=""></div>
        <div>password :- <input type="password" name="upwd" id=""></div>
        <div id="dis-flex">
            <input type="submit" value="submit">
            <input type="reset" value="reset">
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['uname'];
        $userpwd = $_POST['upwd'];

        $query = mysqli_query($conn, "SELECT * FROM admin_table WHERE username = '$username' AND password = '$userpwd'");
        $found = false;

        if ($query) {
            while ($result = mysqli_fetch_array($query)) {
                if ($username == $result['username'] && $userpwd == $result['password']) {
                    $found = true;
                    $_SESSION["uname"] = $username;
                    $_SESSION["upwd"] = $userpwd;
                    break; // Exit the loop once a match is found
                }
            }   

            if ($found) {
                echo "<script>window.alert('Login successful')</script>";
                echo "<script>window.location.href='login.php'</script>";
            } else {
                echo "<script>window.alert('Login not successful')</script>";
                echo "<script>window.location.href='index.php'</script>";
            }
        } else {
            echo "<script>window.alert('Not able to run query from server')</script>";
        }
    }
    ?>
</body>
</html>