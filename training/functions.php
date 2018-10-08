<?php
function training_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    $dependencies = array('bootstrap');
	wp_enqueue_style( 'style', get_stylesheet_uri(), $dependencies ); 
}

function training_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script('style', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', $dependencies, '', true );
}

add_action( 'wp_enqueue_scripts', 'training_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'training_enqueue_scripts' );

function theme_widgets() {  
register_sidebar( array(
    'name' => 'Sidebar Right',
    'id' => 'sidebar-right',
    'description' => 'Sidebar Right',
    'before_widget' => '<li id="%1$s" class="sidebar-module sidebar-module-inset">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="sidebar-module">',
    'after_title' => '</h3>',
  ) );

}
add_action( 'widgets_init', 'theme_widgets' );
/*
function register_my_menus() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}

*/

function register_my_menus() {
  register_nav_menus( array(
	'Main_menu' => 'My Custom Main Menu',
	'footer_menu' => 'My Custom Footer Menu',
) );
}

add_action( 'init', 'register_my_menus' );

function theme_prefix_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'theme_prefix_rewrite_flush' ); 

?>
