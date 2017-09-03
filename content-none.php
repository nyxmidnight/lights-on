<article class="post-not-found">
<header class="entry-header">
<h3 class="entry-title">
<?php _e('Not Found', 'lights'); ?>
</h3>
</header>
<div class="entry-content">
<?php if (is_search()) : ?>
<p><?php _e('Sorry, but nothing matched your search terms. Please try again using different keywords.', 'lights'); ?></p>
<?php else : ?>
<p><?php _e('Sorry, the requested resource was not found on this server.', 'lights'); ?></p>
<?php endif; ?>
</div>
<footer class="entry-footer">
<?php get_search_form(); ?>
</footer>
</article>