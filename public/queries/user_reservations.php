<?php
    require_once __DIR__ . '/../../config/database.php';
    require_once __DIR__ . '/../../config/init.php';
    
    // Connect
    $db = new Database();
    $pdo = $db->connect();

    // Limits
    $limit = 5; // results per page
    $page  = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $offset = ($page - 1) * $limit;

    // Params
    $username = $_SESSION['user'];

    // Query
    $sql = "
        SELECT 
            books.*,
            reservations.Username,
            reservations.ISBN,
            reservations.ReservedDate,
            categories.CategoryDesc
        FROM books 
        LEFT JOIN reservations 
            ON books.ISBN = reservations.ISBN
        LEFT JOIN categories 
            ON books.categoryID = categories.categoryID
        WHERE 1 = 1
    ";

    $count_sql = "
        SELECT COUNT(*) 
        FROM books
        LEFT JOIN reservations 
            ON books.ISBN = reservations.ISBN
        LEFT JOIN categories 
            ON books.categoryID = categories.categoryID
        WHERE 1=1
    ";

    // Filters
    $params = [];
    if ($username !== '') {
        $sql .= " AND reservations.Username = ? ";
        $count_sql .= " AND reservations.Username = ? ";
        $params[] = $username;
    }

    $count_stmt = $pdo->prepare($count_sql);
    $count_stmt->execute($params);
    $total_books = $count_stmt->fetchColumn();


    $total_pages = ceil($total_books / $limit);

    $sql .= "LIMIT $limit OFFSET $offset";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

    include TEMPLATES_PATH . 'results_template.php';
?>