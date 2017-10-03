<?php

// enable theme support
function lights_setup() {
// enable language translation
load_theme_textdomain('lights', get_template_directory() . '/lang');
// enable featured images
add_theme_support('post-thumbnails');
// enable custom headers
add_theme_support('custom-header');
// enable custom backgrounds
add_theme_support('custom-background');
// enable RSS links
add_theme_support('automatic-feed-links');
// enable HTML5
$args = array(
'search-form',
'comment-form',
'comment-list',
'gallery',
'caption',
);
add_theme_support('html5', $args);
// enable three nav menus
register_nav_menus(array(
'header' => __('Header Menu'),
'sidebar' => __('Sidebar Menu'),
'footer' => __('Footer Menu'),
));
// enable custom post formats
add_theme_support('post-formats', array(
'aside', 'image', 'video', 'audio',
'quote', 'link', 'gallery',
));
}
add_action('after_setup_theme', 'lights_setup');

// set max content width
if (!isset($content_width)) $content_width = 1120;

// enable widgets
function lights_widgets_init() {
register_sidebar(array(
'name' => __('Header Widgets'),
'id' => 'header',
'description' => __('Header Widget Area'),
'before_widget' => '<div class="widget %2$s">',
'after_widget' => '</div>',
));
register_sidebar(array(
'name' => __('Sidebar Widgets'),
'id' => 'sidebar',
'description' => __('Sidebar Widget Area'),
'before_widget' => '<div class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h4 class="widget widgettitle">',
'after_title' => '</h4>',
));
register_sidebar(array(
'name' => __('Footer Widgets'),
'id' => 'footer',
'description' => __('Footer Widget Area'),
'before_widget' => '<div class="widget %2$s">',
'after_widget' => '</div>',
));
}
add_action('widgets_init', 'lights_widgets_init');

// shortcode to restrict post to logged-in users
// shortcode: [user_access cap="read" deny="Please log in!"]Lorem ipsum dolor sit amet..[/user_access]
function user_access($attr, $content = null) { extract(shortcode_atts(array( 'cap' => 'read', 'deny' => '', ), $attr)); if (current_user_can($cap) && !is_null($content) && !is_feed()) return $content; return $deny; }
add_shortcode('user_access', 'user_access');

// Display a link to the blog homepage
// shortcode: [homepage]
function homepage() {
return '<a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a>';
}
add_shortcode('homepage', 'homepage');

// Display a link to the collective
// shortcode: [collective]
function collective() {
return '<a href="http://nyx.zone">Nyx Zone</a>';
}
add_shortcode('collective', 'collective');

// Reduce Comment Spam by Blocking No-Referrer Requests
// Stupid WordPress Tricks
function check_referrer() {
	if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == '') {
		wp_die(__('Please do not access this file directly.'));
	}
}
add_action('check_comment_flood', 'check_referrer');

//Reduce Comment Spam by Flagging Author URL with >50 characters
// CSS Tricks
function rkv_url_spamcheck( $approved , $commentdata ) {
    return ( strlen( $commentdata['comment_author_url'] ) > 50 ) ? 'spam' : $approved;
  }

add_filter( 'pre_comment_approved', 'rkv_url_spamcheck', 99, 2 );

// comment invite feed link
function rss_comment_footer($content) {
	if (is_feed()) {
		if (comments_open()) {
			$content .= 'Comments are open! <a href="'.get_permalink().'">Add yours!</a>';
		}
	}
	return $content;
}

// Show posts of 'post', 'myfics', 'myideas' and 'mymetas' post types on home page
function add_my_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'post_type', array( 'post', 'myfics', 'myideas', 'mymetas' ) );
  return $query;
}
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

// Add custom post types to RSS feed
function my_cptui_add_post_types_to_rss( $query ) {
	// We do not want unintended consequences.
	if ( ! $query->is_feed() ) {
		return;    
	}

	$cptui_post_types = cptui_get_post_type_slugs();

	$query->set(
		'post_type',
		array_merge(
			array( 'post' ),
			$cptui_post_types
		)
	);
}
add_filter( 'pre_get_posts', 'my_cptui_add_post_types_to_rss' );

// enqueue script and style
function lights_scripts_styles() {
// conditionally load script for threaded comments
if (is_singular() && comments_open() &&
get_option('thread_comments')) {
wp_enqueue_script('comment-reply');
}
// load style.css
wp_enqueue_style(
'lights',
get_stylesheet_uri(),
array(),
null
);
}
add_action('wp_enqueue_scripts', 'lights_scripts_styles');

// Google Fonts
function lights_GoogleFonts() {
echo '<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,900i|Libre+Baskerville:400,400i|Nova+Mono" rel="stylesheet">';
}
add_filter('wp_head', 'lights_GoogleFonts');

?>