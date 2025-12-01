<?php
    include 'includes/meta.php';
    include QUERIES_PATH . 'user_info.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include QUERIES_PATH . 'user_update.php';

        if (!isset($_GET['error'])) {
            header("Location: account.php?updated=1");
            exit;
        }
    }
    include INCLUDES_PATH . '/header.php';
?>

<h1 class="title underline"><?php echo ucfirst(str_replace('_', ' ', substr($current_page, 0, -4))) ?></h1>

<?php if (isset($_GET['error'])): ?>
    <p class="error-message"><?php echo htmlspecialchars($_GET['error']); ?></p>
<?php endif; ?>

<form method="POST" class="account-form">
    <?php if (isset($_GET['updated'])): ?>
        <div class="success-message">
            <h3 class="success">Account updated successfully.</h3>
        </div>
    <?php endif; ?>
    <div class="input-wrapper">
        <label for="username" class="account-label">Username</label>
        <input type="text" id="username" class="account-input" 
            value="<?= htmlspecialchars($user['Username']) ?>" disabled>

        <label for="firstname" class="account-label">First Name</label>
        <input type="text" id="firstname" name="firstname" class="account-input"
            value="<?= htmlspecialchars($user['FirstName']) ?>" required>

        <label for="surname" class="account-label">Surname</label>
        <input type="text" id="surname" name="surname" class="account-input"
            value="<?= htmlspecialchars($user['Surname']) ?>" required>

        <label for="address1" class="account-label">Address Line 1</label>
        <input type="text" id="address1" name="address1" class="account-input"
            value="<?= htmlspecialchars($user['AddressLine']) ?>" required>

        <label for="address2" class="account-label">Address Line 2</label>
        <input type="text" id="address2" name="address2" class="account-input"
            value="<?= htmlspecialchars($user['AddressLine2']) ?>">

        <label for="city" class="account-label">City</label>
        <input type="text" id="city" name="city" class="account-input"
            value="<?= htmlspecialchars($user['City']) ?>" required>

        <label for="telephone" class="account-label">Telephone</label>
        <input type="text" id="telephone" name="telephone" class="account-input"
            value="<?= htmlspecialchars($user['Telephone']) ?>" required>

        <label for="mobile" class="account-label">Mobile</label>
        <input type="text" id="mobile" name="mobile" class="account-input"
            value="<?= htmlspecialchars($user['Mobile']) ?>" required>

    </div>
    <div class="link-wrapper">
        <button class="save-button" type="submit">Save Changes</button>
        <a class="link link-logout" href="logout.php">Logout</a>
    </div>
</form>

<?php include INCLUDES_PATH . '/footer.php'; ?>
