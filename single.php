<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<article>
			<header class="bg-light-blue sans-serif">
				<div class="mw9-l pt4 ph3 ph6-l center">
					<h3 class="f2 f1-m f-headline-l lh-title mv0">
						<span class="bg-black-90 lh-copy white pa1 tracked-tight">
							<?php the_title(); ?>
						</span>
					</h3>

					<time class="f6 mb2 dib ttu tracked"><small><?php the_date( "d F, Y" ); ?></small></time>
					-
					<h5 class="f6 ttu dib tracked black-80"><?php echo esc_html( sprintf( __( 'By %s', 'wp-native-articles-theme' ), get_the_author() ) ); ?></h5>
				</div>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="mt4 mw-100 w-60-l center">
					<?php echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'db', 'style' => 'height: auto;' ) ); ?>
				</div>
			<?php endif; ?>

			<div class="ph3 ph6-l mw9-l center black-80">
				<h4 class="f4 f2-l fw1 georgia i lh-copy"><?php echo esc_html( get_the_excerpt() ); ?></h4>
			</div>

			<div class="ph3 ph3-m w-60-l center black-80 f4-5 lh-copy">
				<?php the_content(); ?>
			</div>
		</article>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
