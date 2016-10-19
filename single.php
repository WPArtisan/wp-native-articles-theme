<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<div class="row">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="col-md-8 col-md-offset-2">
				<div class="content">
					<h1><?php the_title(); ?></h1>

					<div class="featured_image">
						<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
							<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
						</a>
					</div>

					<div class="post_meta">
						<time class="date"><?php the_date(); ?></time>
						by
						<?php echo esc_html( get_the_author() ); ?>
					</div>

					<div>
						<?php the_content(); ?>
					</div>
				</div>

				<?php comments_template(); ?>

			</div>

		<?php endwhile; ?>
	</div>
<?php endif; ?>


<?php get_footer(); ?>
