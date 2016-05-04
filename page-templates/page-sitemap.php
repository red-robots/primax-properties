<?php
/**
 * Template Name: Sitemap
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="content-area-full  js-blocks">
		<main id="main" class="site-main" role="main">


			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				wp_nav_menu( array( 'theme_location' => 'sitemap' ) );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->




</div>
<?php
get_footer();
