<?php get_header(); ?>
    <section class="main-content">
        <?php if (have_posts()) : ?>
        <h2 class="section-title">Search Results</h2>
				<p>Showing results for: <span class="highlight search-term"><?php echo esc_attr(get_search_query()); ?></span></p>
       <?php endif; ?>
        <?php
        if (have_posts()) :
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