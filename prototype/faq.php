<?php
// FAQ page: short answers to the questions people ask most.
$base = '';
require_once $base . 'includes/init.php';

$layout = 'public';
$title = t('faq_title');
$active = 'faq';
$styles = ['css/text.css'];

// The questions in the order they appear. Each one has a faq_q_ and a faq_a_ text in the language files.
$questions = ['join', 'reserve', 'loan', 'hours', 'language', 'data', 'real'];

require $base . 'templates/header.php';
?>
<article class="text-page">
    <h1><?php echo t('faq_title'); ?></h1>
    <p class="lead"><?php echo t('faq_lead'); ?></p>

    <?php foreach ($questions as $question) { ?>
        <h2><?php echo t('faq_q_' . $question); ?></h2>
        <p><?php echo t('faq_a_' . $question); ?></p>
    <?php } ?>
</article>
<?php require $base . 'templates/footer.php'; ?>
