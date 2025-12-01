<?php
    require_once CONFIG_PATH . 'database.php';
    // Connect
    $db = new Database();
    $pdo = $db->connect();

    // Query
    $stmt = $pdo->prepare("SELECT * FROM users WHERE Username = ?");
    $stmt->execute([$_SESSION['user']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
?>