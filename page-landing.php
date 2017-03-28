<?php
/**
 * Template Name: Landing Page
 */

get_header(); ?>

	<section class="w-100 pa4 bg-light-blue tc">

		<h1 class="white tc f1 fw6 lh-heading" style="text-shadow: 3px 3px rgba( 0, 0, 0, 0.1 );"><b>WordPress</b> Native Articles</h1>
		<h5 class="white tc f3 fw3 lh-heading">THE Premium WordPress Plugin for Facebook Instant Articles</h5>
		<a class="dib center link bg-black-80 white pv3 ph4 br1" target="_blank" href="https://wordpress.org/plugins/wp-native-articles/"><?php esc_html_e( 'Download Free Version', 'wp-native-articles-theme' ); ?></a>
	</section>

	<?php
		$latest_blog_posts = get_posts( array( 'numberposts' => 1, 'no_found_rows' => true ) );
	?>

	<?php if ( $latest_blog_posts ) : ?>
		<?php foreach ( $latest_blog_posts as $latest_blog_post ) : ?>
			<div class="bg-light-gray w100 ph4 pv3 tc">

				<span class="dib link bg-light-pink br1 ttu white pv2 ph3 mr3">
					<?php esc_html_e( 'Latest', 'wp-native-articles-theme' ); ?>
				</span>

				<p class="dib f4 fw3 black-40">
					<?php echo esc_html( $latest_blog_post->post_title ); ?>
				</p>

				<a class="dib link black-80 f4 fw5" href="<?php echo esc_url( get_permalink( $latest_blog_post->ID ) ); ?>"><?php esc_html_e( 'Read More', 'wp-native-articles-theme' ); ?></a>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>


	<section class="w-80 center pv3 tc">
		<h2 class="f2 fw6 lh-title">WordPress + Facebook Instant Articles. Simple.</h2>
		<h4 class="f4 fw3 lh-subtitle">It shouldn't be difficult. Don't make it.</h4>

<!-- <div class="fl w-100 w-25-ns pa2">
	<div class="outline bg-white pv4">
		<h3>PACKED full of features.</h3>
		<p>The most feature rich WordPress Instant Article Plugin - making it super easy to manage your Facebook articles.</p>
	</div>
</div> -->

		<div class="cf center">
			<div class="fl w-100 w-third-ns pa2">
				<div class="">
					<h5 class="f3 fw5 lh-title">API &amp; RSS Feed Methods</h5>
					<p class="f4-5 lh-copy">Connect your WordPress site to your Facebook Instant Articles Page using either the RSS Feed or the API method for realtime time article syncing.</p>
				</div>
			</div>
			<div class="fl w-100 w-third-ns pa2">
				<div class="">
					<h5 class="f3 fw5 lh-title">Advanced Content Parser</h5>
					<p class="f4-5 lh-copy">
						Instant Articles has a strict XML structure, WordPress does not. Our advanced parsing algorithm converts messy WordPress HTML into valid Instant Article XML.
					</p>
				</div>
			</div>
			<div class="fl w-100 w-third-ns pa2">
				<div class="">
					<h5 class="f3 fw5 lh-title">Options Galore</h5>
					<p class="f4-5 lh-copy">Instant Articles has a lot of complex layout options, we've simplified them. You can set global defaults then override them on each article, should you wish.</p>
				</div>
			</div>
		</div>

	</section>

	<section class="w-80 center pv3 tl">
		<h2 class="f2 fw6 lh-title">Feature RICH</h2>
		<h4 class="f4 fw3 lh-subtitle">a sub heading</h4>

		<div class="pv4 bb b--black-10">
			<div class="flex flex-column flex-row-ns">
				<div class="w-100 w-50-ns pr3-ns order-2 order-1-ns">
					<h4 class="f3 fw3 lh-subtitle">Real Time Analytics.</h4>
					<p class="f4-5 lh-copy">Live analytics straight from Facebook for each article + aggregated overview analytics for your entire site.</p>
				</div>
				<div class="pl3-ns order-1 order-2-ns mb4 mb0-ns w-100 w-50-ns">
					<img alt="WordPress Facebook Instant Articles API Status" src="<?php echo get_template_directory_uri(); ?>/assets/_img/wordpress-facebook-instant-articles-api-stats.png">
				</div>
			</div>
		</div>

		<div class="pv4 bb b--black-10">
			<div class="flex flex-column flex-row-ns">
				<div class="w-100 w-50-ns pr3-ns order-2 order-1-ns">
					<h4 class="f3 fw3 lh-subtitle">Live Import Status.</h4>
					<p class="f4-5 lh-copy">When a post is published or updated the Instant Article status is retrieved live from Facebook and displayed in the Admin. Any errors with the article can be seen immediately.</p>
				</div>
				<div class="pl3-ns order-1 order-2-ns mb4 mb0-ns w-100 w-50-ns">
					<img alt="WordPress Facebook Instant Articles Import Status" src="<?php echo get_template_directory_uri(); ?>/assets/_img/wordpress-facebook-instant-articles-import-status.png">
				</div>
			</div>
		</div>

		<div class="pv4">
			<div class="flex flex-column flex-row-ns">
				<div class="w-100 w-50-ns pr3-ns order-2 order-1-ns">
					<h4 class="f3 fw3 lh-subtitle">Readable Code.</h4>
					<p class="f4-5 lh-copy">Coded to WordPress standards, fully commented and contains as many filters and actions as we could possibly fit. The full documentation can be found at <a class="light-pink" href="http://docs.wp-native-articles.com">docs.wp-native-articles.com</a>.</p>
				</div>
				<div class="pl3-ns order-1 order-2-ns mb4 mb0-ns w-100 w-50-ns">
					<img alt="WordPress Facebook Instant Articles Code Example" src="<?php echo get_template_directory_uri(); ?>/assets/_img/wordpress-facebook-instant-articles-comments-filters.png">
				</div>
			</div>
		</div>

	</section>


	<section class="w-80 center pv4">

		<div class="cf ph0-ns">
			<div class="fl w-100 w-25-ns pa2">
				<div class="outline pv4 tc">
					<i class="icon-browser-streamline-window"></i>
					<h5>Global &amp; Article Settings</h5>
				</div>
			</div>
			<div class="fl w-100 w-25-ns pa2 tc">
				<div class="outline pv4">
					<i class="icon-arrow-streamline-target"></i>
					<h5>Ad Enabled</h5>
				</div>
			</div>
			<div class="fl w-100 w-25-ns pa2 tc">
				<div class="outline pv4">
					<i class="icon-book-dowload-streamline"></i>
					<h5>Full Documentation</h5>
				</div>
			</div>
			<div class="fl w-100 w-25-ns pa2 tc">
				<div class="outline pv4">
					<i class="icon-bubble-love-streamline-talk"></i>
					<h5>Analytics</h5>
				</div>
			</div>
		</div>

		<div class="cf ph0-ns">
			<div class="fl w-100 w-25-ns pa2 tc">
				<div class="outline pv4">
					<i class="icon-design-pencil-rule-streamline"></i>
					<h5>Sponsored Articles</h5>
				</div>
			</div>
			<div class="fl w-100 w-25-ns pa2 tc">
				<div class="outline pv4">
					<i class="icon-frame-picture-streamline"></i>
					<h5>Auto Updates</h5>
				</div>
			</div>
			<div class="fl w-100 w-25-ns pa2 tc">
				<div class="outline pv4">
					<i class="icon-map-streamline-user"></i>
					<h5>Quick Support Times</h5>
				</div>
			</div>
			<div class="fl w-100 w-25-ns pa2 tc">
				<div class="outline pv4">
					<i class="icon-paint-bucket-streamline"></i>
					<h5>Easy Customisation</h5>
				</div>
			</div>
		</div>

	</section>


	<section class="bg-light-gray pv3">

		<div class="w-80 center">

			<a name="faqs"></a>

			<h3 class="f1 fw3 lh-title mv0 pv0">FAQs</h3>

			<div class="center">
				<div class="cf">
					<div class="fl w-100 w-50-ns pr0 pr2-ns">
						<div class="">
							<h5 class="lh-title f4">How do I get updates?</h5>
							<p class="lh-copy f4-5">Updates happen through the WordPress admin in the same way as other plugins. If you've got a valid licence key then updates are free of charge.</p>
						</div>
					</div>
					<div class="fl w-100 w-50-ns pl0 pl2-ns">
						<div class="">
							<h5 class="lh-title f4">Is it Multisite compatible?</h5>
							<p class="lh-copy f4-5">Yes. Multisite installs only require a single licence to get updates. There are also tools in the network panel for setting default site options and resetting options.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="center">
				<div class="cf">
					<div class="fl w-100 w-50-ns pr0 pr2-ns">
						<div class="">
							<h5 class="lh-title f4">Can I cancel my subscription?</h5>
							<p class="lh-copy f4-5">Yes. You can cancel your subscription at anytime from your account page. You'll continue to receive updates until your licence expires, one year after purchase.</p>
						</div>
					</div>
					<div class="fl w-100 w-50-ns pl0 pl2-ns">
						<div class="">
							<h5 class="lh-title f4">Why do I have to renew my subscription?</h5>
							<p class="lh-copy f4-5">You need a valid licence in order to continue receiving updates and new features. All licences are valid for 1 year after purchase. Licence renewals get an automatic 25% discount.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="center">
				<div class="cf">
					<div class="fl w-100 w-50-ns pr0 pr2-ns">
						<div class="">
							<h5 class="lh-title f4">What's the refund policy?</h5>
							<p class="lh-copy f4-5">We stand by our product and customer satisfaction is our top priority, but if for any reason you're unhappy we will provide a full refund within 30 days of purchase.</p>
						</div>
					</div>
					<div class="fl w-100 w-50-ns pl0 pl2-ns">
						<div class="">
							<h5 class="lh-title f4">How do I get support?</h5>
							<p class="lh-copy f4-5">Full documentation, tutorials and knowledge base is available at docs.wp-native-articles.com. Alternatively you can contact us directly on your account page <a class="light-pink" href="https://wp-native-articles.com/account/">here</a>.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="center">
				<div class="cf">
					<div class="fl w-100 w-50-ns pr0 pr2-ns">
						<div class="">
							<h5 class="lh-title f4">I have a pre-sales question</h5>
							<p class="lh-copy f4-5">We're happy to answer any pre-sales questions. Please get in touch by emailing hello@wp-native-articles.com.</p>
						</div>
					</div>
					<div class="fl w-100 w-50-ns pl0 pl2-ns">
						<div class="">
							<h5 class="lh-title f4"></h5>
							<p class="lh-copy f4-5"></p>
						</div>
					</div>
				</div>
			</div>

		</div>

	</section>


<!--
	<section class="pricing pricing-1">

		<a name="pricing"></a>

		<div class="container">

			<div class="row">
				<div class="col-sm-12 text-center">
					<h3>Simple pricing - No fuss.</h3>
				</div>
			</div>

			<div class="row">

				<a href="<?php home_url(); ?>/checkout?edd_action=add_to_cart&download_id=48&edd_options[price_id]=1">
					<div class="col-sm-4 text-center pricing-option">
						<h6>Single Site</h6>
						<div class="price-container">
							<span class="dollar">$</span>
							<span class="price">49</span>
							<span class="terms">/yr</span>
						</div>

						<ul>
							<li>1 Year of updates and support</li>
							<li>30 Day Money Back</li>
						</ul>

						<?php echo do_shortcode('[purchase_link id="48" text="Purchase" style="button" color="blue" price_id="1"]'); ?>

					</div>
				</a>

				<a href="<?php home_url(); ?>/checkout?edd_action=add_to_cart&download_id=48&edd_options[price_id]=2">
					<div class="col-sm-4 text-center pricing-option active">
						<h6>2 - 5 sites</h6>
						<div class="price-container">
							<span class="dollar">$</span>
							<span class="price">85</span>
							<span class="terms">/yr</span>
						</div>

						<ul>
							<li>1 Year of updates and support</li>
							<li>30 Day Money Back</li>
						</ul>

						<?php echo do_shortcode('[purchase_link id="48" text="Purchase" style="button" color="blue" price_id="2"]'); ?>

					</div>
				</a>

				<a href="<?php home_url(); ?>/checkout?edd_action=add_to_cart&download_id=48&edd_options[price_id]=3">
					<div class="col-sm-4 text-center pricing-option">
						<h6>Unlimited sites</h6>
						<div class="price-container">
							<span class="dollar">$</span>
							<span class="price">129</span>
							<span class="terms">/yr</span>
						</div>

						<ul>
							<li>1 Year of updates and support</li>
							<li>30 Day Money Back</li>
						</ul>

						<?php echo do_shortcode('[purchase_link id="48" text="Purchase" style="button" color="blue" price_id="3"]'); ?>

					</div>
				</a>
			</div>


		</div>
	</section>

-->


<?php get_footer(); ?>
