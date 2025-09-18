<?php
session_start();

// Block if not logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <h2 align="center" id="heading">Hello <?php echo htmlspecialchars($_SESSION['username']); ?>, Welcome to Dash-Board!</h2>
    <div class="container">
        <h1>To-DO List</h1>
        <form action="" method="post">
            <input type="text" name="task" placeholder="Enter a new Task">
            <button type="submit" name= "addtask">ADD</button>
        </form>
    </div>
    <p id="logout"><a href="logout.php">Logout</a></p>
</body>
</html>