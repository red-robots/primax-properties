<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 


// Pull the Homepage
$post = get_post(119); 
setup_postdata( $post );
 
	$projectLineOne = get_field('project_section_line_1');
	$projectLineTwo = get_field('project_section_line_2');
	$marketLineOne = get_field('market_section_line_1');
	$marketLineTwo = get_field('market_section_line_2');

	$lineone = get_field('map_info_box');
	$linetwo = get_field('map_info_box_line_2');
	$theLink = get_field('the_link');
 
wp_reset_postdata();

?>

	<div id="primary" class="">
		<main id="main" class="site-main" role="main">

			<header class="home">
				<h2><?php echo $projectLineOne; ?></h2>
				<h3><?php echo $projectLineTwo; ?></h3>
			</header>


			
			<?php 
			// Pull Featured Projects, an ACF relationship field, from theme options
			$projects = get_field('representative_projects', 'option');
			
			if( $projects ): ?>
			   <section class="home-projects">
			    <?php foreach( $projects as $post):  // variable must be called $post (IMPORTANT) 
			        
			        setup_postdata($post); 
			       
			        $image = get_field('featured_photo');
					$size = 'large'; 
					$title = get_field('alternate_title');
					$location = get_field('location');
					
			        ?>
			        
			        <div class="home-proj">
			        	<div class="info">
			        	<a href="<?php the_permalink(); ?>">
			        		<h2><?php echo $title; ?></h2>
			        		<p><?php echo $location; ?></p>
			        		</a>
			        	</div><!-- info -->
			        	
			        	<?php if( $image ) {echo wp_get_attachment_image( $image, $size );} ?>
			        	<div class="view-proj js-hover view-proj-off "><a href="<?php the_permalink(); ?>?featured=y">View Project</a></div>
			        </div><!-- home proj -->

			    <?php endforeach; ?>
			    
			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			    </section>
			<?php endif; ?> 
				
			



			<header class="home">
				<h2><?php echo $marketLineOne; ?></h2>
				<h3><?php echo $marketLineTwo; ?></h3>
			</header>

			<div class="homemap">
				<a href="<?php echo $theLink; ?>">
					<img src="<?php bloginfo('template_url'); ?>/images/map.jpg">
				</a>

				<div class="infolink">
					<div class="view"><?php echo $lineone; ?></div>
					<div class="link"><?php echo $linetwo; ?></div>
					<div class="thelink">
						<a href="<?php echo $theLink; ?>"></a>
					</div>
				</div

			</div>
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
