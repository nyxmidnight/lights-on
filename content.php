<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
    <?php if (!post_password_required() && !is_attachment() && has_post_thumbnail()) {
the_post_thumbnail();
} ?>
        <header class="entry-header">
            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php if (is_single()) : ?>
                <p class="entry-meta">Posted on
                    <?php the_time('Y-m-d') ?>
                        <?php $u_time = get_the_time('U');
$u_modified_time = get_the_modified_time('U');
if($u_modified_time != $u_time) {
	echo " and last modified on ";
	the_modified_time('Y-m-d');
	echo ". ";
} ?> |
                            <?php echo get_the_term_list( $post->ID, 'byfandom', 'Fandoms: ', ', ' ); ?> | <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a> |
                                <?php edit_post_link(); ?>
                </p>
                <?php endif; ?>
                    <?php if (is_singular('myfics')) : ?>
                        <ul class="fanfic-heading">
                            <li class="fanfic-adult-rating"><strong>Rating:</strong>
                                <?php the_field('fic-adult-rating'); ?>
                            </li>
                            <li class="fanfic-ship"><strong>Ship Type:</strong>
                                <?php the_field('fic-shipping'); ?>
                            </li>
                            <li class="fanfic-warning"><strong>Warning:</strong>
                                <?php the_field('fic-warning'); ?>
                            </li>
                            <?php if( get_field('fic-spoiler') ): ?>
                                <li class="fanfic-spoilers"><strong>Spoilers:</strong>
                                    <?php the_field('fic-spoiler'); ?>
                                </li>
                                <?php endif; ?>
                                    <?php if( get_field('fic-ao3-link') ): ?>
                                        <li class="fanfic-ao3link"><a href="<?php the_field('fic-ao3-link'); ?>">Read at Archive of Our Own</a></li>
                                        <?php endif; ?>
                        </ul>
                        <?php endif; ?>
                            <?php if (is_singular('myideas')) : ?>
                                <?php if( get_field('idea-source') ): ?>
                                    <ul class="spark-heading">
                                        <li class="spark-source"><a href="<?php the_field('idea-source'); ?>">Source/Reference</a></li>
                                    </ul>
                                    <?php endif; ?>
                                        <?php endif; ?>
        </header>
        <?php if (is_single() || is_page()) : ?>
            <div class="entry-content">
                <?php the_content(); ?>
                    <?php wp_link_pages(); ?>
            </div>
            <?php else : ?>
                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                        <p><a href="<?php the_permalink(); ?>" class="read-more">Read this!</a></p>
                </div>
                <?php endif; ?>
                    <footer class="entry-footer">
                       <?php if (!is_page()) : ?>
                        <p class="entry-meta">Filed under:
                            <?php the_category(', '); ?>
                                <?php if (has_tag()) : ?>|
                                    <?php the_tags('Tagged: ', ', ', ''); ?>
                                        <?php endif; ?>
                        </p>
                        <?php endif; ?>
                        <p class="entry-meta entry-comment-number">
                            <?php if (!post_password_required() && (comments_open() || get_comments_number())) : ?>
                                <?php comments_popup_link(); ?>
                        </p>
                        <?php endif; ?>
                        <hr class="post-divider">
                    </footer>
</article>