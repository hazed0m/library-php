<?php 
    if (!empty($_POST)) {
        include QUERIES_PATH . 'cancel_reservation.php';
    }
?>
<h1 class="title underline">
    <?php 
        if(!empty($title) || !empty($author) || !empty($category_name)) {
            $current_page = 'search_results.php';
            echo ucfirst(str_replace('_', ' ', substr($current_page, 0, -4)));
            echo ": " . $title . " " . $author . " " . ucfirst($category_name);
        } else {
            echo ucfirst(str_replace('_', ' ', substr($current_page, 0, -4)));
        }
    ?>
</h1>
<?php if (empty($books)): ?>
    <p class="results">No books found.</p>
<?php else: ?>
    <div class="library-wrapper">
        <div class="library-header-wrapper">
            <div class="library-header-item">ISBN</div>
            <div class="library-header-item">Title</div>
            <div class="library-header-item">Author</div>
            <div class="library-header-item">Year</div>
            <div class="library-header-item">Category</div>
            <div class="library-header-item">Reserved</div>
        </div>
        <?php foreach ($books as $book): ?>
            <div class="library-results-wrapper">
                <div class="library-results-item"><?= htmlspecialchars($book['ISBN']) ?></div>
                <div class="library-results-item"><?= htmlspecialchars($book['BookTitle']) ?></div>
                <div class="library-results-item"><?= htmlspecialchars($book['Author']) ?></div>
                <div class="library-results-item"><?= htmlspecialchars($book['Year']) ?></div>
                <div class="library-results-item"><?= htmlspecialchars($book['CategoryDesc']) ?></div>
                <div class="library-results-item">
                    <?php if ($book['Reserved'] === 'Y'): ?>
                        <?php if(!empty($username)): ?>
                            <form method="POST">
                                <input type="hidden" name="isbn" value="<?= htmlspecialchars($book['ISBN']) ?>">
                                <button class="cancel-button">Cancel</button>
                            </form>
                        <?php else: ?>
                            <span class="tooltip"
                                data-tip="Reserved by <?= htmlspecialchars($book['Username']) ?> on <?= htmlspecialchars($book['ReservedDate']) ?>">
                                Reserved
                            </span>
                        <?php endif; ?>
                    <?php elseif(!empty($_SESSION['user'])): ?>
                        <form method="POST">
                            <input type="hidden" name="isbn" value="<?= htmlspecialchars($book['ISBN']) ?>">
                            <button class="cancel-button">Reserve</button>
                        </form>
                    <?php else: ?>
                        Available
                    <?php endif; ?>
                </div>
                
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php if ($total_pages > 1): ?>
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a class="page-btn" href="?<?= http_build_query(array_merge($_GET, ['page' => $page-1])) ?>">Prev</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a class="page-btn <?= $i == $page ? 'active' : '' ?>" 
            href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>">
            <?= $i ?>
            </a>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
            <a class="page-btn" href="?<?= http_build_query(array_merge($_GET, ['page' => $page+1])) ?>">Next</a>
        <?php endif; ?>
    </div>
<?php endif; ?>