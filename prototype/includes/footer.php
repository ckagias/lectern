    </main>

    <?php if ($layout === 'public') { ?>
        <footer class="foot">
            <p><?= t('footer_text') ?></p>
        </footer>
    <?php } ?>

    <?php require __DIR__ . '/icons.php'; ?>
    <?php if (isset($scripts)) { ?>
        <?php foreach ($scripts as $script) { ?>
            <script src="<?= $base . $script ?>"></script>
        <?php } ?>
    <?php } ?>
</body>
</html>
