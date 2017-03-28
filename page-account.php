<?php
/**
 * Template Name: Account Page
 */
?>

<?php get_header(); ?>

<?php if ( is_user_logged_in() ) : ?>

	<?php
	$current_user = wp_get_current_user();
	?>

	<div class="ph5 pv4 bg-light-blue">
		<span class="f2 fw4 pb3"><?php echo esc_html( sprintf( __( 'Hi %s,', 'wp-native-articles-theme' ), $current_user->first_name ) ); ?></span>
		<p class="lh-copy"><?php esc_html_e( 'Welcome to your account. Here you can view all your purchases, manage your subscriptions and download your files.', 'wp-native-articles-theme' ); ?></p>
		<p class="lh-copy">
			<?php
			echo sprintf(
				wp_kses(
					__( 'Don\'t forget to activate your licence. All tutorials and documentation can be found under the <strong>Support &amp; Docs</strong> menu above. If you need any help just get in touch at <a class="black underline" href="%s">support@wp-native-articles.com</a>.', 'wp-native-articles-theme' ),
					array(  'a' => array( 'href' => array(), 'class' => array() ), 'strong' => array() )
				), esc_url( 'mailto:support@wp-native-articles.com' )
			);
			?>
		</p>

		<p class="th-copy"><strong><?php esc_html_e( 'Your Email:', 'wp-native-articles-theme' ); ?></strong> <?php echo esc_html( $current_user->user_email ); ?></p>
	</div>

	<nav class="account-nav pa3 ph5-l bg-black-80">
		<a class="link ttc f6 fw4 white hover-gray dib mr3" href="#purchases" title="Purchases"><?php esc_html_e( 'Purchases', 'wp-native-articles-theme' ); ?></a>
		<a class="link ttc f6 fw4 white hover-gray dib mr3" href="#licence" title="Licence Keys"><?php esc_html_e( 'Licence', 'wp-native-articles-theme' ); ?> Keys</a>
		<a class="link ttc f6 fw4 white hover-gray dib mr3" href="#downloads" title="Downloads"><?php esc_html_e( 'Downloads', 'wp-native-articles-theme' ); ?></a>
		<a class="link ttc f6 fw4 white hover-gray dib mr3" href="#subscriptions" title="Subscriptions"><?php esc_html_e( 'Subscriptions', 'wp-native-articles-theme' ); ?></a>
		<a class="link ttc f6 fw4 white hover-gray dib" href="#profile" title="Profile"><?php esc_html_e( 'Profile', 'wp-native-articles-theme' ); ?></a>
	</nav>

	<script>

		jQuery(document).ready(function() {
			if ( window.location.hash.length > 0 ) {
				wpnatFocusTab( window.location.hash );
			}
		});

		jQuery( '.account-nav a.link' ).on('click', function( e ) {
			var target = jQuery( this ).attr( 'href' );
			wpnatFocusTab( target );
		});

		function wpnatFocusTab( target ) {
			// jQuery( '.account-nav a.black' ).removeClass( 'black' ).addClass( 'gray' );
			// jQuery( '.account-nav a[href="' + target + '"]'  ).addClass( 'black' );

			var target = target.replace( "#", "." );

			jQuery( '.account-wrap .db' ).removeClass( 'db' ).addClass( 'dn' );
			jQuery( '.account-wrap ' + target ).removeClass( 'dn' ).addClass( 'db' );
		}
	</script>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<article class="account-wrap ph4 ph5-l mw9-l center">

				<div class="purchases db">

					<h2 class="lh-title black-80"><?php esc_html_e( 'Purchase History', 'wp-native-articles-theme' ); ?></h2>

					<p class="lh-copy black-80">
						<?php
						echo wp_kses(
								__( 'All your purchases are listed below. Any problems or enquiries please get in touch with support.', 'wp-native-articles-theme' ),
								array( 'strong' => array() )
							);
						?>
					</p>


					<?php echo do_shortcode( '[purchase_history]' ); ?>
				</div>

				<div class="licence dn">

					<h2 class="lh-title black-80"><?php esc_html_e( 'Manage Your License Keys', 'wp-native-articles-theme' ); ?></h2>

					<p class="lh-copy black-80">
						<?php
						echo wp_kses(
								__( 'Below you will find all the licence keys for your purchases. You can use licence keys to enable the auto updater for sites you have the plugin installed on. You can manage the sites a licence key is valid for using the <strong>Manage Sites</strong> links below.', 'wp-native-articles-theme' ),
								array( 'strong' => array() )
							);
						?>
					</p>

					<?php echo do_shortcode( '[edd_license_keys]' ); ?>
				</div>

				<div class="downloads dn">

					<h2 class="lh-title black-80"><?php esc_html_e( 'View Your Downloads', 'wp-native-articles-theme' ); ?></h2>

					<p class="lh-copy black-80">
						<?php
						echo wp_kses(
								__( 'Here you can download the latest version of the plugin. If you’re updating the plugin then using the autoupdater is recommended. Alternatively, copying the files from the newer version over the old version will work fine. <strong>Uninstalling the plugin will delete all global settings you have saved.</strong>', 'wp-native-articles-theme' ),
								array( 'strong' => array() )
							);
						?>
					</p>

					<?php echo do_shortcode( '[download_history]' ); ?>
				</div>

				<div class="subscriptions dn">

					<h2 class="lh-title black-80"><?php esc_html_e( 'Manage Your Subscriptions', 'wp-native-articles-theme' ); ?></h2>

					<p class="lh-copy black-80">
						<?php
						echo wp_kses(
								__( 'Below you’ll find all your active and inactive subscriptions, when they’re billed, at what interval and for how much. You can view or download invoices for any of your subscriptions at any time by using the <strong>View Invoice</strong> links.', 'wp-native-articles-theme' ),
								array( 'strong' => array() )
							);
						?>
					</p>

					<?php echo do_shortcode( '[edd_subscriptions]' ); ?>
				</div>

				<div class="profile dn">

					<h2 class="lh-title black-80"><?php esc_html_e( 'Your Profile', 'wp-native-articles-theme' ); ?></h2>

					<p class="lh-copy black-80">
						<?php
						echo wp_kses(
								__( 'The form below can be used to update your profile information. The information is used to auto-complete certain fields at the checkout but can be overridden.', 'wp-native-articles-theme' ),
								array( 'strong' => array() )
							);
						?>
					</p>

					<?php echo do_shortcode( '[edd_profile_editor]' ); ?>
				</div>

			</article>

		<?php endwhile; ?>

	<?php endif; ?>

<?php else : ?>

	<div class="pa4 ph7-l mw9-l center">

		<?php echo edd_login_form(); ?>

	</div>

<?php endif; ?>

<?php get_footer(); ?>
