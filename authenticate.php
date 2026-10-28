<?php
session_start();
require_once "config.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// basic safety
$username = trim($username);
$password = trim($password);

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result && $result->num_rows == 1) {

    $user = $result->fetch_assoc();

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    header("Location: dashboard.php");
    exit();

} else {
    $_SESSION['login_error'] = "Invalid credentials";
    header("Location: login.php");
    exit();
}
?>