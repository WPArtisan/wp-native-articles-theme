<?php get_header(); ?>

<section class="mw7 center">

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="pv4 bt bb b--black-10 ph3 ph0-l">
				<div class="flex flex-column flex-row-ns">
					<div class="w-100 w-60-ns pr3-ns order-2 order-1-ns">
						<h1 class="mt0">
							<a class="f3 black-80 lh-title link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h1>
						<p class="f4 f4-ns lh-copy athelas"><?php the_excerpt(); ?></p>
					</div>
					<div class="pl3-ns order-1 order-2-ns mb4 mb0-ns w-100 w-40-ns">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'db', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
						</a>
					</div>
				</div>
				<p class="f6 lh-copy gray mv0">By <span class="ttu"><?php echo esc_html( get_the_author() ); ?></span></p>
				<time class="f6 db gray"><?php the_date( "d F, Y" ); ?></time>
			</article>

		<?php endwhile; ?>
	<?php endif; ?>

</section>

<?php get_footer(); ?>
