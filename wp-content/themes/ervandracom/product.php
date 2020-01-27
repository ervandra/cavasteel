<?php
/*
Template Name: Products
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
<?php $argsProduct = array('category__in'=>array(1400)); $queryProduct = new WP_Query($argsProduct);?>
<?php if($queryProduct->have_posts()) :?>
	<div class="section" id="product-container">
		<div class="grid-container">
			<div class="grid-x grid-margin-x">
				<div class="cell">
					<div class="the-product">
						<?php while($queryProduct->have_posts()) : $queryProduct->the_post();?>

							<div class="product">
								<a href="<?php the_permalink();?>" title="<?php the_title();?>">
									<span class="product-image"><?php the_post_thumbnail();?></span>
									<span class="product-info"><?php the_title();?></span>
								</a>
							</div>

							<div class="product">
								<a href="<?php the_permalink();?>" title="<?php the_title();?>">
									<span class="product-image"><?php the_post_thumbnail();?></span>
									<span class="product-info"><?php the_title();?></span>
								</a>
							</div>

							<div class="product">
								<a href="<?php the_permalink();?>" title="<?php the_title();?>">
									<span class="product-image"><?php the_post_thumbnail();?></span>
									<span class="product-info"><?php the_title();?></span>
								</a>
							</div>

							<div class="product">
								<a href="<?php the_permalink();?>" title="<?php the_title();?>">
									<span class="product-image"><?php the_post_thumbnail();?></span>
									<span class="product-info"><?php the_title();?></span>
								</a>
							</div>

							<div class="product">
								<a href="<?php the_permalink();?>" title="<?php the_title();?>">
									<span class="product-image"><?php the_post_thumbnail();?></span>
									<span class="product-info"><?php the_title();?></span>
								</a>
							</div>

						<?php endwhile;?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; wp_reset_query();?>
</section>
<?php get_footer();?>