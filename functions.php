<?php

function theme_support() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'theme_support' );

function wpna_styles() {
	wp_enqueue_style( 'wpna-icons', get_template_directory_uri() . '/assets/css/icons.min.css', null, '1.0.0', 'all' );
	wp_enqueue_style( 'wpna-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', null, '1.0.0', 'all' );
	// wp_enqueue_style( 'wpna-flexslider', get_template_directory_uri() . '/assets/css/flexslider.min.css', null, '1.0.0', 'all' );
	wp_enqueue_style( 'wpna-fairsky', get_template_directory_uri() . '/assets/css/theme-fairsky.min.css', null, '1.0.0', 'all' );
	wp_enqueue_style( 'wpna-custom', get_template_directory_uri() . '/assets/css/custom.css', null, '1.0.0', 'all' );
	wp_enqueue_style( 'wpna-gfonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic', null, '1.0.1', 'all' );
}
add_action( 'wp_enqueue_scripts', 'wpna_styles' );

add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );
function dequeue_jquery_migrate( &$scripts){
	if(!is_admin()){
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}
}

function wpna_scripts() {
	wp_deregister_script( 'jquery' ); // remove standard jquery
	wp_enqueue_script( 'jquery', get_template_directory_uri() .'/assets/js/jquery.min.js', array(), '1.11.1', true);
	// wp_enqueue_script( 'wpna-tweenmax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js', array(), '1.0.1', true );
	// wp_enqueue_script( 'wpna-ScrollToPlugin', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js', array(), '1.0.1', true );
	wp_enqueue_script( 'wpna-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0.1', true );
	// wp_enqueue_script( 'wpna-placeholders', get_template_directory_uri() . '/assets/js/placeholders.min.js', array(), '1.0.1', true );
	// wp_enqueue_script( 'wpna-parallax', get_template_directory_uri() . '/assets/js/parallax.js', array(), '1.0.1', true );
	// wp_enqueue_script( 'wpna-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '1.0.1', true );
}
add_action( 'wp_enqueue_scripts', 'wpna_scripts' );

function register_menus() {
  register_nav_menu( 'header', __( 'Header Menu' ) );
}
add_action( 'init', 'register_menus' );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
	return sprintf( ' <a class="read-more" href="%1$s">%2$s</a>',
		get_permalink( get_the_ID() ),
			__( 'Read More', 'textdomain' )
		);
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );



// Bootstrap pagination function

function wp_bs_pagination($pages = '', $range = 4)

{

     $showitems = ($range * 2) + 1;



     global $paged;

     if(empty($paged)) $paged = 1;



     if($pages == '')

     {

         global $wp_query;

		 $pages = $wp_query->max_num_pages;

         if(!$pages)

         {

             $pages = 1;

         }

     }



     if(1 != $pages)

     {

        echo '<div class="text-center">';
        echo '<nav><ul class="pagination"><li class="disabled hidden-xs"><span><span aria-hidden="true">Page '.$paged.' of '.$pages.'</span></span></li>';

         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."' aria-label='First'>&laquo;<span class='hidden-xs'> First</span></a></li>";

         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."' aria-label='Previous'>&lsaquo;<span class='hidden-xs'> Previous</span></a></li>";



         for ($i=1; $i <= $pages; $i++)

         {

             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))

             {

                 echo ($paged == $i)? "<li class=\"active\"><span>".$i." <span class=\"sr-only\">(current)</span></span>

    </li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";

             }

         }



         if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\"  aria-label='Next'><span class='hidden-xs'>Next </span>&rsaquo;</a></li>";

         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."' aria-label='Last'><span class='hidden-xs'>Last </span>&raquo;</a></li>";

         echo "</ul></nav>";
         echo "</div>";
     }

}

/**
 * Display template for comments and pingbacks.
 *
 */
if (!function_exists('bootstrapwp_comment')) :
    function bootstrapwp_comment($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' : ?>

                <li class="comment media" id="comment-<?php comment_ID(); ?>">
                    <div class="media-body">
                        <p>
                            <?php _e('Pingback:', 'bootstrapwp'); ?> <?php comment_author_link(); ?>
                        </p>
                    </div><!--/.media-body -->
                <?php
                break;
            default :
                // Proceed with normal comments.
                global $post; ?>

                <li class="comment media" id="li-comment-<?php comment_ID(); ?>">
                        <a href="<?php echo $comment->comment_author_url;?>" class="pull-left">
                            <?php echo get_avatar($comment, 64); ?>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading comment-author vcard">
                                <?php
                                printf('<cite class="fn">%1$s %2$s</cite>',
                                    get_comment_author_link(),
                                    // If current post author is also comment author, make it known visually.
                                    ($comment->user_id === $post->post_author) ? '<span class="label"> ' . __(
                                        'Post author',
                                        'bootstrapwp'
                                    ) . '</span> ' : ''); ?>
                            </h4>

                            <?php if ('0' == $comment->comment_approved) : ?>
                                <p class="comment-awaiting-moderation"><?php _e(
                                    'Your comment is awaiting moderation.',
                                    'bootstrapwp'
                                ); ?></p>
                            <?php endif; ?>

                            <?php comment_text(); ?>
                            <p class="meta">
                                <?php printf('<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                                            esc_url(get_comment_link($comment->comment_ID)),
                                            get_comment_time('c'),
                                            sprintf(
                                                __('%1$s at %2$s', 'bootstrapwp'),
                                                get_comment_date(),
                                                get_comment_time()
                                            )
                                        ); ?>
                            </p>
                            <p class="reply">
                                <?php comment_reply_link( array_merge($args, array(
                                            'reply_text' => __('Reply <span>&darr;</span>', 'bootstrapwp'),
                                            'depth'      => $depth,
                                            'max_depth'  => $args['max_depth']
                                        )
                                    )); ?>
                            </p>
                        </div>
                        <!--/.media-body -->
                <?php
                break;
        endswitch;
    }
endif;
