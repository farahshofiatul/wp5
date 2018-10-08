<?php
function my_theme_enqueue_styles() {

    $parent_style = 'training-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function themename_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );


if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {

	$optionsframework_settings = get_option('optionsframework');

	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];

	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}

	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

    jQuery('#example_showhidden').click(function() {
        jQuery('#section-example_text_hidden').fadeToggle(400);
    });

    if (jQuery('#example_showhidden:checked').val() !== undefined) {
        jQuery('#section-example_text_hidden').show();
    }

});
</script>

<?php
}

function wp_maintenance_mode(){
    wp_die('<h1 style="color:red">Website under Maintenance</h1><br />We are performing scheduled maintenance. We will be back on-line shortly!');
    
}
if(of_get_option('show_maintenance','no') == true){
    add_action('get_header', 'wp_maintenance_mode');
}
?>