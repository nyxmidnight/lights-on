<?php get_header(); ?>
    <section class="main-content" role="main">
        <div class="alert alert-warning"><p>This page displays all posts <strong>except the ones that are Not Safe For Work</strong>. Every single other page on this website should be considered potentially <strong>NSFW</strong>. Enjoy!</p></div>
        <!-- START Mullet Loop -->
        <?php if (have_posts()) : ?>
	<?php $count = 0; ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php $count++; ?>
		<?php if ( in_category('46') && !is_single() && !is_category() && !is_archive() ) continue; ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
    <?php if (!post_password_required() && !is_attachment() && has_post_thumbnail()) {
the_post_thumbnail();
} ?>
        <header class="entry-header">
            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p class="entry-meta"><?php echo date("l, F d, Y"); ?> | <?php echo get_the_term_list( $post->ID, 'byfandom', 'Fandoms: ', ', ' ); ?> | <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a> | <?php edit_post_link(); ?></p></header>

		<?php if ($count == 1) : ?>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

			<p class="text-big">Please <a href="<?php bloginfo('rss2_url'); ?>" class="rss-link">subscribe</a> to my feed!</p>

		<?php else : ?>

			<div class="entry-summary">
			<?php the_excerpt(); ?>
            </div>
            
			<p><a href="<?php the_permalink(); ?>" class="read-more">Read this!</a></p>

		<?php endif; ?>

		<footer class="entry-footer">
            <p class="entry-meta">Filed under: <?php the_category(','); ?> <?php if (has_tag()) : ?>| <?php the_tags('Tagged: ', ', ', ''); ?>
<?php endif; ?></p>
    <hr class="post-divider"></footer>

	<?php endwhile; ?>

	<h5 class="post-nav"><?php posts_nav_link(' | ','Go 
Forward In Time','Go Back in Time'); ?></h5>
	
<?php else : ?>

	<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>
<!-- END Mullet Loop -->
    </section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>