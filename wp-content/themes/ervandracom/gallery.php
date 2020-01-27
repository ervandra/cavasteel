<?php
/*
Template Name: Gallery
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
						<?php the_content();?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile;?>
<?php endif; wp_reset_query();?>
</section>
<?php get_footer();?>