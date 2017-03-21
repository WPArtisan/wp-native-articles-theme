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
		add_action( 'init', array( $this, 'add_assets_endpoint' ), 10, 0 );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ), 10, 1 );
		add_action( 'wp_enqueue_styles',  array( $this, 'styles' ), 10, 1 );

		// Deregister the normal print styles function.
		remove_action( 'wp_head', 'wp_print_styles', 8 );
		// Register the custom one for critical CSS.
		add_action( 'wp_head', array( $this, 'critical_css' ), 10, 0 );
		// Register the custom one for the combined, lazy-loaded CSS files.
		add_action( 'wp_head', array( $this, 'combined_css_link' ), 10, 0 );

// https://make.wordpress.org/core/2015/07/27/site-icon/
// https://make.wordpress.org/core/2015/11/10/responsive-images-in-wordpress-4-4/
		add_filter( 'template_include', array( $this, 'include_combined_assets' ), 10, 1 );
		add_filter( 'wp_default_scripts', array( $this, 'dequeue_jquery_migrate' ), 10, 1 );
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
	public function scripts( $hook ) {

	}

	/**
	 * Register CSS files.
	 *
	 * @access public
	 * @param string $hook Unique hook for the current page.
	 * @return void
	 */
	public function styles( $hook ) {

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
		// Construct the URL.
		$url = add_query_arg( array(
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
			$this->serve_css();
		}

		// Nothing we want, return 404.
		status_header( 404 );
		nocache_headers();
		wp_die();
	}

	function serve_css() {
		global $wp_styles;

		if ( ! is_a( $wp_styles, 'WP_Styles' ) ) {
			$wp_styles = new WP_Styles();
		}

		$wp_styles->all_deps( $wp_styles->queue );

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
