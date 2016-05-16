<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); 

if( isset($_GET['featured']) ) {
	$isFeat = $_GET['featured'];
} else {
	$isFeat = 'n';
}


if( $isFeat == 'y' ) :



endif; // if is featured



?>
<div class="wrapper">
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

<div class="backtohome">
<a href="<?php bloginfo('url'); ?>">BACK</a>

</div>


		<?php
		while ( have_posts() ) : the_post();

		$image = get_field('featured_photo');
		$size = 'large'; 
		$title = get_field('alternate_title');
		$description = get_field('description');
		$location = get_field('location');
		$sq_footage = get_field('sq_footage');

		?>
		

			<article id="post-<?php the_ID(); ?>" class="single-portfolio" >

				<div class="pic">
					<?php if( $image ) {echo wp_get_attachment_image( $image, $size );} ?>
				</div>

				<div class="info">

					<header class="entry-header">
						<h1 class="entry-title"><?php echo $title; ?></h1>
					</header><!-- .entry-header -->

					<div class="location"><?php echo $location; ?></div>
					<?php if($sq_footage != '') { ?>
						<div class="size">
							Size: <?php echo $sq_footage; ?> SF
						</div>
					<?php } ?>

					<div class="border"></div>

					<div class="entry-content">
						<?php echo $description; ?>
					</div><!-- .entry-content -->

					<div class="seemore">
						<a href="<?php bloginfo('url'); ?>/representative-projects">See more Primax Projects
							<div class="arrow-title">
								<i class="fa fa-play  " aria-hidden="true"></i>
							</div><!-- arrow -->
						</a>
					</div>

				</div><!-- info -->

				

			</article><!-- #post-## -->

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php 
if( get_adjacent_post(true, '', false, 'featured_portfolio') ) { ?>

	<div class="prev-staff">
		<?php next_post_link( '%link', 'PREVIOUS', TRUE, ' ', 'featured_portfolio' ); ?>
	</div>

<?php } else { 
	$args = array(
		'post_type'=>'portfolio',
		'posts_per_page' => 1, 
		'order' => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => 'featured_portfolio', // your custom taxonomy
				'field' => 'slug',
				'terms' => array( 'featured' ) // the terms (categories) you created
			)
		)
	);

    $first = new WP_Query($args); 
    $first->the_post(); ?>

    <div class="prev-staff">
    	<?php echo '<a href="' . get_permalink() . '?featured=y">PREVIOUS</a>'; ?>
    </div>
  	<?php wp_reset_query();
}; 

if( get_adjacent_post(true, '', true, 'featured_portfolio') ) { ?>

	<div class="next-staff">
		<?php previous_post_link( '%link', 'NEXT', TRUE, ' ', 'featured_portfolio' ); ?>
	</div>

<?php } else { 
	$args = array(
		'post_type'=>'portfolio',
		'posts_per_page' => 1, 
		'order' => 'DESC',
		'tax_query' => array(
			array(
				'taxonomy' => 'featured_portfolio', // your custom taxonomy
				'field' => 'slug',
				'terms' => array( 'featured' ) // the terms (categories) you created
			)
		)
	);

    $first = new WP_Query($args); 
    $first->the_post(); ?>

    <div class="next-staff">
		<?php echo '<a href="' . get_permalink() . '?featured=y">NEXT</a>'; ?>
	</div>
  	<?php wp_reset_query();
}; 
 ?>





<?php
//get_sidebar();
get_footer();
