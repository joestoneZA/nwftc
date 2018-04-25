<?php
add_action( 'after_setup_theme', 'theme_setup' );
function theme_setup()
{
add_theme_support( 'post-thumbnails' );
add_image_size( 'footer-image', 9999, 80 );
add_image_size( 'left-right-image', 9999, 500 );
add_image_size( 'team-member-image', 450, 450 );
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'sitemenu' ) )
);
}

function mytheme_scripts() {

	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
  wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css' );
 	wp_enqueue_style( 'slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.min.css' );
  wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700|Source+Sans+Pro:300,400,600,700' );
  wp_enqueue_style( 'full-calendar-css', 'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css' );
 	wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'layout', get_template_directory_uri() . '/css/layout.css' );

	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array('jquery'), null, true);
  wp_register_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.js', array('jquery'), null, true);
  wp_register_script('match-height', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js', array('jquery'), null, true);
  wp_register_script('moment', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js', array('jquery'), null, true);
  wp_register_script('full-calendar-js', 'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js', array('jquery'), null, true);
	wp_register_script('main-js', get_template_directory_uri() . '/js/main.min.js', array('jquery'), null, true);

	wp_enqueue_script('jquery');
  wp_enqueue_script('slick-js');
  wp_enqueue_script('match-height');
  wp_enqueue_script('moment');
  wp_enqueue_script('full-calendar-js');
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

function create_posttype_careers() {
 
    register_post_type( 'careers',
        array(
            'labels' => array(
                'name' => __( 'Careers' ),
                'singular_name' => __( 'Career' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'careers'),
            'supports' => array( 'title', 'editor','revisions',  ),
        )
    );
}
add_action( 'init', 'create_posttype_careers' );

function create_posttype_testimonials() {
 
    register_post_type( 'testimonials',
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'testimonials'),
            'supports' => array( 'title', 'editor','revisions',  ),
            'rewrite' => array( 'slug' => 'feedback','with_front' => FALSE),
        )
    );
}
add_action( 'init', 'create_posttype_testimonials' );