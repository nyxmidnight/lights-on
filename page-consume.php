<?php get_header(); ?>
    <section class="main-content">
        <?php if (have_posts()) :
        while (have_posts()) : the_post();
        get_template_part('content', get_post_format());
        endwhile;
        comments_template();
        else :
        get_template_part('content', 'none');
        endif; ?>
    </section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>