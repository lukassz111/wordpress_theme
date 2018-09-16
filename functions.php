<?php

function lukassz111_wordpress_theme_add_scripts() {
    $assetsSrc = get_template_directory_uri().'/assets/';
    $jsSrc = $assetsSrc;
    $cssSrc = $assetsSrc;

    wp_enqueue_script('lukassz111_wordpress_theme_lib_js', $assetsSrc.'lib.js');
    wp_enqueue_script('lukassz111_wordpress_theme_app_js', $assetsSrc.'app.js');
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

//Settings page
function lukassz111_wordpress_theme_settings_page(){
    ?>
    <div class="wrap">
    <h1>Ustawienia motywu</h1>
    <form method="post" action="options.php">
        <?php
            settings_fields("section");
            do_settings_sections("lukassz111-wordpress-theme-options");      
            submit_button(); 
        ?>          
    </form>
    </div>
<?php
}

function lukassz111_wordpress_add_theme_menu_item()
{
    add_theme_page("Ustawienia", "Ustawienia", "manage_options", "lukassz111-wordpress-theme", "lukassz111_wordpress_theme_settings_page", null, 99);
}

add_action("admin_menu", "lukassz111_wordpress_add_theme_menu_item");

function display_theme_panel_fields()
{
	add_settings_section("section", "", null, "lukassz111-wordpress-theme-options");
	
	add_settings_field("hosting", "Hosting", "lukassz111_wordpress_display_hosting_element", "lukassz111-wordpress-theme-options", "section");

    register_setting("section", "hosting");
}

add_action("admin_init", "display_theme_panel_fields");

function lukassz111_wordpress_display_hosting_element()
{
    $options = [
        "0" => "Standardowy",
        "1" => "cba.pl"
    ]
	?>
        <select type="checkbox" name="hosting" id="hosting" value="<?php echo get_option('hosting'); ?>" />
        <?php foreach($options as $key => $value): ?>
            <option value="<?php echo $key; ?>"<?php if($key == get_option('hosting')) { echo 'selected="selected"';} ?>><?php echo $value; ?></option>
        <?php endforeach; ?>
    <?php
}
?>