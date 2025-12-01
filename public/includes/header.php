<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php 
                // Current template
                $current_page = basename($_SERVER['SCRIPT_NAME']);
                if($current_page == 'index.php') {
                    $current_page = 'home.php';
                }
                // Title formatted
                echo ucfirst(str_replace('_', ' ', substr($current_page, 0, -4))) 
            ?>
        </title>
        <link rel="stylesheet" href="../../assets/css/main.css">
        <?php if ($current_page == 'search.php' || $current_page == 'library.php' || $current_page == 'my_reservations.php'): ?>
            <link rel="stylesheet" href="../../assets/css/results.css">
        <?php elseif ($current_page == 'login.php' || $current_page == 'account.php' || $current_page == 'register.php'): ?>
            <link rel="stylesheet" href="../../assets/css/auth.css">
        <?php endif; ?>
        <link rel="apple-touch-icon" sizes="180x180" href="../../assets/image/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../../assets/image/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../../assets/image/favicon/favicon-16x16.png">
        <link rel="manifest" href="../../assets/image/favicon/site.webmanifest">
    </head>
    <body>
        <header class="header">
            <?php include INCLUDES_PATH . 'navigation.php' ?>
        </header>
        <div class="container">