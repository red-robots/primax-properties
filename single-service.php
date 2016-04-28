<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper-default-page">
	<div id="primary" class="content-area  js-blocks">
		<main id="main" class="site-main" role="main">
		<?php 
		$wp_query = new WP_Query();
		$wp_query->query(array(
			'post_type'=>'service',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'menu_order',
			
		));
		if ($wp_query->have_posts()) : 
			echo '<div class="page-subnav">';

		while ($wp_query->have_posts()) :  $wp_query->the_post(); 

			echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
		
		endwhile; 
		echo '</div>';
		endif;

		wp_reset_query();


		$ID = get_the_ID();
		$tax = 'service_category';
		$terms = get_the_terms($post, $tax);
		

		while ( have_posts() ) : the_post();

		$featured_photo = get_field('featured_photo');
		$short_description = get_field('short_description');
		$description = get_field('description');
		$gallery = get_field('gallery');

		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php echo $description; ?>
			</div><!-- .entry-content -->

		</article><!-- #post-## -->

		<?php endwhile; // End of the loop.?>

		
		
<?php 
// Only show the staff query if we're viewing Development
if( $ID == 140 ) :
 ?>


		<?php
		$wp_query = new WP_Query();
		$wp_query->query(array(
			'post_type'=>'staff',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'menu_order',
			'tax_query' => array(
				array(
					'taxonomy' => $tax, 
					'field' => 'slug',
					'terms' => array( $terms[0]->slug ) 
				)
			)
		));
		if ($wp_query->have_posts()) : ?>
	<section class="contacts">
	<h2>Contact a member of our development team.</h2>
	    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 

		    $postTitle = get_the_title();
			$real_name = get_field('real_name');
			$size = 'thumbnail'; 
			$position = get_field('title__position');
			$photo = get_field('photo');
			$office_phone = get_field('office_phone');
			$cell_phone = get_field('cell_phone');
			$email = get_field('email');
			$vcard = get_field('vcard');
			$description_bio = get_field('description_bio');
	    ?>

	    	<div class="quick-contact">
	    		<?php if( $photo ) { ?>
		    		<div class="photo">
		    			<?php echo wp_get_attachment_image( $photo, $size ); ?>
		    		</div><!-- photo -->
	    		<?php } ?>
	    		<div class="qc-info">
	    			<h3><?php echo $postTitle; ?></h3>
	    			<?php if( $position != '' ) { ?>
	    				<div class="position"><?php echo $position; ?></div>
	    			<?php } ?>
	    			<div class="full-bio">
	    				FULL BIO
	    				<div class="arrow-title">
							<i class="fa fa-play  " aria-hidden="true"></i>
						</div><!-- arrow -->
	    			</div><!-- full bio -->
	    		</div><!-- qc info -->
	    		<div class="info-right">
	    			<?php if( $office_phone != '' ) { ?>
						<div class="detail"><?php echo $office_phone; ?></div>
					<?php } ?>
					<?php if( $email != '' ) { ?>
						<div class="detail">
							<a href="mailto:<?php echo antispambot($email); ?>">
							  <?php echo antispambot($email); ?>
							</a>
						</div>
					<?php } ?>
					<?php if( $vcard != '' ) { ?>
						<div class="vcard">
							<a href="<?php echo $vcard; ?>">Contact Info</a>
						</div>
					<?php } ?>
	    		</div><!-- info right -->
	    		<div class="staff-link">
	    			<a href="<?php the_permalink(); ?>">View Person</a>
	    		</div>
	    	</div><!-- quick contact -->

	    <?php endwhile; ?>
	    </section>
	<?php endif; 


	endif; // end if Develpment
	?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<aside id="secondary" class="widget-area js-blocks" role="complementary">
	<section class="rep-proj">

	<?php

$projects = get_field('representative_projects', 'option');
if($projects) :
	shuffle( $projects );
        $i = 0;
 
	foreach($projects as $post) {

		setup_postdata($post); 
			       
        $image = get_field('featured_photo');
		$size = 'large'; 
		$title = get_field('alternate_title');
		$description = get_field('description');
		$location = get_field('location');
		//$image = wp_get_attachment_image_src( $projects['image'], 'full');
		
		?>
		<div class="feat-project">
		<h3>REPRESENTATIVE PROJECT</h3>

		<div class="pic">
			<?php if( $image ) {echo wp_get_attachment_image( $image, $size );} ?>
		</div>
		
		<h2><?php echo $title; ?></h2>
		<div class="location"><?php echo $location; ?></div>
		
		<div class="description">
			<?php echo $description; ?>
		</div>

		<div class="arrow-link">
			<i class="fa fa-play  " aria-hidden="true"></i>
		</div><!-- arrow -->

		<div class="proj-link">
			<a href="<?php the_permalink(); ?>">See Project</a>
		</div>

		</div><!-- project -->
		<?php
                  if (++$i == 1) break;
         }
 
	
endif;
?>
</section>
</aside><!-- #secondary -->
</div>
<?php

get_footer();
