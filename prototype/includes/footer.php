    </main>

    <?php if ($layout === 'public') { ?>
        <footer class="foot">
            <p><?php echo t('footer_copy'); ?></p>
            <p><?php echo t('footer_text'); ?></p>
        </footer>
    <?php } ?>

    <?php require $base . 'includes/icons.php'; ?>
    <?php if (isset($scripts)) { ?>
        <?php foreach ($scripts as $script) { ?>
            <script src="<?php echo $base . $script; ?>"></script>
        <?php } ?>
    <?php } ?>
</body>
</html>
