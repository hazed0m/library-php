<?php
    require_once __DIR__ . '/../../config/database.php';
    require_once __DIR__ . '/../../config/init.php';

    // Connect
    $db = new Database();
    $pdo = $db->connect();

    // Params
    $title         = $_GET['title']    ?? '';
    $author        = $_GET['author']   ?? '';
    $category_arr  = explode("-", $_GET['category'] ?? '-');
    $category      = $category_arr[0] ?? '';
    $category_name = $category_arr[1] ?? '';

    // Limits
    $limit = 5; // results per page
    $page  = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $offset = ($page - 1) * $limit;

    // Query

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
    ";

    $count_sql = "
        SELECT COUNT(*) 
        FROM books
        WHERE 1=1
    ";

    // Filters
    $params = [];

    if ($title !== '') {
        $count_sql .= " AND books.BookTitle LIKE ? ";
        $sql .= " AND books.BookTitle LIKE ? ";
        $params[] = "%$title%";
    }
    if ($author !== '') {
        $count_sql .= " AND books.Author LIKE ? ";
        $sql .= " AND books.Author LIKE ? ";
        $params[] = "%$author%";
    }
    if ($category !== '' && $category !== '0') {
        $count_sql .= " AND books.CategoryID = ? ";
        $sql .= " AND books.CategoryID = ? ";
        $params[] = $category;
    }

    $count_stmt = $pdo->prepare($count_sql);
    $count_stmt->execute($params);
    $total_books = $count_stmt->fetchColumn();


    $total_pages = ceil($total_books / $limit);

    $sql .= "LIMIT $limit OFFSET $offset";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>