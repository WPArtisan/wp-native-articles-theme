	<footer class="">

		<section class="ph3 ph5-m ph6-l pv4 cf center bg-black-80 white">
			<div class="mb4-l mb0 w-100 w-50-l fr tc tr-l">
				<a class="f4 f3-ns fw3 tl link dim dib pv3 mt2 mb4 mb0-l light-blue" href="mailto:hello@wp-native-articles.com">
					hello@wp-native-articles.com
				</a>
			</div>
			<div class="mb4 mb0-ns fl w-100 w-50-l tc tl-l" >
				<p class="f4 fw2 mb2 f6 mt0">
					<?php echo esc_html( 'Sign up for our newsletter.', 'wp-native-articles-theme' ); ?>
				</p>
				<form action="//wpartisan.us13.list-manage.com/subscribe/post?u=6d140baaa56a04a1d2f126872&amp;id=6047071390" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate contained-form form-email" target="_blank" novalidate>
					<input type="email" value="" name="EMAIL" class="email mw-100 w-100 w5-ns f5 input-reset ba b--black-20 pv2 ph3 border-box" id="mce-EMAIL" placeholder="email address" required>
					<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					<div style="position: absolute; left: -5000px;" aria-hidden="true">
						<input type="text" name="b_6d140baaa56a04a1d2f126872_6047071390" tabindex="-1" value="">
					</div>
					<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="input-reset w-100 w-auto-ns bg-black-80 white f5 pv1 pv2-ns ph4 ba b--black-80 bg-hover-mid-gray">
				</form>
			</div>
		</section>

		<div class="dt dt--fixed w-80 center black-80">
			<div class="dn dtc-ns v-mid">
				<p class="f7 black-70 dib pr3 mb3">
					<small class="f6 db tl">&copy; Copyright <?php echo date( 'Y' ); ?> <a class="fw4 black-80" href="https://wpartisan.me" target="_blank">WPArtisan.me</a>., All Rights Reserved</small>
				</p>
			</div>

			<div class="db dtc-ns black-70 tc tr-ns v-mid">

					<a href="<?php echo esc_url( home_url( '/language' ) ); ?>" title="<?php esc_html_e( 'Language', 'wp-native-articles-theme' ); ?>" class="f6 dib ph2 link black-80 dim"><?php esc_html_e( 'Language', 'wp-native-articles-theme' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/terms' ) ); ?>"    title="<?php esc_html_e( 'Terms', 'wp-native-articles-theme' ); ?>" class="f6 dib ph2 link black-80 dim"><?php esc_html_e( 'Terms of Use', 'wp-native-articles-theme' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>"  title="<?php esc_html_e( 'Privacy', 'wp-native-articles-theme' ); ?>" class="f6 dib ph2 link black-80 dim"><?php esc_html_e( 'Privacy', 'wp-native-articles-theme' ); ?></a>

			</div>

		</div>

	</footer>

	<?php wp_footer(); ?>

</body>
</html>
