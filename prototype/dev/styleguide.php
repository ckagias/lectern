<?php
// Dev-only page that shows the design system. It is not part of the shipped site.
// Try ?layout=public, ?layout=member or ?layout=librarian, and add &theme=dark for the night theme.
require_once __DIR__ . '/../includes/init.php';

$base = '../';
$title = 'Style guide';
$styles = ['styleguide'];
$layout = 'public';
if (isset($_GET['layout']) && ($_GET['layout'] === 'member' || $_GET['layout'] === 'librarian')) {
    $layout = $_GET['layout'];
}
if (isset($_GET['theme']) && $_GET['theme'] === 'dark') {
    $_COOKIE['theme'] = 'dark';
}
$_SESSION['username'] = 'maria';
$active = ($layout === 'librarian') ? 'reservations.php' : 'catalogue.php';
$colors = ['bg', 'card', 'ink', 'ink-2', 'line', 'cream', 'green', 'green-2', 'action', 'cobalt', 'terra', 'plum', 'ochre', 'teal'];

require __DIR__ . '/../includes/header.php';
?>
<div class="guide">
    <h1>Style guide</h1>
    <p class="note">Layout: <?= $layout ?>. Use ?layout=member, ?layout=librarian and ?theme=dark in the address.</p>

    <h2>Type scale</h2>
    <div class="scale">
        <h1>Βρες το επόμενο βιβλίο σου</h1>
        <h2>Ώρες λειτουργίας</h2>
        <h3>Pride and Prejudice</h3>
        <p>Δες τι είναι διαθέσιμο, κράτησε αντίτυπο από το κινητό και πέρνα να το πάρεις.</p>
        <p class="note">Jane Austen · 1813 · Κωδικός FIC-001-A</p>
    </div>

    <h2>Buttons</h2>
    <div class="row-buttons">
        <a class="btn action" href="#">Κράτηση</a>
        <a class="btn" href="#">Καταχώριση</a>
    </div>
    <div class="on-green row-buttons">
        <a class="btn ochre" href="#">Σύνδεση</a>
        <a class="btn line" href="#">Εγγραφή</a>
    </div>

    <h2>Colours</h2>
    <ul class="swatches">
        <?php foreach ($colors as $c) { ?>
            <li><span class="chip-color" style="--c: var(--<?= $c ?>)"></span><b><?= $c ?></b><span class="v">--<?= $c ?></span></li>
        <?php } ?>
    </ul>
</div>
<?php
unset($_SESSION['username']);
require __DIR__ . '/../includes/footer.php';
