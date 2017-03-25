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


function add_image_class($class){
$class .= ' mw-100 h-auto';
return $class;
}
add_filter('get_image_tag_class','add_image_class');

function remove_admin_bar() {
	if ( ! current_user_can( 'administrator' ) && ! is_admin() ) {
		show_admin_bar(false);
	}
}
add_action('after_setup_theme', 'remove_admin_bar');

function wpna_edd_sl_add_key_column() {
	echo '<th class="edd_license_key fw6 bb b--light-gray tl pa3 bg-light-gray">' . __( 'License Keys', 'edd_sl' ) . '</th>';
}
remove_action( 'edd_purchase_history_header_after', 'edd_sl_add_key_column' );
add_action( 'edd_purchase_history_header_after', 'wpna_edd_sl_add_key_column' );

function wpnat_edd_sl_site_management_links( $payment_id, $purchase_data ) {

	$licensing = edd_software_licensing();
	$downloads = edd_get_payment_meta_downloads( $payment_id );
	if( $downloads) :
		$manage_licenses_url = esc_url( add_query_arg( array( 'action' => 'manage_licenses', 'payment_id' => $payment_id ) ) );
		echo '<td class="edd_license_key pa3 bb b--light-gray">';
			if( edd_is_payment_complete( $payment_id ) && $licensing->get_licenses_of_purchase( $payment_id ) ) {
				echo '<a class="link underline-hover wpna-blue" href="' . esc_url( $manage_licenses_url ) . '">' . __( 'View Licenses', 'edd_sl' ) . '</a>';
			} else {
				echo '-';
			}
		echo '</td>';
	else:
		echo '<td class="pa3">&mdash;</td>';
	endif;
}
remove_action( 'edd_purchase_history_row_end', 'edd_sl_site_management_links', 10, 2 );
add_action( 'edd_purchase_history_row_end', 'wpnat_edd_sl_site_management_links', 10, 2 );




function wpnat_img_caption_shortcode( $output, $attr, $content ) {
	$atts = shortcode_atts( array(
		'id'	  => '',
		'align'	  => 'alignnone',
		'width'	  => '',
		'caption' => '',
		'class'   => 'mw-100 ma0 pa0',
	), $attr, 'caption' );

	$atts['width'] = (int) $atts['width'];
	if ( $atts['width'] < 1 || empty( $atts['caption'] ) )
		return $content;

	if ( ! empty( $atts['id'] ) )
		$atts['id'] = 'id="' . esc_attr( sanitize_html_class( $atts['id'] ) ) . '" ';

	$class = trim( 'wp-caption ' . $atts['align'] . ' ' . $atts['class'] );

	$html5 = current_theme_supports( 'html5', 'caption' );
	// HTML5 captions never added the extra 10px to the image width
	$width = $html5 ? $atts['width'] : ( 10 + $atts['width'] );

	/**
	 * Filters the width of an image's caption.
	 *
	 * By default, the caption is 10 pixels greater than the width of the image,
	 * to prevent post content from running up against a floated image.
	 *
	 * @since 3.7.0
	 *
	 * @see img_caption_shortcode()
	 *
	 * @param int    $width    Width of the caption in pixels. To remove this inline style,
	 *                         return zero.
	 * @param array  $atts     Attributes of the caption shortcode.
	 * @param string $content  The image element, possibly wrapped in a hyperlink.
	 */
	$caption_width = apply_filters( 'img_caption_shortcode_width', $width, $atts, $content );

	$style = '';
	if ( $caption_width ) {
		$style = 'style="width: ' . (int) $caption_width . 'px" ';
	}

	if ( $html5 ) {
		$html = '<figure ' . $atts['id'] . $style . 'class="' . esc_attr( $class ) . '">'
		. do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $atts['caption'] . '</figcaption></figure>';
	} else {
		$html = '<div ' . $atts['id'] . $style . 'class="' . esc_attr( $class ) . '">'
		. do_shortcode( $content ) . '<p class="wp-caption-text">' . $atts['caption'] . '</p></div>';
	}

	return $html;
}
add_filter( 'img_caption_shortcode', 'wpnat_img_caption_shortcode', 10, 3 );
