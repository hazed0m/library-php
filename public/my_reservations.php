<?php include 'includes/meta.php'; ?>
<?php include 'includes/header.php'; ?>
<?php 
    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit;
    } else {
        include QUERIES_PATH . 'user_reservations.php'; 
    }
?>
<?php include 'includes/footer.php'; ?>