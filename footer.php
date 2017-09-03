<footer class="site-footer" role="banner">
    <?php wp_nav_menu(array(
'theme_location' => 'footer',
'menu_class' => 'nav-footer',
'fallback_cb' => false,
)); ?>
        <div class="site-info">
            <p><strong><?php echo bloginfo('name'); ?></strong> &copy; <?php echo date('Y'); ?> <a href="http://nyx.zone">Nyx</a> (formerly Nyx Midnight).</p>
            <p><a href="/comment-policy/">Comments Policy</a> | <a href="/privacy-policy/">Privacy Policy</a> | <a href="/terms-conditions/">Terms and Conditions</a> | <a href="http://wordpress.org/">
                <?php _e('Powered by WordPress'); ?>
            </a>
            </p>
        </div>
        <!-- END .site-info -->
</footer>
<!-- END .site-footer -->
</div>
<!-- END .wrapper-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
jQuery(document).ready(function($) {
$('body').append('<div class="top" title="Scroll to Top">&uarr;</div>');
    $('.top').hide();
$(window).scroll(function() {
if ($(this).scrollTop() > 100) // in pixels
$('.top').fadeIn();
else $('.top').fadeOut();
});
$('.top').click(function(e) {
$('html, body').animate({ scrollTop: 0 }, 300);
});
});
</script>
<?php wp_footer(); ?>
    </body>

    </html>