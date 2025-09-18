<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <div class="container2">
        <h1>User Login!</h1>

         <!-- Show session messages -->
        <?php
        if (isset($_SESSION['login_error'])) {
            echo "<p align='center' style='color: red; font-weight: bold;'>" . $_SESSION['login_error'] . "</p>";
            unset($_SESSION['login_error']); // clear message after showing
        }

        ?>

        <form action="control.php" method="post">
            <label>Email:</label>
            <input type="email" name="email" placeholder="Enter Email" required><br><br>
            <label>Password:</label>
            <input type="password" name="password" placeholder="Enter Password" required><br><br>
            <button type="submit" name= "login">LOGIN</button>
        </form><br>
        <p align="center">Don't have Account? <a href="register.php">register </a>here!</p>
    </div>
</body>
</html>