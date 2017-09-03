<?php get_header(); ?>
    <section class="main-content">
        <?php if (have_posts()) : ?>
        <h2 class="section-title"><?php
if (is_tax('post_format', 'post-format-aside')) :
_e('Asides', 'lights');
elseif (is_tax('post_format', 'post-format-image')) :
_e('Images', 'lights');
elseif (is_tax('post_format', 'post-format-video')) :
_e('Videos', 'lights');
elseif (is_tax('post_format', 'post-format-audio')) :
_e('Audio', 'lights');
elseif (is_tax('post_format', 'post-format-quote')) :
_e('Quotes', 'lights');
elseif (is_tax('post_format', 'post-format-link')) :
_e('Links', 'lights');
elseif (is_tax('post_format', 'post-format-gallery')) :
_e('Galleries', 'lights');
else :
_e('Archives', 'lights');
endif;
?></h2>
       <?php $term_description = term_description();
if (!empty($term_description)) {
echo '<p class="tax-description">';
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