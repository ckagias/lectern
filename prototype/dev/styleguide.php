<?php
// Dev-only page that shows the design system. It is not part of the shipped site.
$base = rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
$theme = (isset($_GET['theme']) && $_GET['theme'] === 'dark') ? 'dark' : 'light';
$colors = ['bg', 'card', 'ink', 'ink-2', 'line', 'cream', 'green', 'green-2', 'action', 'cobalt', 'terra', 'plum', 'ochre', 'teal'];
?>
<!DOCTYPE html>
<html lang="el" data-theme="<?= $theme ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Style guide</title>
    <link rel="stylesheet" href="<?= $base ?>/css/fonts.css">
    <link rel="stylesheet" href="<?= $base ?>/css/tokens.css">
    <link rel="stylesheet" href="<?= $base ?>/css/base.css">
    <link rel="stylesheet" href="<?= $base ?>/css/styleguide.css">
</head>
<body>
    <a class="skip" href="#main">Μετάβαση στο περιεχόμενο</a>
    <main id="main" class="guide">
        <h1>Style guide</h1>
        <p class="note">Theme: <?= $theme ?>. Add ?theme=dark to the address to see the night theme.</p>

        <h2>Type scale</h2>
        <div class="scale">
            <h1>Βρες το επόμενο βιβλίο σου</h1>
            <h2>Ώρες λειτουργίας</h2>
            <h3>Pride and Prejudice</h3>
            <p>Δες τι είναι διαθέσιμο, κράτησε αντίτυπο από το κινητό και πέρνα να το πάρεις.</p>
            <p class="note">Jane Austen · 1813 · Κωδικός FIC-001-A</p>
        </div>

        <h2>Colours</h2>
        <ul class="swatches">
            <?php foreach ($colors as $c) { ?>
                <li><span class="chip-color" style="--c: var(--<?= $c ?>)"></span><b><?= $c ?></b><span class="v">--<?= $c ?></span></li>
            <?php } ?>
        </ul>
    </main>
</body>
</html>
