<?php
// The footer of the public pages: opening hours, contact details and links.
$weekdays = openingHours(1);
$saturday = openingHours(6);
?>
    <footer class="foot">
        <div class="foot-top">
            <div class="foot-brand">
                <a class="brand" href="<?php echo $base; ?>index.php"><svg class="icon brand-mark" aria-hidden="true"><use href="#ic-logo"/></svg>AchaiaReads</a>
            </div>
            <section>
                <h2><?php echo t('hours_title'); ?></h2>
                <dl class="foot-hours">
                    <div><dt><?php echo t('hours_weekdays'); ?></dt><dd><?php echo $weekdays['open'] . '–' . $weekdays['close']; ?></dd></div>
                    <div><dt><?php echo t('hours_saturday'); ?></dt><dd><?php echo $saturday['open'] . '–' . $saturday['close']; ?></dd></div>
                </dl>
            </section>
            <section>
                <h2><?php echo t('contact_title'); ?></h2>
                <ul class="foot-list">
                    <li><?php echo t('address_line'); ?></li>
                    <li>2610 000 000</li>
                    <li>info@achaiareads.test</li>
                </ul>
            </section>
            <section>
                <h2><?php echo t('footer_explore'); ?></h2>
                <ul class="foot-list foot-explore">
                    <li><a href="<?php echo $base; ?>about.php"><?php echo t('about_link'); ?></a></li>
                    <li><a href="<?php echo $base; ?>faq.php"><?php echo t('faq_link'); ?></a></li>
                    <li><a href="<?php echo $base; ?>privacy.php"><?php echo t('privacy_link'); ?></a></li>
                    <?php if (isLoggedIn()) { ?>
                        <li><a href="<?php echo $base; ?>dashboard.php"><?php echo t('go_dashboard'); ?></a></li>
                    <?php } else { ?>
                        <li><a href="<?php echo $base; ?>login.php"><?php echo t('login'); ?></a></li>
                        <li><a href="<?php echo $base; ?>register.php"><?php echo t('register'); ?></a></li>
                    <?php } ?>
                </ul>
            </section>
        </div>
        <div class="foot-bottom">
            <p><?php echo t('footer_copy'); ?></p>
        </div>
    </footer>
