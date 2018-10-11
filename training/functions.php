<?php
class training{

    public function __construct(){
        add_action( 'wp_enqueue_scripts', array($this, 'training_enqueue_styles' ));
        add_action( 'wp_enqueue_scripts', array($this, 'training_enqueue_scripts' ));
        add_action( 'widgets_init', array($this, 'theme_widgets' ));
        add_action( 'init', array($this, 'register_my_menus' ));
        add_action( 'after_switch_theme', array($this, 'theme_prefix_rewrite_flush' ));
    }

    function training_enqueue_styles() {
        wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
        $dependencies = array('bootstrap');
        wp_enqueue_style( 'style', get_stylesheet_uri(), $dependencies );
    }

    function training_enqueue_scripts() {
        $dependencies = array('jquery');
        wp_enqueue_script('style', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', $dependencies, '', true );
    }

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

    function register_my_menus() {
        register_nav_menus( array(
            'Main_menu' => 'My Custom Main Menu',
            'footer_menu' => 'My Custom Footer Menu',
        ) );
    }

    function theme_prefix_rewrite_flush() {
        flush_rewrite_rules();
    }

}

new training();

?>