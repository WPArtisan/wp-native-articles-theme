<?php

function wpna_styles() {
	wp_enqueue_style( 'wpna-icons', get_template_directory_uri() . '/assets/css/icons.min.css', null, '1.0.0', 'all' );
	wp_enqueue_style( 'wpna-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', null, '1.0.0', 'all' );
	wp_enqueue_style( 'wpna-flexslider', get_template_directory_uri() . '/assets/css/flexslider.min.css', null, '1.0.0', 'all' );
	wp_enqueue_style( 'wpna-fairsky', get_template_directory_uri() . '/assets/css/theme-fairsky.css', null, '1.0.0', 'all' );
	wp_enqueue_style( 'wpna-custom', get_template_directory_uri() . '/assets/css/custom.css', null, '1.0.0', 'all' );
	wp_enqueue_style( 'wpna-gfonts', 'http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic', null, '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'wpna_styles' );

function wpna_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'wpna-tweenmax', 'http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'wpna-ScrollToPlugin', 'http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'wpna-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'wpna-placeholders', get_template_directory_uri() . '/assets/js/placeholders.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'wpna-parallax', get_template_directory_uri() . '/assets/js/parallax.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'wpna-scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpna_scripts' );
