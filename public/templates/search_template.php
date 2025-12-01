<?php
    // Query on form submit
    if (!empty($_GET)) {
        include QUERIES_PATH . 'search_books.php';
    }
?>
<?php if(empty($_GET)): ?>
    <h1 class="title underline"><?php echo ucfirst(str_replace('_', ' ', substr($current_page, 0, -4))) ?></h1>
<?php endif; ?>
<?php
    // Output on form submit
    if (!empty($_GET)) {
        include TEMPLATES_PATH . 'results_template.php';
    }
?>
<form method="GET" class="search-form">
    <input class="search-input" type="text" name="title" placeholder="Search by title">
    <input class="search-input" type="text" name="author" placeholder="Search by author">
    <select class="search-select" name="category">
        <option value="0-all">All categories</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?= htmlspecialchars($category['CategoryID']) . "-" . htmlspecialchars($category['CategoryDesc']) ?>"><?= htmlspecialchars($category['CategoryDesc']) ?></option>
        <?php endforeach; ?>
    </select>
    <button class="search-button" type="submit">Search</button>
</form>