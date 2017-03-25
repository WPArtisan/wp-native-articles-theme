<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<article>
			<header class="bg-gold sans-serif" style="background:url(<?php echo get_the_post_thumbnail_url() ;?>) no-repeat center;" >
				<div class="mw9 center pa4 pt5-ns ph7-l">
					<time class="f6 mb2 dib ttu tracked"><small><?php the_date( "d F, Y" ); ?></small></time>
					<h3 class="f2 f1-m f-headline-l measure-narrow lh-title mv0">
						<span class="bg-black-90 lh-copy white pa1 tracked-tight">
							<?php the_title(); ?>
						</span>
					</h3>
					<h4 class="f3 fw1 georgia i lh-copy"><?php echo esc_html( get_the_excerpt() ); ?></h4>
					<h5 class="f6 ttu tracked black-80"><?php echo esc_html( sprintf( __( 'By %s', 'wp-native-articles-theme' ), get_the_author() ) ); ?></h5>
				</div>
			</header>
			<div class="pa4 ph7-l mw9-l center black-80 f4-5">
				<?php the_content(); ?>
			</div>
		</article>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
