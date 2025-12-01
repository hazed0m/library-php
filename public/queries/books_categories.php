<?php
    require_once CONFIG_PATH . 'database.php';
    // Connect
    $db = new Database();
    $pdo = $db->connect();

    // Query
    $stmt = $pdo->query("
        SELECT 
            categories.*
        FROM categories
        WHERE 1=1
    ");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>