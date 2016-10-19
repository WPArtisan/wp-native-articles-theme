<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<div class="row">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="col-md-8 col-md-offset-2">
				<div class="content">
					<h1><?php the_title(); ?></h1>

					<div>
						<?php the_content(); ?>
					</div>
				</div>
			</div>

		<?php endwhile; ?>
	</div>
<?php endif; ?>


<?php get_footer(); ?>
