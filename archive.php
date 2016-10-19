<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<div class="row">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="col-md-8 col-md-offset-2">
				<div class="content">
					<h1>
						<a title="<?php esc_attr( get_the_title() ); ?>" href="<?php echo esc_url( get_the_permalink() ); ?>">
							<?php the_title(); ?>
						</a>
					</h1>

					<div class="featured_image">
						<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
							<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
						</a>
					</div>

					<time class="date"><?php the_date(); ?></time>

					<div>
						<?php the_excerpt(); ?>
					</div>
				</div>
			</div>

		<?php endwhile; ?>
	</div>
<?php endif; ?>

<?php wp_bs_pagination(); ?>


<?php get_footer(); ?>
