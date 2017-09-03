<?php get_header(); ?>
    <section class="main-content">
        <?php if (have_posts()) : ?>
        <h2 class="section-title">All Fanfiction Posts</h2>
       <?php
        while (have_posts()) : the_post();
        get_template_part('content', get_post_format());
        endwhile;
        get_template_part('nav');
        else :
        get_template_part('content', 'none');
        endif; ?>
    </section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>