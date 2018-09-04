<?php

function add_scripts() {
    $jsSrc = get_template_directory_uri().'/lib/js/';
    $cssSrc = get_template_directory_uri().'/';
    //wp_enqueue_script('jquery');
    //wp_enqueue_script('bootstrap', $jsSrc.'bootstrap.min.js');
    wp_enqueue_script('jqueryx',$jsSrc.'jquery.min.js');
    wp_enqueue_script('popper.js', $jsSrc.'popper.min.js');

    wp_enqueue_style("main",$cssSrc.'main.css');
}
  
add_action( 'wp_enqueue_scripts', 'add_scripts' );  
?>