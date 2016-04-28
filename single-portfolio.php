<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

		$image = get_field('featured_photo');
		$size = 'large'; 
		$title = get_field('alternate_title');
		$description = get_field('description');
		$location = get_field('location');

		?>
		

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">
					<h1 class="entry-title"><?php echo $title; ?></h1>
				</header><!-- .entry-header -->

				<div class="pic">
					<?php if( $image ) {echo wp_get_attachment_image( $image, $size );} ?>
				</div>

				<div class="location"><?php echo $location; ?></div>
		

				<div class="entry-content">
					<?php echo $description; ?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
//get_sidebar();
get_footer();
