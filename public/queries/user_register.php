<?php
    require_once CONFIG_PATH . 'database.php';

    $required = ['username','password','firstname','surname','address1','city','telephone','mobile'];

    foreach($required as $field){
        if(empty($_POST[$field])){
            header("Location: ../register.php?error=missing");
            exit;
        }
    }

    $username =        $_POST['username'];
    $password =        $_POST['password'];
    $password_submit = $_POST['password_submit'];
    $firstname =       $_POST['firstname'];
    $surname =         $_POST['surname'];
    $address1 =        $_POST['address1'];
    $address2 =        $_POST['address2'] ?? '';
    $city =            $_POST['city'];
    $telephone =       $_POST['telephone'];
    $mobile =          $_POST['mobile'];

    // Username exists?
    $db = new Database();
    $pdo = $db->connect();

    $stmt = $pdo->prepare("SELECT Username FROM users WHERE Username = ?");
    $stmt->execute([$username]);

    if($stmt->fetch()){
        header("Location: ../register.php?error=exists");
        exit;
    }

    // Validate mobile
    if (!ctype_digit($telephone) || strlen($telephone) !== 10) {
        header("Location: ../register.php?error=telephone");
        exit;
    }
    if (!ctype_digit($mobile) || strlen($mobile) !== 10) {
        header("Location: ../register.php?error=mobile");
        exit;
    }

    // Validate password
    if (strlen($password) < 6) {
        header("Location: ../register.php?error=password_short");
        exit;
    }

    if ($password != $password_submit) {
        header("Location: ../register.php?error=password_differ");
        exit;
    }

    // Insert user 
    $stmt = $pdo->prepare("
        INSERT INTO users 
        (Username, Password, FirstName, Surname, AddressLine, AddressLine2, City, Telephone, Mobile)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $username,
        $password,
        $firstname,
        $surname,
        $address1,
        $address2,
        $city,
        $telephone,
        $mobile
    ]);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include QUERIES_PATH . 'user_login.php';
    }
?>