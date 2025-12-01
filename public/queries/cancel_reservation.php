<?php
    require_once CONFIG_PATH . 'database.php';

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit;
    }
    
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: library.php");
        exit;
    }
    
    // Connect
    $db  = new Database();
    $pdo = $db->connect();

    // Params
    $isbn     = $_POST['isbn']    ?? '';
    $username = $_SESSION['user'];  
    $date     = date("Y-m-d");

    if ($isbn === '') {
        header("Location: library.php?error=no_isbn");
        exit;
    }

    // CHECK reservation
    $checkSql = "SELECT * FROM reservations WHERE ISBN = ? AND Username = ?";
    $check = $pdo->prepare($checkSql);
    $check->execute([$isbn, $username]);
    
    $alreadyReserved = $check->fetch();

    // Query
    if($alreadyReserved) {
        // CANCEL reservation
        $deleteSql = "DELETE FROM reservations WHERE ISBN = ? AND Username = ?";
        $stmt = $pdo->prepare($deleteSql);
        $stmt->execute([$isbn, $username]);

        $updateSql = "UPDATE books SET Reserved = 'N' WHERE ISBN = ?";
        $stmt2 = $pdo->prepare($updateSql);
        $stmt2->execute([$isbn]);

        //Refresh
        echo "<script>window.location.href = '';</script>";
        exit;
    
    } else {
        // RESERVE book
        $insertSql = "INSERT INTO reservations (ISBN, Username, ReservedDate)
        VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($insertSql);
        $stmt->execute([$isbn, $username, $date]);

        $updateSql = "UPDATE books SET Reserved = 'Y' WHERE ISBN = ?";
        $stmt2 = $pdo->prepare($updateSql);
        $stmt2->execute([$isbn]);

        //Refresh
        echo "<script>window.location.href = 'my_reservations.php';</script>";
        exit;
    
    }

?>