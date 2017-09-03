<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php if ((is_home() && ($paged < 2 )) || is_single() || is_page() || is_category()) {
	echo '<meta name="robots" content="index,archive,follow" />';
} else {
	echo '<meta name="robots" content="noindex,noarchive,follow" />';
} ?>
    <!-- Links to the author of the document -->
    <link rel="author" href="humans.txt">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <title><?php wp_title('»', true, 'right'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="wrapper">
        <header class="site-header" role="banner">
            <h1 class="site-title"><a href="<?php echo home_url('/'); ?>">
<?php bloginfo('name'); ?></a>
</h1>
            <p class="title-description">
                <?php bloginfo('description'); ?>
            </p>
            <nav class="title-nav" role="menubar">
            <?php wp_nav_menu(array(
'theme_location' => 'header',
'menu_class' => 'nav-header',
'fallback_cb' => false,
)); ?>
        </nav>
        </header>
        <!-- END .site-header -->