<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <div class="container2">
        <h1>User Registration!</h1>

        <!-- Show session messages -->
        <?php
        if (isset($_SESSION['register_error'])) {
            echo "<p align='center' style='color: red; font-weight: bold;'>" . $_SESSION['register_error'] . "</p>";
            unset($_SESSION['register_error']); // clear message after showing
        }
        if (isset($_SESSION['register_success'])) {
            echo "<p align='center' style='color: green; font-weight: bold;'>" . $_SESSION['register_success'] . "</p>";
            unset($_SESSION['register_success']);
        }
        
        ?>

        <form action="control.php" method="post">
            <label>Username:</label>
            <input type="text" name="username" placeholder="Enter Username" required> <br><br>
            <label>Email:</label>
            <input type="email" name="email" placeholder="Enter Email" required><br><br>
            <label>Password:</label>
            <input type="password" name="password"  placeholder="Enter Password" required><br><br>
            <button type="submit" name= "register">REGISTER</button>
        </form><br>
        <p align="center">Already have Account? <a href="login.php">login </a>here!</p>
    </div>
</body>
</html>