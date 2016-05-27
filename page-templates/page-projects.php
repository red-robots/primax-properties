<?php
/**
 * Template Name: Projects
 */

get_header(); ?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<div class="wrapper">
				<section class="what-we-do">
					<?php while ( have_posts() ) : the_post(); ?>

						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->

					<?php endwhile; // End of the loop.?>
				</section>
			</div><!-- wrapper -->

			


			<?php
				$wp_query = new WP_Query();
				$wp_query->query(array(
					'post_type'=>'portfolio',
					'posts_per_page' => -1,
					'order' => 'ASC', 
					'orderby' => 'menu_order',
					'tax_query' => array(
						array(
							'taxonomy' => 'featured_portfolio', // your custom taxonomy
							'field' => 'slug',
							'terms' => array( 'representative' ) // the terms (categories) you created
						)
					)
				));
				if ($wp_query->have_posts()) : ?>
				<section class="page-projects">
			    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 

			    	$postTitle = get_the_title();
			    	$image = get_field('featured_photo');
					$sizeFull = 'full'; 
					$sizeLarge = 'medium'; 
					$title = get_field('alternate_title');
					$location = get_field('location');
					$anchor = sanitize_title_with_dashes($postTitle);
					$sqFootage = get_field('sq_footage');
					$type = get_field('type');
					$description = get_field('description');

			    ?>


			    <div class="page-proj">
			    <a rel="js-proj-group" class="project " href="<?php echo '#' . $anchor ?>">
		        	<div class="info">
		        		

			        		<h2><?php echo $title; ?></h2>
			        		<p><?php echo $location; ?></p>
			        
		        	</div><!-- info -->
		        	
		        	<?php if( $image ) {echo wp_get_attachment_image( $image, $sizeLarge );} ?>
		        	<!-- <div class="view-proj">
		        	View Project
		        	</div> -->
		        	</a>
		        </div><!-- home proj -->

		        <div style="display: none;">
		        	<div id="<?php echo $anchor ?>" class="proj-pop inline" >
		        		
		        		<?php if( $image ) { ?>
		        			<div class="pop-image">
		        				<?php echo wp_get_attachment_image( $image, $sizeFull ); ?>
		        			</div>
		        		<?php } ?>

		        		<div class="pop-info">
			        		<h2><?php echo $title; ?></h2>
			        		<p><?php echo $location; ?></p>
			        		<div class="sqft"><?php echo 'Size: ' . $sqFootage; ?> SF</div>
			        		<div class="type"><?php echo 'Type: ' . $type; ?></div>
			        		<div class="desc"><?php echo $description; ?></div>
		        		</div><!-- pop info -->

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