<?php get_header(); ?>
    <section class="main-content">
        <?php if (have_posts()) : ?>
        <h2 class="section-title">
        <?php
if (is_day()) :
_e('Daily Archives: ', 'lights');
the_time('l, F j, Y');
elseif (is_month()) :
_e('Monthly Archives: ', 'lights');
the_time('F Y');
elseif (is_year()) :
_e('Yearly Archives: ', 'lights');
the_time('Y');
else :
_e('Archives', 'lights');
endif;
            ?>
</h2>
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