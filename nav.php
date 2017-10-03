<div class="post-nav">
    <?php if (is_single()) : ?>
<nav class="nav nav-post nav-single clearfix" role="navigation">
<div class="float-left"><?php previous_post_link(); ?></div> <div class="float-right"><?php next_post_link(); ?></div>
</nav>
<?php else : ?>
<?php global $paged;
if ($paged > 1) : ?>
<nav class="nav nav-post clearfix" role="navigation">
<div class="float-left"><?php previous_posts_link(); ?></div> <div class="float-right"><?php next_posts_link(); ?></div>
</nav>
<?php else : ?>
<nav class="nav nav-post clearfix" role="navigation">
<div class="float-right"><?php next_posts_link(); ?></div>
</nav>
<?php endif; ?>
<?php endif; ?>
</div> <!-- END .post-nav -->