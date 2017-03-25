<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<article class="pa4 ph7-l mw9-l center">
			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>
		</article>

	<?php endwhile; ?>

<?php endif; ?>


<?php get_footer(); ?>
