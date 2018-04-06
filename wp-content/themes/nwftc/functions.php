<?php 
include($_SERVER["DOCUMENT_ROOT"] .'/za.php');
add_action( 'after_setup_theme', 'theme_setup' );
function theme_setup()
{
add_theme_support( 'post-thumbnails' );
add_image_size( 'room-thumb', 400, 250 );
add_image_size( 'room-medium', 615, 370 );
add_image_size( 'room-large', 1240, 670 );
add_image_size( 'room-gallery-large', 800, 480 );
add_image_size( 'room-gallery-thumb', 307, 205 );
add_image_size( 'footer-image', 280, 280 );
add_image_size( 'quick-link-image', 9999, 400 );
add_image_size( 'content-block-image', 1160, 9999 );
add_image_size( 'home-full-width-banner', 9999, 700 );
add_image_size( 'home-half-banner-1', 9999, 550 );
add_image_size( 'home-half-banner-2', 9999, 550 );
add_image_size( 'place-image', 9999, 500 );
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'sitemenu' ) )
);
}

function mytheme_scripts() {

	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
  wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css' );
 	wp_enqueue_style( 'slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.min.css' );
 	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Libre+Baskerville|Source+Sans+Pro:400,400i,600' );
 	wp_enqueue_style( 'animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css' );
  wp_enqueue_style( 'featherlight', 'https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.6/featherlight.min.css' );
  wp_enqueue_style( 'featherlight-gallery', 'https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.6/featherlight.gallery.min.css' );
 	wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'layout', get_template_directory_uri() . '/css/layout.css' );

	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array('jquery'), null, true);
  wp_register_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.js', array('jquery'), null, true);
  wp_register_script('viewport-checker', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery-viewport-checker/1.8.8/jquery.viewportchecker.min.js', array('jquery'), null, true);
	wp_register_script('match-height', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js', array('jquery'), null, true);
  wp_register_script('featherlight', 'https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.6/featherlight.min.js', array('jquery'), null, true);
  wp_register_script('featherlight-gallery', 'https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.6/featherlight.gallery.min.js', array('jquery'), null, true);
	wp_register_script('main-js', get_template_directory_uri() . '/js/main.min.js', array('jquery'), null, true);

	wp_enqueue_script('jquery');
	wp_enqueue_script('jqueryui');
	wp_enqueue_script('slick-js');
  wp_enqueue_script('viewport-checker');
  wp_enqueue_script('match-height');
  wp_enqueue_script('featherlight');
	wp_enqueue_script('featherlight-gallery');
	wp_enqueue_script('main-js');

}
add_action( 'wp_enqueue_scripts', 'mytheme_scripts' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));
	
}

/*** Remove Query String from Static Resources ***/
function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

function create_posttype_rooms() {
 
    register_post_type( 'rooms',
        array(
            'labels' => array(
                'name' => __( 'Rooms' ),
                'singular_name' => __( 'Room' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'rooms'),
            'supports' => array( 'title', 'editor', 'thumbnail','revisions',  ),
        )
    );
}
add_action( 'init', 'create_posttype_rooms' );