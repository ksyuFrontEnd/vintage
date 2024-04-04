<?php 

/* 
linking styles and scripts
*/


// правильний спосіб підключити стилі та скрипти 
add_action ( 'wp_enqueue_scripts' , 'vintage_add_scripts' );
 
function  vintage_add_scripts() {
    
    wp_enqueue_style ( 'theme-style' , get_stylesheet_uri () );
    wp_enqueue_style ( 'superfish', get_template_directory_uri () . '/css/superfish.css', array(), false, 'screen' );
    wp_enqueue_style ( 'nivo-slider', get_template_directory_uri () . '/css/nivo-slider.css', array(), false, 'screen' );
    wp_enqueue_style ( 'tweet', get_template_directory_uri () . '/css/tweet.css', array(), false, 'screen' );
    wp_enqueue_style ( 'style', get_template_directory_uri () . '/css/style.css', array(), false, 'screen' );
    wp_enqueue_style ( 'lessframework', get_template_directory_uri () . '/css/lessframework.css', array(), false, 'screen' );
   
    wp_deregister_script ( 'jquery' );
    wp_register_script ( 'jquery' , get_template_directory_uri () . '/js/jquery-1.7.1.min.js' );
    wp_enqueue_script ( 'jquery' );

    wp_enqueue_script ( 'modernizr' , get_template_directory_uri () . '/js/modernizr-2.5.3.min.js' );
    wp_enqueue_script ( 'custom' , get_template_directory_uri () . '/js/custom.js', $deps, $ver, true );
    wp_enqueue_script ( 'superfish-hoverIntent' , get_template_directory_uri () . '/js/superfish-1.4.8/js/hoverIntent.js', $deps, $ver, true );
    wp_enqueue_script ( 'superfish' , get_template_directory_uri () . '/js/superfish-1.4.8/js/superfish.js', $deps, $ver, true );
    wp_enqueue_script ( 'supersubs' , get_template_directory_uri () . '/js/superfish-1.4.8/js/supersubs.js', $deps, $ver, true );
    wp_enqueue_script ( 'isotope' , get_template_directory_uri () . '/js/jquery.isotope.min.js', $deps, $ver, true );
    wp_enqueue_script ( 'nivo' , get_template_directory_uri () . '/js/jquery.nivo.slider.js', $deps, $ver, true );
    wp_enqueue_script ( 'css3-mediaqueries' , get_template_directory_uri () . '/js/css3-mediaqueries.js', $deps, $ver, true );
    wp_enqueue_script ( 'tabs' , get_template_directory_uri () . '/js/tabs.js', $deps, $ver, true );
    wp_enqueue_script ( 'poshytip-1' , get_template_directory_uri () . '/js/poshytip-1.1/src/jquery.poshytip.min.js', $deps, $ver, true );
    
}

