<?php
    require_once CONFIG_PATH . 'database.php';

    $username = $_SESSION['user'];

    $firstname  = $_POST['firstname'] ?? '';
    $surname    = $_POST['surname'] ?? '';
    $address1   = $_POST['address1'] ?? '';
    $address2   = $_POST['address2'] ?? '';
    $city       = $_POST['city'] ?? '';
    $telephone  = $_POST['telephone'] ?? '';
    $mobile     = $_POST['mobile'] ?? '';

    // Basic validation
    if ($firstname==='' || $surname==='' || $address1==='' || $city==='' || $telephone==='' || $mobile==='') {
        header("Location: ../account.php?error=missing");
        exit;
    }

    $db = new Database();
    $pdo = $db->connect();

    $sql = "
        UPDATE users SET 
            FirstName = ?, 
            Surname = ?, 
            AddressLine = ?, 
            AddressLine2 = ?, 
            City = ?, 
            Telephone = ?, 
            Mobile = ?
        WHERE Username = ?
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$firstname, $surname, $address1, $address2, $city, $telephone, $mobile, $username]);
?>