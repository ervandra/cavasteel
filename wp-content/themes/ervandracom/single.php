<?php get_header();?>
<?php include 'menu.php';?>

<?php $cat = get_the_category(); ?>
<?php $title = "Portfolio: ";?>
<?php if($cat[0]->term_id==3) :?>
<?php $title = "Testimonial: ";?>
<?php elseif($cat[0]->term_id==240) :?>
<?php $title = "";?>
<?php endif;?>

<section id="content" class="internal <?php echo strtolower($cat[0]->name);?>">
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post();?>
<div class="hero">
	<h1><?php echo the_title('');?></h1>
</div>
<div id="maincontent" class="grid-container">
  <div class="grid-x grid-margin-x">
    <div class="cell">
      <div class="section">
      <div class="grid-x grid-margin-x align-center">
      <div class="cell small-12 medium-8">
        <?php if(has_post_thumbnail()) : ?>
          <div class="post-thumbnail">
            <?php the_post_thumbnail();?>
          </div>
        <?php endif;?>

        <?php if($cat[0]->term_id==3) : ?>
          <blockquote>
            <?php the_content();?>
          </blockquote>
        <?php else : ?>
        <?php the_content();?>
        <?php endif;?>
      </div>

      </div>
      </div>
    </div>
  </div>
</div>
<?php endwhile;?>
<?php endif; wp_reset_query();?>
</section>

<?php get_footer();?>