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
$_SESSION['username'] = 'maria';
setFlash('info', 'forbidden_text');
$active = ($layout === 'librarian') ? 'reservations.php' : 'catalogue.php';
$colors = ['bg', 'card', 'ink', 'ink-2', 'line', 'cream', 'green', 'green-2', 'action', 'cobalt', 'terra', 'plum', 'ochre', 'teal'];

require __DIR__ . '/../includes/header.php';
?>
<div class="guide">
    <h1>Style guide</h1>
    <p class="note">Layout: <?= $layout ?>. Add ?layout=member or ?layout=librarian to the address. The moon button switches the theme.</p>

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

    <h2>Forms</h2>
    <form class="panel" action="#" method="post">
        <?= field('email', 'Email', 'email', 'maria@example.com', '', ['autocomplete' => 'email', 'required' => 'required']) ?>
        <?= field('password', 'Κωδικός', 'password', '', t('err_password'), ['autocomplete' => 'new-password'], '8 έως 72 χαρακτήρες') ?>
        <fieldset class="choices">
            <legend>Ρόλος</legend>
            <label class="choice"><input type="radio" name="role" value="1" checked>Μέλος</label>
            <label class="choice"><input type="radio" name="role" value="2">Βιβλιοθηκονόμος</label>
        </fieldset>
        <button class="btn action block" type="submit">Εγγραφή</button>
    </form>

    <h2>Messages</h2>
    <div class="flash flash-success"><?= icon('check') ?><p>Η εγγραφή ολοκληρώθηκε. Μπορείς να συνδεθείς.</p></div>
    <div class="flash flash-error"><?= icon('alert') ?><p>Λάθος email ή κωδικός.</p></div>

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
