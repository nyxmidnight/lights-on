<?php get_header(); ?>
    <section class="main-content">
        <?php if (have_posts()) : ?>
            <h2 class="section-title"><?php
_e('Tag Archives: ', 'lights');
single_tag_title();
?></h2>
            <?php $term_description = term_description();
if (!empty($term_description)) {
echo '<p class="tag-description">';
echo $term_description;
echo '</p>';
}
?>
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