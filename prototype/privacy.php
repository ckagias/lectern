<?php
// Privacy page: what the site stores, which cookies it uses and who can see what.
$base = '';
require_once $base . 'includes/init.php';

$layout = 'public';
$title = t('privacy_title');
$active = 'privacy';
$styles = ['css/text.css'];
require $base . 'templates/header.php';
?>
<article class="text-page">
    <h1><?php echo t('privacy_title'); ?></h1>
    <p class="lead"><?php echo t('privacy_lead'); ?></p>
    <p class="updated"><?php echo t('privacy_updated'); ?></p>

    <h2><?php echo t('privacy_data_title'); ?></h2>
    <p><?php echo t('privacy_data_text'); ?></p>

    <h2><?php echo t('privacy_cookies_title'); ?></h2>
    <p><?php echo t('privacy_cookies_text'); ?></p>

    <h2><?php echo t('privacy_map_title'); ?></h2>
    <p><?php echo t('privacy_map_text'); ?></p>

    <h2><?php echo t('privacy_fiction_title'); ?></h2>
    <p><?php echo t('privacy_fiction_text'); ?></p>

    <h2><?php echo t('privacy_contact_title'); ?></h2>
    <p><?php echo t('privacy_contact_text'); ?> <a href="mailto:info@achaiareads.test">info@achaiareads.test</a></p>
</article>
<?php require $base . 'templates/footer.php'; ?>
