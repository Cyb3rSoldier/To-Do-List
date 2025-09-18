<?php
session_start();
require_once 'config.php';

// REGISTER
if (isset($_POST['register'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email exists
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['register_error'] = "Email already exists! Please login.";
        $_SESSION['active_form'] = "register";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);
        $stmt->execute();

        $_SESSION['register_success'] = "You have registered successfully! Please login now.";
        $_SESSION['active_form'] = "login";
    }

    header("Location: register.php");
    exit();
}

// LOGIN
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // check user
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            // store session
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];

            header("Location: index.php");
            exit();
        } else {
            // Wrong password
            $_SESSION['login_error'] = "Incorrect email or password";
            $_SESSION['active_form'] = "login";
            header("Location: login.php");
            exit();
        }
    } else {
        // No user found
        $_SESSION['login_error'] = "Incorrect email or password";
        $_SESSION['active_form'] = "login";
        header("Location: login.php");
        exit();
    }
}

?>
