<?php
add_theme_support('post-thumbnails');
remove_action('wp_head', 'wp_generator');
remove_filter('the_excerpt', 'wptexturize');

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

function vahn_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'vahn_mime_types' );

if ( ! isset( $content_width ) ) {
    $content_width = 1200;
}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
function new_excerpt_more( $more ) {
	global $post;
	return '';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function vahn_excerpt_support() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action('init', 'vahn_excerpt_support');

function vahn_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	}
	$title .= get_bloginfo( 'name', 'display' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title | $site_description";
	}
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'vahn' ), max( $paged, $page ) );
	}
	return $title;
}
add_filter( 'wp_title', 'vahn_wp_title', 10, 2 );

function vahn_styles(){
    wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.min.css');
    wp_enqueue_style( 'fontface', get_template_directory_uri() . '/css/fontface.css');
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css');
    wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/css/slick-theme.css');
		wp_enqueue_style( 'app', get_template_directory_uri() . '/css/app2.css');
}

function vahn_scripts() {
	global $post;
	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/vendor/jquery.js');
	wp_enqueue_script('what-input', get_template_directory_uri() . '/js/vendor/what-input.js', array('jquery'));
	wp_enqueue_script('foundation', get_template_directory_uri() . '/js/vendor/foundation.js', array('jquery'));
	wp_enqueue_script('slick', get_template_directory_uri() . '/js/vendor/slick.min.js', array('jquery'));

	wp_enqueue_script('scroll', get_template_directory_uri() . '/js/vendor/scrollmagic.min.js', array('foundation'));
	wp_enqueue_script('ervandra', get_template_directory_uri() . '/js/app.js', array('scroll'));


}

add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' ),
			'footer-menu' => __( 'Footer Menu' )
			)
		);
}

function mark_menu_item_as_active($classes, $item) {

		if( in_array('menu-item-299', $classes) && ( in_category(14) && !is_home() && !is_search()) )   {
				$classes[] = 'current-menu-item';
		}else if( in_array('menu-item-114',$classes) && ( in_category(3) && !is_home() && !is_search()) )   {
				$classes[] = 'current-menu-item';
		}else if( in_array('menu-item-116',$classes))   {
				$classes[] = 'hire perspective';
		}
		return $classes;
	}
	add_filter('nav_menu_css_class', 'mark_menu_item_as_active', 10, 2);

function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

remove_action('wp_head', 'wp_print_scripts');
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_enqueue_scripts', 1);
add_action('wp_footer', 'wp_print_scripts', 5);
add_action('wp_footer', 'wp_enqueue_scripts', 5);
add_action('wp_footer', 'wp_print_head_scripts', 5);

function sv_remove_jp_sharing() {
	if ( is_singular( 'post' ) && function_exists( 'sharing_display' ) ) {
			remove_filter( 'the_content', 'sharing_display', 1 );
			remove_filter( 'the_excerpt', 'sharing_display', 1 );
	}
}
add_action( 'loop_start', 'sv_remove_jp_sharing' );

function defer_parsing_of_js ( $url ) {
if ( FALSE === strpos( $url, '.js' ) ) return $url;
if ( strpos( $url, 'jquery.js' ) ) return $url;
return "$url' defer='defer";
}
//add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );