<?php
// Dev-only page that shows the design system. It is not part of the shipped site.
// Add ?layout=member or ?layout=librarian to the address to see the other shells.
$base = '../';
require_once $base . 'includes/init.php';

$layout = 'public';
$active = 'catalogue';
if (isset($_GET['layout']) && $_GET['layout'] === 'member') {
    $layout = 'member';
}
if (isset($_GET['layout']) && $_GET['layout'] === 'librarian') {
    $layout = 'librarian';
    $active = 'reservations';
}
$title = 'Style guide';
$styles = ['css/styleguide.css'];
$_SESSION['username'] = 'maria';
require $base . 'includes/header.php';
?>
<div class="guide">
    <h1>Style guide</h1>
    <p class="note">Layout: <?php echo $layout; ?>. Add ?layout=member or ?layout=librarian to the address.</p>

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
        <div class="field">
            <label for="email">Email</label>
            <input class="input" id="email" name="email" type="email" value="maria@example.com">
            <p class="error" id="email-error"></p>
        </div>
        <div class="field">
            <label for="password">Κωδικός</label>
            <p class="hint">8 έως 72 χαρακτήρες</p>
            <input class="input" id="password" name="password" type="password" aria-invalid="true">
            <p class="error" id="password-error"><?php echo t('err_password'); ?></p>
        </div>
        <fieldset class="choices">
            <legend>Ρόλος</legend>
            <label class="choice"><input type="radio" name="role" value="member" checked>Μέλος</label>
            <label class="choice"><input type="radio" name="role" value="librarian">Βιβλιοθηκονόμος</label>
        </fieldset>
        <button class="btn action block" type="submit">Εγγραφή</button>
    </form>

    <h2>Messages</h2>
    <div class="flash flash-success"><svg class="icon" aria-hidden="true"><use href="#ic-check"/></svg><p>Η εγγραφή ολοκληρώθηκε. Μπορείς να συνδεθείς.</p></div>
    <div class="flash flash-error"><svg class="icon" aria-hidden="true"><use href="#ic-alert"/></svg><p>Λάθος email ή κωδικός.</p></div>
    <div class="flash"><svg class="icon" aria-hidden="true"><use href="#ic-info"/></svg><p>Αυτή η σελίδα είναι για άλλο ρόλο.</p></div>

    <h2>Colours</h2>
    <ul class="swatches">
        <li><span class="chip-color swatch-bg"></span><b>bg</b></li>
        <li><span class="chip-color swatch-card"></span><b>card</b></li>
        <li><span class="chip-color swatch-ink"></span><b>ink</b></li>
        <li><span class="chip-color swatch-ink-2"></span><b>ink-2</b></li>
        <li><span class="chip-color swatch-line"></span><b>line</b></li>
        <li><span class="chip-color swatch-cream"></span><b>cream</b></li>
        <li><span class="chip-color swatch-green"></span><b>green</b></li>
        <li><span class="chip-color swatch-action"></span><b>action</b></li>
        <li><span class="chip-color swatch-cobalt"></span><b>cobalt</b></li>
        <li><span class="chip-color swatch-terra"></span><b>terra</b></li>
        <li><span class="chip-color swatch-plum"></span><b>plum</b></li>
        <li><span class="chip-color swatch-ochre"></span><b>ochre</b></li>
        <li><span class="chip-color swatch-teal"></span><b>teal</b></li>
    </ul>
</div>
<?php
unset($_SESSION['username']);
require $base . 'includes/footer.php';
?>
