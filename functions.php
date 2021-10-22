<?php 

add_action( 'wp_enqueue_scripts', 'my_scripts_method', 99 );
add_action( 'wp_footer', 'scripts_theme' );
add_action( 'wp_enqueue_scripts', 'style_theme' );

function style_theme() {
  // inject style.css from root
  wp_enqueue_style('style', get_stylesheet_uri());
  // inject default.css (or any custom styles like that)
  wp_enqueue_style('default', get_template_directory_uri() . '/assets/css/default.css');
  wp_enqueue_style('layout', get_template_directory_uri() . '/assets/css/layout.css');
  wp_enqueue_style('media-queries', get_template_directory_uri() . '/assets/css/media-queries.css');
}

function my_scripts_method() {
	// получаем версию jQuery
	wp_enqueue_script( 'jquery' );
	// для версий WP меньше 3.6 'jquery' нужно поменять на 'jquery-core'
	$wp_jquery_ver = $GLOBALS['wp_scripts']->registered['jquery']->ver;
	$jquery_ver = $wp_jquery_ver == '' ? '1.11.0' : $wp_jquery_ver;

	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/'. $jquery_ver .'/jquery.min.js' );
	wp_enqueue_script( 'jquery' );
}

function scripts_theme() {
  // inject JS-scripts
  wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.js');
  wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js');
  wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js');
  wp_enqueue_script('doubletabtogo', get_template_directory_uri() . '/js/doubletabtogo.js');
  wp_enqueue_script('init', get_template_directory_uri() . '/js/init.js');
}

?>