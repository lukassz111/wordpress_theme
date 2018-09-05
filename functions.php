<?php

function add_scripts() {
    $jsSrc = get_template_directory_uri().'/lib/js/';
    $cssSrc = get_template_directory_uri().'/';
    //wp_enqueue_script('jquery');
    wp_enqueue_script('jqueryx',$jsSrc.'jquery.min.js');
    wp_enqueue_script('popper.js', $jsSrc.'popper.min.js');
    wp_enqueue_script('bootstrap', $jsSrc.'bootstrap.min.js');

    wp_enqueue_style("main",$cssSrc.'main.css');
}
add_action( 'wp_enqueue_scripts', 'add_scripts' );

function add_menus() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
  }
add_action( 'init', 'add_menus' );

//Sidebar
function add_sidebar() {

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
add_action( 'widgets_init', 'add_sidebar' );

//

//li class
function add_menu_additional_class_li($classes, $item, $args) {
    if($args->add_li_class) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_additional_class_li', 1, 3);
//li > a class
function add_menu_additional_class_a($atts, $item, $args) {
    if($args->add_li_a_class) {
        $atts['class'] = $args->add_li_a_class;
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_additional_class_a', 1, 3);
//remove html margin-top
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');


?>