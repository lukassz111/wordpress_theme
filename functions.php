<?php

function lukassz111_wordpress_theme_add_scripts() {
    $assetsSrc = get_template_directory_uri().'/assets/';
    $jsSrc = $assetsSrc;
    $cssSrc = $assetsSrc;

    wp_enqueue_script('lukassz111_wordpress_theme_bundle_js', $assetsSrc.'bundle.js');
    wp_enqueue_style("lukassz111_wordpress_theme_bundle_css",$assetsSrc.'bundle.css');
}
add_action( 'wp_enqueue_scripts', 'lukassz111_wordpress_theme_add_scripts' );

function lukassz111_wordpress_theme_add_menus() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
  }
add_action( 'init', 'lukassz111_wordpress_theme_add_menus' );

//Sidebar
function lukassz111_wordpress_theme_add_sidebar() {

	$args = array(
		'id'            => 'sidebar-left',
		'name'          => 'Left',
	);
	register_sidebar( $args );

	$args = array(
		'id'            => 'sidebar-right',
		'name'          => 'Right',
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'lukassz111_wordpress_theme_add_sidebar' );

//

//li class
function lukassz111_wordpress_theme_add_menu_additional_class_li($classes, $item, $args) {
    if($args->add_li_class) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'lukassz111_wordpress_theme_add_menu_additional_class_li', 1, 3);
//li > a class
function lukassz111_wordpress_theme_add_menu_additional_class_a($atts, $item, $args) {
    if($args->add_li_a_class) {
        $atts['class'] = $args->add_li_a_class;
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'lukassz111_wordpress_theme_add_menu_additional_class_li', 1, 3);
//remove html margin-top
function lukassz111_wordpress_theme_remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'lukassz111_wordpress_theme_remove_admin_login_header');


?>