<div class="nav-container">

	<nav class="nav-1">
		<div class="navbar">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-8 col-xs-6">
						<a href="<?php echo esc_url( get_home_url() ); ?>">
							<img class="logo" alt="WordPress Instant Articles" src="<?php echo get_template_directory_uri(); ?>/assets/img/wp-native-articles-logo.png">
						</a>
					</div>

					<div class="col-md-8 col-sm-16 col-xs-20 text-right">

						<?php
							wp_nav_menu(
								array(
									'container'      => '',
									'theme_location' => 'header',
									'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'echo'           => true,
									'fallback_cb'    => false
								)
							);
						?>

					</div>

				</div>
			</div>
		</div>
	</nav>

</div>
