<?php // The shelf for the home page: a row of book spines on a board, one for each title in the catalogue. The first 12 show on phones. ?>
<div class="shelf">
    <div class="books">
        <?php foreach ($shelfBooks as $book) {
            $summary = $book['summary'];
            if ($_SESSION['lang'] === 'el') {
                $summary = $book['summary_el'];
            }
        ?>
            <button type="button" class="book <?php echo $book['class']; ?>" style="--h: <?php echo $book['h']; ?>px; --w: <?php echo $book['w']; ?>px;<?php if (isset($book['fs'])) { echo ' --fs: ' . $book['fs'] . ';'; } ?>" aria-haspopup="dialog" aria-label="<?php echo t('book_open'); ?>: <?php echo e($book['title']); ?>" data-title="<?php echo e($book['title']); ?>" data-author="<?php echo e($book['author']); ?>" data-year="<?php echo $book['year']; ?>" data-category="<?php echo t('cat_' . $book['category']); ?>" data-call="<?php echo e($book['call']); ?>" data-summary="<?php echo e($summary); ?>">
                <span class="spine"><span class="spine-title"><?php echo e($book['spine']); ?></span></span>
            </button>
        <?php } ?>
    </div>
    <div class="board"></div>
</div>
