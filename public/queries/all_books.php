<?php
    require_once CONFIG_PATH . 'database.php';
    // Connect
    $db = new Database();
    $pdo = $db->connect();  

    // Limits
    $limit = 5; // results per page
    $page  = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $offset = ($page - 1) * $limit;

    // Query
    $count_sql = "
        SELECT COUNT(*) 
        FROM books
    ";
    
    $total_books = $pdo->query($count_sql)->fetchColumn();
    $total_pages = ceil($total_books / $limit);

    $sql = "
        SELECT
            books.*,
            reservations.Username,
            reservations.ReservedDate,
            categories.CategoryDesc
        FROM books
        LEFT JOIN reservations ON books.ISBN = reservations.ISBN
        LEFT JOIN categories ON books.categoryID = categories.categoryID
        WHERE 1=1
        LIMIT $limit OFFSET $offset
    ";

    $stmt = $pdo->query($sql);
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    include TEMPLATES_PATH . 'results_template.php';
?>