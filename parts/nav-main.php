<nav class="navbar navbar-default">
	<div class="container-fluid">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo esc_url( get_home_url() ); ?>">
				<img class="logo" alt="WordPress Instant Articles" src="<?php echo get_template_directory_uri(); ?>/assets/img/wp-native-articles-logo.png">
			</a>
		</div>

		<div id="navbar" class="navbar-collapse collapse">

			<?php
				wp_nav_menu(
					array(
						'container'      => '',
						'theme_location' => 'header',
						'items_wrap'     => '<ul id="%1$s" class="%2$s navbar-right">%3$s</ul>',
						'echo'           => true,
						'fallback_cb'    => false
					)
				);
			?>

		</div><!--/.nav-collapse -->

	</div><!--/.container-fluid -->
</nav>
