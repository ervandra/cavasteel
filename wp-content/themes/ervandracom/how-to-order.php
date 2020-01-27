<?php
/*
Template Name: Cara Pemesanan
*/
?>

<?php get_header();?>
<?php include 'menu.php';?>
<section id="content" class="internal">
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post();?>
	<div class="hero">
		<h1><?php echo the_title('');?></h1>
  </div>
	<div id="maincontent" class="grid-container">
		<div class="grid-x grid-margin-x">
			<div class="cell">
				<div class="section">
					<div class="section-content">

						<!-- <h3><?php the_field('contact_title', 'option');?></h3> -->
						<div class="grid-x grid-margin-x">
							<div class="cell small-12 medium-6">
								<div class="contact-form">
									<?php the_field('contact_description', 'option');?>
									<?php echo do_shortcode('[contact-form-7 id="55" title="Contact Form"]');?>
								</div>
							</div>
							<div class="cell small-12 medium-6">
								<?php the_field('contact_address', 'option');?>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="contact-map">
		<div class="responsive-embed widescreen">
			<?php the_field('contact_google_map', 'option');?>
		</div>
	</div> -->
<?php endwhile;?>
<?php endif; wp_reset_query();?>
</section>
<?php get_footer();?>