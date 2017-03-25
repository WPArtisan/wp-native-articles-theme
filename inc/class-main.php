<?php
/**
 * Main setup stuff for the theme.
 *
 * @package wp-native-articles-theme
 */

class WPNAT_Main {

	/**
	 * Register hook straight away.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		$this->hooks();
	}

	/**
	 * Setup actions and filters.
	 *
	 * @access public
	 * @return void
	 */
	public function hooks() {
		// add_action( 'init', array( $this, 'add_assets_endpoint' ), 10, 0 );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ), 10, 0 );
		add_action( 'wp_enqueue_scripts', array( $this, 'styles' ), 10, 0 );




		// Deregister the normal print styles function.
		// remove_action( 'wp_head', 'wp_print_styles', 8 );
		// Register the custom one for critical CSS.
		// add_action( 'wp_head', array( $this, 'critical_css' ), 10, 0 );
		// Register the custom one for the combined, lazy-loaded CSS files.
		// add_action( 'wp_head', array( $this, 'combined_css_link' ), 10, 0 );

// https://make.wordpress.org/core/2015/07/27/site-icon/
// https://make.wordpress.org/core/2015/11/10/responsive-images-in-wordpress-4-4/
		// add_filter( 'template_include', array( $this, 'include_combined_assets' ), 10, 1 );
		//
		add_filter( 'the_content', array( $this, 'format_content' ), 10, 1 );
		add_filter( 'excerpt_more', array( $this, 'excerpt_more' ), 10, 1 );
		add_filter( 'wp_default_scripts', array( $this, 'dequeue_jquery_migrate' ), 10, 1 );


// add_filter( 'query_vars', array( $this,  'add_query_vars_filter' ), 10, 1 );
	}

function add_query_vars_filter( $vars ){
$vars[] = 's';
return $vars;
}


	/**
	 * Creates an `assets` endpoint.
	 *
	 * @access public
	 * @return void
	 */
	public function add_assets_endpoint() {
		add_rewrite_endpoint( 'assets', EP_ROOT );
	}

	/**
	 * Register JS files.
	 *
	 * @access public
	 * @param string $hook Unique hook for the current page.
	 * @return void
	 */
	public function scripts() {
		wp_enqueue_script( 'jquery' );
	}

	/**
	 * Register CSS files.
	 *
	 * @access public
	 * @param string $hook Unique hook for the current page.
	 * @return void
	 */
	public function styles() {
		wp_register_style( 'main', get_template_directory_uri() . '/assets/_css/main.min.css', [  ], '1.1.8', 'screen' );

		wp_enqueue_style( 'main' );
	}

	/**
	 * Output critical CSS.
	 *
	 * Critical CSS for above the folder stuff is outputted inline.
	 *
	 * @access public
	 * @return void
	 */
	public function critical_css() {
		?>
		<style type="text/css">
			<?php include WPNAT_BASE_PATH . '/assets/_css/critical.min.css'; ?>
		</style>
		<?php
	}

	/**
	 * Output critical CSS.
	 *
	 * Critical CSS for above the folder stuff is outputted inline.
	 *
	 * @access public
	 * @return void
	 */
	public function combined_css_link() {

		global $wp_styles;

		$stylesheets = array();

		foreach ( $wp_styles->queue as $style ) {
			$stylesheets[] = $wp_styles->registered[ $style ]->handle;
		}

		// Construct the URL.
		$url = add_query_arg( array(
			's' => implode( ',', $stylesheets ),
			'v' => WPNAT_VERSION,
		), site_url( 'assets/combined.min.css' ) );
		?>
		<link rel="preload" href="<?php echo esc_url( $url ); ?>" as="style" onload="this.rel='stylesheet'">
		<noscript><link rel="stylesheet" href="<?php echo esc_url( $url ); ?>"></noscript>
		<?php
	}

	/**
	 * Serve up the assets.
	 *
	 * Checks to see if it's queried the new `assets` endpoint and if
	 * so servers up the correct file.
	 *
	 * @access public
	 * @param  string $template Current template being included.
	 * @return mixed
	 */
	public function include_combined_assets( $template ) {
		// If it's not the `assets` endpoint bail.
		if ( false === get_query_var( 'assets', false ) ) {
			return $template;
		}

		if ( 'combined.min.css' === get_query_var( 'assets', false ) ) {
			$handles = explode( ',', get_query_var( 's', array() ) );
			$this->serve_css( $handles );
		}

		// Nothing we want, return 404.
		status_header( 404 );
		nocache_headers();
		wp_die();
	}

	function serve_css( $handles ) {
		global $wp_styles;

		if ( ! is_a( $wp_styles, 'WP_Styles' ) ) {
			$wp_styles = new WP_Styles();
		}

$t = $wp_styles->registered;

var_dump( $t ); die;
foreach ( $handles as $h )
		$wp_styles->do_item( $h );
		die;

		$expiresOffset = 28 * DAY_IN_SECONDS;
		header( "Content-Type: text/css; charset=" . get_bloginfo( 'charset' ) );
		header( "Vary: Accept-Encoding" ); // Handle proxies
		// header( "Expires: " . gmdate( "D, d M Y H:i:s", time() + $expiresOffset ) . " GMT" );

		$content = '';

		foreach ( (array) $wp_styles->to_do as $style ) {
			$style = $wp_styles->registered[ $style ];
			if ( is_readable( ABSPATH . $style->src ) ) {
				$content .= file_get_contents( ABSPATH . $style->src );
			}
			$content .= "\n\n";
		}

		echo $content;

		die;
	}

	/**
	 * [format_p_tags description]
	 * @param  [type]  $content [description]
	 * @return {[type]          [description]
	 */
	public function format_content( $content ) {
		$replace = array(
			'<blockquote><p>' => '<blockquote class="ml0 mt0 pl4 black-90 bl bw2 b--wpna-blue"><p class="f4 f3-l lh-copy mt0">',
			'<ul>' => '<ul class="list ph3 ph3-ns pv1">',
			'<ol>' => '<ol class="list ph3 ph3-ns pv1">',
			'<li>' => '<li class="mr2 pv2">',
			'<p>'  => '<p class="lh-copy mb4">',
			'<h3>' => '<h3 class="f2 f1-m fw2 lh-title mv0">',
			'<a'  => '<a class="wpna-blue"',
		);

		return str_ireplace( array_keys( $replace ), array_values( $replace ), $content );
	}

	/**
	 * Filter the excerpt "read more" string.
	 *
	 * @access public
	 * @param string $more "Read more" excerpt string.
	 * @return string (Maybe) modified "read more" excerpt string.
	 */
	public function excerpt_more( $more ) {
		return '';
	}

	/**
	 * Deregister the jquery migrate lib.
	 *
	 * We don't really need it and it's slow.
	 *
	 * @param  WP_Scripts $scripts Script register class.
	 * @return void
	 */
	public function dequeue_jquery_migrate( &$scripts ){
		if ( ! is_admin() ) {
			$scripts->remove( 'jquery');
			$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
		}
	}

}
