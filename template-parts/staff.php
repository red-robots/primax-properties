<?php 


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



	<?php if( $photo ) { ?>
		<div class="pic"><?php echo wp_get_attachment_image( $photo, $size ); ?></div>
	<?php } ?>
	
	<div class="info">
		<div class="quick-bio">
			<h2><?php echo $postTitle; ?></h2>
			<?php if( $position != '' ) { ?>
				<div class="detail"><?php echo $position; ?></div>
			<?php } ?>
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
			<div class="position"></div>
		</div><!-- quick bio -->
		<div class="full-bio">
			Full Bio
			<div class="arrow-title">
				<i class="fa fa-play  " aria-hidden="true"></i>
			</div><!-- arrow -->
		</div><!-- full bio -->
	</div><!-- info -->
	<div class="staff-link">
		<a href="<?php the_permalink(); ?>">Read Full Bio</a>
	</div><!-- staff link -->
