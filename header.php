<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
// jquery flag
if( is_front_page() ) { ?>
<style type="text/css">
.main-navigation li.homebutton {
	display: none;
}
</style>
<?php } 

?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<?php 
		if( is_front_page() ) { 
			$headerClass = 'masthead-home';
		} else {
			$headerClass = 'masthead';
		}
	?>

	<header id="<?php echo $headerClass; ?>" class="site-header" role="banner">
		<div class="wrapper">
			
			<?php if(is_home()) { ?>
	            <h1 class="logo">
	            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	            </h1>
	        <?php } else { ?>
	            <div class="logo">
	            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	            </div>
	        <?php } ?>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'acstarter' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->

			<?php if( is_front_page() ) {

					// Pull the Homepage
					$post = get_post(119); 
					setup_postdata( $post );
					 
						$heroLineOne = get_field('hero_line_1');
						$heroLineTwo = get_field('hero_line_2');

					
				?>

				<header class="hero">

				<div class="big-logo">Primax Properties</div>

					<h2 class="  wow zoomIn" data-wow-duration=".5s"><?php echo $heroLineOne; ?></h2>
					<?php if(have_rows('hero_line_2')) : ?>
						<div class="flexslider">
							<ul class="slides">
								<?php while(have_rows('hero_line_2')) : the_row(); ?>
									<li>
										<p><?php the_sub_field('hero_line_2'); ?></p>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
					<?php endif; ?>
				</header>

			<?php 
			wp_reset_postdata();
			} ?>

	</div><!-- wrapper -->

<?php if( is_front_page() ) {  ?>
	<div class="arrow">
		<i class="fa fa-play fa-rotate-90 " aria-hidden="true"></i>
	</div>
<?php } ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
