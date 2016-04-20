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

get_header(); ?>

	<div id="primary" class="">
		<main id="main" class="site-main" role="main">

			<header class="home">
				<h2>REPRESENTATIVE PROJECTS</h2>
				<h3>Our focus is on doing what we do exceptionally well.</h3>
			</header>


some projects...



			<header class="home">
				<h2>NATIONAL REACH?  CHECK.</h2>
				<h3>Wherever you go, we go.</h3>
			</header>

			<div class="homemap">
				<img src="<?php bloginfo('template_url'); ?>/images/map.jpg">
			</div>
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
