<?php
// FAQ page: short answers to the questions people ask most.
$base = '';
require_once $base . 'includes/init.php';

$layout = 'public';
$title = t('faq_title');
$active = 'faq';

// The questions in the order they appear. Each one has a faq_q_ and a faq_a_ text in the language files.
$questions = ['join', 'reserve', 'loan', 'hours', 'language', 'data', 'real'];

?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="only light">
    <title><?php echo $title; ?> · AchaiaReads</title>
    <link rel="icon" href="<?php echo $base; ?>pictures/favicon.png" type="image/png">
    <link rel="stylesheet" href="<?php echo $base; ?>css/fonts.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/tokens.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/base.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/layout.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/components.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/forms.css">
    <link rel="stylesheet" href="<?php echo $base; ?>css/text.css">
</head>
<body class="layout-public">
    <?php require $base . 'templates/header.php'; ?>

    <main id="main">
        <article class="text-page">
            <h1><?php echo t('faq_title'); ?></h1>
            <p class="lead"><?php echo t('faq_lead'); ?></p>

            <?php foreach ($questions as $question) { ?>
                <h2><?php echo t('faq_q_' . $question); ?></h2>
                <p><?php echo t('faq_a_' . $question); ?></p>
            <?php } ?>
        </article>
    </main>

    <?php require $base . 'templates/footer.php'; ?>
    <?php require $base . 'templates/icons.php'; ?>
</body>
</html>
