<?php
/**
 * Basic theme setup stuff.
 *
 * @package wp-native-articles-theme
 */

// Add comments & feed links to head.
add_theme_support( 'automatic-feed-links' );
// Thumbnails.
add_theme_support( 'post-thumbnails' );
// Wordpress managed title tag.
add_theme_support( 'title-tag' );
// Default to HTML5 output.
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
