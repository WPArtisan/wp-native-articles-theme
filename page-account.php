<?php
/**
 * Template Name: Account Page
 */
?>

<?php get_header(); ?>

<?php if ( is_user_logged_in() ) : ?>

	<nav class="account-nav pa3 ph5-l bg-black-80">
		<a class="link ttc f6 fw4 white hover-gray dib mr3" href="#purchases" title="Purchases">Purchases</a>
		<a class="link ttc f6 fw4 white hover-gray dib mr3" href="#licence" title="Licence Keys">Licence Keys</a>
		<a class="link ttc f6 fw4 white hover-gray dib mr3" href="#downloads" title="Downloads">Downloads</a>
		<a class="link ttc f6 fw4 white hover-gray dib mr3" href="#subscriptions" title="Subscriptions">Subscriptions</a>
		<a class="link ttc f6 fw4 white hover-gray dib" href="#profile" title="Profile">Profile</a>
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

					<h2 class="black-70"><?php esc_html_e( 'Your Purchases', 'wp-native-articles-theme' ); ?></h2>

					<p class="black-70"><?php esc_html_e( 'to you blah.', 'wp-native-articles-theme' ); ?></p>


					<?php echo do_shortcode( '[purchase_history]' ); ?>
				</div>

				<div class="licence dn">

					<h2 class="black-70"><?php esc_html_e( 'Manage Your License Keys', 'wp-native-articles-theme' ); ?></h2>

					<p class="black-70"><?php esc_html_e( 'blah blah blah.', 'wp-native-articles-theme' ); ?></p>


					<?php echo do_shortcode( '[edd_license_keys]' ); ?>
				</div>

				<div class="downloads dn">

					<h2 class="black-70"><?php esc_html_e( 'Your Downloads', 'wp-native-articles-theme' ); ?></h2>

					<p class="black-70"><?php esc_html_e( 'something something downloads', 'wp-native-articles-theme' ); ?></p>

					<?php echo do_shortcode( '[download_history]' ); ?>
				</div>

				<div class="subscriptions dn">

					<h2 class="black-70"><?php esc_html_e( 'Manage Your Subscriptions', 'wp-native-articles-theme' ); ?></h2>

					<p class="black-70"><?php esc_html_e( 'Here you can manage your subscriptions.', 'wp-native-articles-theme' ); ?></p>

					<?php echo do_shortcode( '[edd_subscriptions]' ); ?>
				</div>

				<div class="profile dn">

					<h2 class="black-70"><?php esc_html_e( 'Your Profile', 'wp-native-articles-theme' ); ?></h2>

					<p class="black-70"><?php esc_html_e( 'asdassddss', 'wp-native-articles-theme' ); ?></p>

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
