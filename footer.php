<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */
$address = get_field('address', 'option');
$phone = get_field('phone', 'option');
$fax = get_field('fax', 'option');
$linkedin = get_field('linkedin_link', 'option');
$sitemapLink = get_field('sitemap_link', 'option');
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<div class="site-info">

				<?php 
					echo $address;
					echo '<br>';
					echo 'Phone: ' . $phone . ' • ' . 'Fax: ' . $fax;


				 ?>

				<div class="linkedin">
				 	<i class="fa fa-linkedin fa-2x" aria-hidden="true"><a href="<?php echo $linkedin; ?>">linkedin</a></i>
				</div>

				<div class="copywrite">&copyCopyright <?php echo date('Y'); ?>- Primax Properties, LLC. - All Rights Reserved</div>
				<div class="creds">
				<a href="<?php echo $sitemapLink; ?>">sitemap</a>
				 | site by <a target="_blank" href="http://bellaworksweb.com/?ref=primax">bellaworks</a>
				</div>

			</div><!-- .site-info -->

			
	
	</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<?php the_field('google_analytics', 'option'); ?>


</body>
</html>
