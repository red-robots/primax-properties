<?php
/**
 * Template Name: Staff
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

		
		<div class="wrapper-no-pad">
			<div class="center">
				<ul class='tabs'>
					<li><a href='#leadership'>Leadership<span class="border">|</span></a></li>
					<li><a href='#development'>Development<span class="border">|</span></a></li>
					<li><a href='#property-management'>Property Management &amp; Leasing<span class="border">|</span></a></li>
					<li><a href='#construction'>Construction<span class="border">|</span></a></li>
					<li><a href='#support'>Support<span class="border">|</span></a></li>
					<li><a href='#all'>All</a></li>
				</ul>
			</div>
		</div><!-- wrapper -->

		<section class="staff">
			<div class="wrapper">

				
				<!--

						Leadership

				######################################################## -->
				
				<div id='leadership'>
					<?php
					$wp_query = new WP_Query();
					$wp_query->query(array(
						'post_type'=>'staff',
						'posts_per_page' => -1,
						'order' => 'ASC',
						'orderby' => 'menu_order',
						'tax_query' => array(
							array(
								'taxonomy' => 'service_category', // your custom taxonomy
								'field' => 'slug',
								'terms' => array( 'leadership' ) // the terms (categories) you created
							)
						)
					));
					if ($wp_query->have_posts()) : ?>
					<section class="page-projects">
				    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 

				    	get_template_part('template-parts/staff');

				     endwhile; endif; 

				     wp_reset_query();
				     ?>
				
				</div><!-- tab -->
				<!--

						Development

				######################################################## -->
				
				<div id='development'>
					<?php
					$wp_query = new WP_Query();
					$wp_query->query(array(
						'post_type'=>'staff',
						'posts_per_page' => -1,
						'order' => 'ASC',
						'orderby' => 'menu_order',
						'tax_query' => array(
							array(
								'taxonomy' => 'service_category', // your custom taxonomy
								'field' => 'slug',
								'terms' => array( 'development' ) // the terms (categories) you created
							)
						)
					));
					if ($wp_query->have_posts()) : ?>
					<section class="page-projects">
				    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 

				    	get_template_part('template-parts/staff');

				     endwhile; endif; 

				     wp_reset_query();
				     ?>
				
				</div><!-- tab -->
				<!--

						Property Management

				######################################################## -->
				
				<div id='property-management'>
					<?php
					$wp_query = new WP_Query();
					$wp_query->query(array(
						'post_type'=>'staff',
						'posts_per_page' => -1,
						'order' => 'ASC',
						'orderby' => 'menu_order',
						'tax_query' => array(
							array(
								'taxonomy' => 'service_category', // your custom taxonomy
								'field' => 'slug',
								'terms' => array( 'property-management' ) // the terms (categories) you created
							)
						)
					));
					if ($wp_query->have_posts()) : ?>
					<section class="page-projects">
				    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 

				    	get_template_part('template-parts/staff');

				     endwhile; endif; 

				     wp_reset_query();
				     ?>
				
				</div><!-- tab -->
				<!--

						Construction

				######################################################## -->
				<div id='construction'>
					<?php
					$wp_query = new WP_Query();
					$wp_query->query(array(
						'post_type'=>'staff',
						'posts_per_page' => -1,
						'order' => 'ASC',
						'orderby' => 'menu_order',
						'tax_query' => array(
							array(
								'taxonomy' => 'service_category', // your custom taxonomy
								'field' => 'slug',
								'terms' => array( 'construction' ) // the terms (categories) you created
							)
						)
					));
					if ($wp_query->have_posts()) : ?>
					<section class="page-projects">
				    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 

				    	get_template_part('template-parts/staff');

				    endwhile; endif; 

				     wp_reset_query();
				     ?>
				
				</div><!-- tab -->
				<!--

						Support

				######################################################## -->
				<div id='support'>
					<?php
					$wp_query = new WP_Query();
					$wp_query->query(array(
						'post_type'=>'staff',
						'posts_per_page' => -1,
						'order' => 'ASC',
						'orderby' => 'menu_order',
						'tax_query' => array(
							array(
								'taxonomy' => 'service_category', // your custom taxonomy
								'field' => 'slug',
								'terms' => array( 'support' ) // the terms (categories) you created
							)
						)
					));
					if ($wp_query->have_posts()) : ?>
					<section class="page-projects">
				    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 

				    	get_template_part('template-parts/staff');

				     endwhile; endif; 

				     wp_reset_query();
				     ?>
				
				</div><!-- tab -->
				<!--

						All

				######################################################## -->
				<div id='all'>
					<?php
					$wp_query = new WP_Query();
					$wp_query->query(array(
						'post_type'=>'staff',
						'posts_per_page' => -1,
						'order' => 'ASC',
						'orderby' => 'menu_order',
						
					));
					if ($wp_query->have_posts()) : ?>
					<section class="page-projects">
				    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 

				    	get_template_part('template-parts/staff');

				     endwhile; endif; 

				     wp_reset_query();
				     ?>
				
				</div><!-- tab -->
			</div><!-- wrapper -->
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
