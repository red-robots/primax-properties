<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>



<div class="wrapper">
<div class="page-subnav">
<?php 
	
	    // This is not a subpage
	    $ID = get_the_ID();
	    $arg = array(
			'child_of' => 156,
			'title_li' => ''
		);
	    //echo '<h3>' . get_the_title($ID) . '</h3>';
	    wp_list_pages($arg);

	
	 ?>
	</div>
<heading class="staff">Our Professionals</heading>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

		$postTitle = get_the_title();
		$real_name = get_field('real_name');
		$size = 'large'; 
		$position = get_field('title__position');
		$photo = get_field('photo');
		$office_phone = get_field('office_phone');
		$cell_phone = get_field('cell_phone');
		$email = get_field('email');
		$vcard = get_field('vcard');
		$description_bio = get_field('description_bio');
			

		
		?>

			<div class="single-staff-photo">
				<?php if( $photo ) {echo wp_get_attachment_image( $photo, $size );} ?>
			</div>

			<div class="single-staff-info">
				<h1  class="entry-title-staff"><?php the_title(); ?></h1>
				<?php if( $position != '' ) { ?>
					<div class="detail"><?php echo $position; ?></div>
				<?php } ?>
				<?php if( $office_phone != '' ) { ?>
					<div class="detail">Office: <?php echo $office_phone; ?></div>
				<?php } ?>
				<?php if( $cell_phone != '' ) { ?>
					<div class="detail">Cell: <?php echo $cell_phone; ?></div>
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
						<a href="<?php echo $vcard; ?>">Download Vcard</a>
					</div>
				<?php } ?>



				<div class="staff-border"></div>

				<div class="single-staff-bio">
					<?php echo $description_bio; ?>
				</div><!-- bio -->

				<?php if(have_rows('education')) : ?>
					<section class="education">
					<h2>Education</h2>
					<?php while(have_rows('education')) : the_row(); 

						$edu= get_sub_field('education_item');
					?>

					<li class="edu"><?php echo $edu; ?></li>

					<?php endwhile; ?>
					</section>
				<?php endif; ?>


				<?php if(have_rows('professional_accreditation')) : ?>
					<section class="education">
					<h2>Professional Accredidations</h2>
					<?php while(have_rows('professional_accreditation')) : the_row(); 

						$accred= get_sub_field('accreditation_item');
					?>

					<li class="edu"><?php echo $accred; ?></li>

					<?php endwhile; ?>
					</section>
				<?php endif; ?>


			</div><!-- single staff info -->

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<div class="next-staff">
	<?php next_post_link( '%link', 'NEXT' ); ?>
</div>
<div class="prev-staff">
	<?php previous_post_link( '%link', 'BACK' ); ?>
</div>

<?php
get_footer();
