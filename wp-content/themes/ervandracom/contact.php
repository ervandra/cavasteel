<?php
/*
Template Name: Contact
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
						<div class="grid-x grid-margin-x">
							<div class="cell small-12 medium-6">
								<div class="contact-form">
									<p>Kamu bisa mengirimkan pesan kepada kami terkait pemesanan dan pertanyaan. Kami akan menghubungi anda kembali secepatnya.</p>
									<?php echo do_shortcode('[contact-form-7 id="55" title="Contact Form"]');?>
								</div>
							</div>
							<div class="cell small-12 medium-6">
								<?php the_content();?>
								<address>
									<p><span class="fa fa-phone"></span>+62812 3456 7890</p>
									<p><span class="fa fa-fax"></span> +6221 6234 5555</p>
									<p><a href="#"><span class="fa fa-envelope"></span>email@pabriktas-jakarta.com</a></p>
								</address>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="contact-map">
		<div class="responsive-embed widescreen">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.9524806037107!2d106.82956831500945!3d-6.137086995556494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5f7baf70581%3A0x70e8d1039f3c55f5!2sYu+Design!5e0!3m2!1sen!2sid!4v1522137575414" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
<?php endwhile;?>
<?php endif; wp_reset_query();?>
</section>
<?php get_footer();?>