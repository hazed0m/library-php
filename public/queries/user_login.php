<?php
require_once CONFIG_PATH . 'database.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Basic validation
if ($username === '' || $password === '') {
    header("Location: ../login.php?error=missing");
    exit;
}

$db = new Database();
$pdo = $db->connect();

// Find matching user
$stmt = $pdo->prepare("SELECT * FROM users WHERE Username = ? AND Password = ?");
$stmt->execute([$username, $password]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header("Location: ../login.php?error=invalid");
    exit;
}

// Successful login
$_SESSION['user'] = $user['Username'];

header("Location: ../index.php");
exit;