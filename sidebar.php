<?php if (is_active_sidebar('sidebar')) : ?>
    </aside>
    <aside id="sidebar" class="main-sidebar widget-area" role="complementary">
        <?php dynamic_sidebar('sidebar'); ?>
    </aside>
    <?php else : ?>
        <aside id="sidebar" class="main-sidebar sidebar" role="complementary">
            <?php if (has_nav_menu('sidebar')) : ?>
                <div class="widget nav-sidebar">
                    <h3>Sidebar Menu</h3>
                    <?php wp_nav_menu(array(
'theme_location' => 'sidebar',
'container' => false,
)); ?>
                </div>
                <?php endif; ?>
                    <div class="widget widget_search">
                        <h4>Search</h4>
                        <?php get_search_form(); ?>
                    </div>
                    <div class="widget widget_pages">
                        <h4>Pages</h4>
                        <ul>
                            <?php wp_list_pages(array(
'title_li' => '',
'depth' => 1
)); ?>
                        </ul>
                    </div>
        </aside>
        <?php endif; ?>