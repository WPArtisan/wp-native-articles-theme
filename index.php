<?php get_header(); ?>

<section class="mw7 center">

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="pv4 bt bb b--black-10 ph3 ph0-l">
				<div class="flex flex-column flex-row-ns">
					<div class="w-100 pr3-ns order-2 order-1-ns<?php echo has_post_thumbnail() ? ' w-60-ns' : '' ;?>">
						<h1 class="mt0">
							<a class="f3 black-80 lh-title link no-underline underline-hover" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h1>
						<p class="f4-5 lh-copy"><?php echo get_the_excerpt(); ?></p>
					</div>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="pl3-ns order-1 order-2-ns mb4 mb0-ns w-100 w-40-ns">
							<a href="<?php the_permalink(); ?>">
								<img class="db" src="<?php echo get_the_post_thumbnail_url(); ?>" />
							</a>
						</div>
					<?php endif; ?>
				</div>
				<p class="f6 lh-copy gray mv0">By <span class="ttu"><?php echo esc_html( get_the_author() ); ?></span></p>
				<time class="f6 db gray"><?php the_date( "d F, Y" ); ?></time>
			</article>

		<?php endwhile; ?>
	<?php endif; ?>

</section>

<?php get_footer(); ?>
