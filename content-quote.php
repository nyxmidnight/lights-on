<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (!post_password_required() && !is_attachment() && has_post_thumbnail()) {
the_post_thumbnail();
} ?>
        <header class="entry-header">
            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p class="entry-format">
                <a href="<?php echo esc_url(get_post_format_link('quote')); ?>">
                    <?php echo get_post_format_string('quote'); ?>
                </a>
            </p>
            <?php if (is_single()) : ?>
                <ul class="entry-meta">
                    <li class="entry-category">
                        <?php _e('Category:', 'lights'); ?>
                            <?php the_category(', '); ?>
                    </li>
                </ul>
                <p class="entry-meta">Posted on
                    <?php the_time('Y-m-d') ?>
                        <?php $u_time = get_the_time('U');
$u_modified_time = get_the_modified_time('U');
if($u_modified_time != $u_time) {
	echo " and last modified on ";
	the_modified_time('Y-m-d');
	echo ". ";
} ?>
                </p>
                <?php endif; ?>
        </header>
        <<?php if (is_single() || is_page() || is_home()) : ?>
            <div class="entry-content">
                <?php the_content(); ?>
                    <?php wp_link_pages(); ?>
            </div>
            <?php else : ?>
                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div>
                <?php endif; ?>
</article>