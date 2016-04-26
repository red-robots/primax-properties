<?php
/**
 * Template Name: Projects
 */

get_header(); ?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<?php 
			// Pull Featured Projects, an ACF relationship field, from theme options
			$projects = get_field('representative_projects', 'option');
			
			if( $projects ):

				// Set up an array to put our featured in so we can query everything but them
				$ids = array();

				foreach( $projects as $post):  // variable must be called $post (IMPORTANT) 
				        
				    setup_postdata($post); 
				    // get the post ID
				    $id = get_the_ID();

				    // Put it in our array
				    $ids[] = $id;

				endforeach;
			// reset the $post object so the rest of the page works correctly
			wp_reset_postdata(); 

			endif;
			 ?>


			<?php
				$wp_query = new WP_Query();
				$wp_query->query(array(
					'post_type'=>'portfolio',
					'posts_per_page' => -1,
					'post__not_in' => $ids
				));
				if ($wp_query->have_posts()) : ?>
				<section class="page-projects">
			    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 

			    	$postTitle = get_the_title();
			    	$image = get_field('featured_photo');
					$size = 'large'; 
					$title = get_field('alternate_title');
					$location = get_field('location');
					$anchor = sanitize_title_with_dashes($postTitle);
					$sqFootage = get_field('sq_footage');
					$type = get_field('type');
					$description = get_field('description');

			    ?>


			    <div class="page-proj">
		        	<div class="info">
		        		<h2><?php echo $title; ?></h2>
		        		<p><?php echo $location; ?></p>
		        	</div><!-- info -->
		        	
		        	<?php if( $image ) {echo wp_get_attachment_image( $image, $size );} ?>
		        	<div class="view-proj"><a class="project" href="<?php echo '#' . $anchor ?>">View Project</a></div>
		        </div><!-- home proj -->

		        <div style="display: none;">
		        	<div id="<?php echo $anchor ?>" class="proj-pop">
		        		<?php if( $image ) {echo wp_get_attachment_image( $image, $size );} ?>
		        		<h2><?php echo $title; ?></h2>
		        		<p><?php echo $location; ?></p>
		        		<div class="sqft"><?php echo 'Sq Footage: ' . $location; ?></div>
		        		<div class="type"><?php echo 'Type: ' . $type; ?></div>
		        		<div class="desc"><?php echo $description; ?></div>
		        	</div><!-- proj-pop -->
		        </div><!-- display none -->


			    <?php endwhile; ?>
			    </section>
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// testing 
// echo '<pre>';
// print_r($ids);
// echo '</pre>';
get_footer();