<?php get_header(); ?>
    <section class="main-content">
        <?php if (have_posts()) : ?>
            <h2 class="section-title">
<?php
the_post(); // initialize posts
_e('All posts by ', 'lights');
echo get_the_author();
?></h2>
            <?php if (get_the_author_meta('description')) : ?>
                <p class="author-description">
                    <?php the_author_meta('description'); ?>
                </p>
                <?php endif; ?>
                    <?php rewind_posts(); // rewind posts ?>
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