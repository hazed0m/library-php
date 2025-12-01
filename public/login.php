<?php 
    include 'includes/meta.php'; 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include QUERIES_PATH . 'user_login.php';

        // If login was successful, redirect
        if (isset($_SESSION['user'])) {
            header('Location: index.php');
            exit;
        }
    }
    include INCLUDES_PATH . '/header.php';
?>
<h1 class="title underline"><?php echo ucfirst(str_replace('_', ' ', substr($current_page, 0, -4))) ?></h1>

<form method="POST" class="login-form">
    <?php if (isset($_GET['error'])): ?>
        <div class="error-message">
            <?php
                if ($_GET['error'] === 'missing') {
                    echo "<h3 class=\"error\">Please fill in all fields.</h3>";
                } 
                elseif ($_GET['error'] === 'invalid') {
                    echo "<h3 class=\"error\">Invalid username or password.</h3>";
                }
                elseif ($_GET['error'] === 'exists') {
                    echo "<h3 class=\"error\">Username already exists.</h3>";
                }
            ?>
        </div>
    <?php endif; ?>
    <div class="input-wrapper">
        <input type="text" name="username" class="login-input" placeholder="Username">
        <input type="password" name="password" class="login-input" placeholder="Password">
    </div>
    <div class="link-wrapper">
        <button type="submit" class="login-button">Login</button>
        <a class="link link-register" href="register.php">Register</a>
    </div>
</form>


<?php include INCLUDES_PATH . 'footer.php'; ?>
