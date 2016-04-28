<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper-default-page">
	<div id="primary" class="content-area  js-blocks">
		<main id="main" class="site-main" role="main">

		<?php get_template_part('template-parts/subnav'); ?>

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<aside id="secondary" class="widget-area js-blocks" role="complementary">
	<?php 

$images = get_field('photos');

if( $images ): ?>
   
            <?php foreach( $images as $image ): ?>
                <div>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                   
                </div
            <?php endforeach; ?>
        
<?php endif; ?>
</aside><!-- #secondary -->


</div>
<?php
get_footer();
