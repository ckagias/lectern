    </main>

    <?php if ($layout === 'public') { ?>
        <footer class="foot">
            <p><?php echo t('footer_copy'); ?></p>
            <p><?php echo t('footer_text'); ?></p>
        </footer>
    <?php } ?>

    <?php require $base . 'templates/icons.php'; ?>
    <?php
    if (isset($scripts)) {
        foreach ($scripts as $script) {
            echo '<script src="' . $base . $script . '"></script>';
        }
    }
    ?>
</body>
</html>
