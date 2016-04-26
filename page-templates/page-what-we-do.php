<?php
/**
 * Template Name: What We Do
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
			$i=0;
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'service',
				'posts_per_page' => -1,
			));
			if ($wp_query->have_posts()) : ?>
			<div class="arrow-page-wrap">
				<div class="arrow-page">
					<i class="fa fa-play fa-rotate-90 " aria-hidden="true"></i>
				</div><!-- arrow -->
			</div><!-- arrow page wrap -->
			<section class="services">
				

				<div class="wrapper">
				    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 
				    	$i++;
				    	$postTitle = get_the_title();
				    	$image = get_field('featured_photo');
						$size = 'large'; 
						$short_description = get_field('short_description');
						$description = get_field('description');

						if( $i == 3 ) {
							$class = 'last';
							$i=0;
						} else {
							$class = 'first';
						}

				    ?>
				    	<div class="service-post <?php echo $class; ?>">
				    		<?php if( $image ) { ?>
					    		<div class="image">
					    			<?php echo wp_get_attachment_image( $image, $size ); ?>
					    		</div><!-- image -->
					    	<?php } ?>
				    		<h2>
				    			<?php the_title(); ?>
					    		<div class="arrow-title">
									<i class="fa fa-play  " aria-hidden="true"></i>
								</div><!-- arrow -->
				    		</h2>
				    		<div class="excerpt">
				    			<?php echo $short_description; ?>
				    		</div><!-- excerpt -->
				    		<div class="service-link">
				    			<a href="<?php the_permalink(); ?>">View Service</a>
				    		</div>
				    	</div><!-- service -->

					<?php endwhile; ?>
				</div><!-- wrapper -->
			</section>	
		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
