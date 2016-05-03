<?php
/**
 * Template Name: Contact
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="contact-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); 

			$image = get_field('picture');
			$content = get_field('content');
			$map = get_field('map');
			$size = 'large';


			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<?php 
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					} 
					?>

				<div class="entry-content">
					<?php echo $content; ?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->
			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


	<div class="map-area">
		<?php echo $map; ?>
	</div>

</div>
<?php
get_footer();
