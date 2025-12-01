<?php   
    include 'includes/meta.php'; 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include QUERIES_PATH . 'user_register.php';
        exit;
    }
    include 'includes/header.php'; 
?>
<h1 class="title underline"><?php echo ucfirst(str_replace('_', ' ', substr($current_page, 0, -4))) ?></h1>

<form method="POST" class="register-form">
    <?php if (isset($_GET['error'])): ?>
        <div class="error-message">
            <?php
                if ($_GET['error'] === 'missing') echo "<h3 class='error'>Fill in all fields.</h3>";
                elseif ($_GET['error'] === 'exists') echo "<h3 class='error'>Username already exists.</h3>";
                elseif ($_GET['error'] === 'mobile') echo "<h3 class='error'>Mobile must be 10 digits.</h3>";
                elseif ($_GET['error'] === 'telephone') echo "<h3 class='error'>Telephone must be 10 digits.</h3>";
                elseif ($_GET['error'] === 'password_short') echo "<h3 class='error'>Password must be 6+ characters.</h3>";
                elseif ($_GET['error'] === 'password_differ') echo "<h3 class='error'>Passwords do not match.</h3>";
            ?>
        </div>
    <?php endif; ?>

    <div class="input-wrapper">
        <input class="register-input" type="text" name="username" placeholder="Username" required>
        <input class="register-input" type="password" name="password" placeholder="Password" required>
        <input class="register-input" type="password" name="password_submit" placeholder="Repeat Password" required>
        <input class="register-input" type="text" name="firstname" placeholder="First Name" required>
        <input class="register-input" type="text" name="surname" placeholder="Surname" required>
        <input class="register-input" type="text" name="address1" placeholder="Address Line 1" required>
        <input class="register-input" type="text" name="address2" placeholder="Address Line 2">
        <input class="register-input" type="text" name="city" placeholder="City" required>
        <input class="register-input" type="text" name="telephone" placeholder="Telephone" maxlength="10" required>
        <input class="register-input" type="text" name="mobile" placeholder="Mobile" maxlength="10" required>
    </div>
    <div class="link-wrapper">
        <button type="submit" class="register-button">Register</button>
        <a class="link link-register" href="login.php">Back to Login</a>
    </div>
</form>

<?php include 'includes/footer.php'; ?>