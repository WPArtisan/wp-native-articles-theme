<?php get_header(); ?>

<section class="vh-100">
	<header class="tc ph5 lh-copy">
		<h1 class="f1 f-headline-l code mb3 fw9 dib tracked-tight light-purple">404</h1>
		<h2 class="tc f1-l fw1"><?php esc_html_e( 'Sorry, we can\'t find the page you are looking for.', 'wp-native-articles-theme' ); ?></h2>
	</header>
	<p class="fw1 i tc mt4 mt5-l f4 f3-l"><?php esc_html_e( 'Are you looking for one of these?', 'wp-native-articles-theme' ); ?></p>
	<ul class="list tc pl0 w-100 mt5">
		<li class="dib"><a class="f5 f4-ns link black db pv2 ph3 hover-light-purple" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'wp-native-articles-theme' ); ?></a></li>
		<li class="dib"><a class="f5 f4-ns link black db pv2 ph3 hover-light-purple" href="<?php echo esc_url( home_url( '#features' ) ); ?>"><?php esc_html_e( 'Features', 'wp-native-articles-theme' ); ?></a></li>
		<li class="dib"><a class="f5 f4-ns link black db pv2 ph3 hover-light-purple" href="<?php echo esc_url( home_url( '#pricing' ) ); ?>"><?php esc_html_e( 'Pricing & Purchase', 'wp-native-articles-theme' ); ?></a></li>
		<li class="dib"><a class="f5 f4-ns link black db pv2 ph3 hover-light-purple" href="<?php echo esc_url( home_url( '/blog' ) ); ?>"><?php esc_html_e( 'Blog', 'wp-native-articles-theme' ); ?></a></li>
		<li class="dib"><a class="f5 f4-ns link black db pv2 ph3 hover-light-purple" href="http://docs.wp-native-articles.com"><?php esc_html_e( 'Support & Docs', 'wp-native-articles-theme' ); ?></a></li>
		<li class="dib"><a class="f5 f4-ns link black db pv2 ph3 hover-light-purple" href="<?php echo esc_url( home_url( '/account' ) ); ?>"><?php esc_html_e( 'Account', 'wp-native-articles-theme' ); ?></a></li>
	</ul>
</section>

<?php get_footer(); ?>
