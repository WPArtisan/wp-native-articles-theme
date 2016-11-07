
		<footer class="footer footer-1">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<p class="sub">
							&copy; Copyright <?php echo date("Y"); ?> <a href="https://wpartisan.me">WPArtisan.me</a> - All Rights Reserved
						</p>
					</div>

					<div class="col-sm-6 text-right">
						<a href="<?php echo esc_url( get_home_url() ); ?>">
							<img class="logo" alt="WordPress Instant Articles" src="<?php echo get_template_directory_uri(); ?>/assets/img/wp-native-articles-logo.png">
						</a>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<?php wp_footer(); ?>

</body>
</html>
