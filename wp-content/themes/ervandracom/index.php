<?php get_header(); ?>
<?php include 'menu.php';?>

<section id="content" class="home">
    <div class="hero">
      <div class="hero-text text-center">
        <div class="grid-container">
          <div class="grid-x grid-margin-x">
            <div class="cell">
              <?php the_field('home_headline', 'option');?>
              <div class="btn-container">
                <a href="<?php echo get_permalink(11);?>" class="button hollow secondary">Hubungi Sekarang</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="scroll-down">
        <a href="#maincontent"><span class="desktop-only">Scroll</span><span class="mobile-only">Swipe</span> Down<br/><span class="arrow-down arrowdown"><span class="fa fa-arrow-down"></span></span></a>
      </div> -->
    </div>

    <div id="maincontent" class="">

      <div class="section text-center section-headline" id="about">
        <div class="grid-container">
          <div class="grid-x grid-margin-x align-center">
            <div class="cell small-12 medium-8">
              <?php the_field('home_tentang_kami', 'option'); ?>
            </div>
          </div>
        </div>
      </div>

      <?php $count = 8;?>
      <?php if(wp_is_mobile()){ $count = 99; }?>

      <?php $argsPortfolio = array('post_type'=>'post', 'posts_per_page'=>$count, 'category__in'=>array('14'));?>
      <?php $queryPortfolio = new WP_Query($argsPortfolio);?>
      <?php if($queryPortfolio->have_posts()) : ?>
      <div class="section text-center" id="our-products">
        <div class="grid-container">
          <div class="grid-x grid-margin-x align-center">
            <div class="cell">
              <h2>Produk dan Servis</h2>
              <div id="container-isotope" class="home-product-list">
              <?php while($queryPortfolio->have_posts()) : $queryPortfolio->the_post();?>
              <div class="item">
                <div class="portfolio-item">
                  <div class="portfolio-img">
                    <?php the_post_thumbnail('medium');?>
                  </div>
                  <div class="portfolio-info">
                    <h3><?php the_title();?></h3>
                  </div>
                  <a href="<?php echo get_permalink(get_the_ID());?>" class="link-block" title="View detail <?php the_title();?>"><span class="fa fa-search-plus"></span></a>
                </div>
              </div>
              <?php endwhile;?>
              </div>
              <!-- <div class="more-products text-center">
                <a class="button small readmore" href="<?php echo get_term_link(14);?>">Lihat semua</a>
              </div> -->
            </div>
          </div>
        </div>
      </div>
      <?php endif;?>
      <?php wp_reset_query();?>

      <div class="section text-center" id="key-feature">
        <div class="grid-container">
          <div class="grid-x grid-margin-x">
            <div class="cell">
              <h2><?php the_field('home_nilai_title', 'option'); ?></h2>
              <?php if( have_rows('home_nilai_content', 'option') ): ?>
              <div class="key-features">
                <?php while ( have_rows('home_nilai_content', 'option') ) : the_row(); ?>
                <div class="feature">
                  <h5><img src="<?php echo the_sub_field('nilai_icon');?>" alt=""></h5>
                  <h4><?php the_sub_field('nilai_title');?></h4>
                  <?php the_sub_field('nilai_teks');?>
                </div>
                <?php the_sub_field('sub_field_name'); ?>
                <?php endwhile; ?>
              </div>
              <?php endif;?>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="section text-center" id="counter">

      </div> -->

      <!-- <?php $product_home = get_field('home_produk_item', 'option')?>
      <?php if($product_home) : ?>
      <div class="section text-center" id="gallery">
        <div class="grid-container">
          <div class="grid-x grid-margin-x">
            <div class="cell">
              <h2><?php the_field('home_produk_title', 'option');?></h2>
              <p><?php the_field('home_produk_teks','option');?></p>
              <div class="product-carousel">
                <?php foreach ($product_home as $product) : ?>
                <div class="carousel">
                  <div class="product-gallery">
                    <img src="<?php echo $product['url']; ?>" alt="<?php echo $product['alt']; ?>" />
                  </div>
                </div>
                <?php endforeach;?>
              </div>

              <a href="<?php echo get_permalink(7);?>" class="button hollow large">Lihat Semua</a>
            </div>
          </div>
        </div>
      </div>
      <?php endif;?> -->

    </div>

  </section>

<?php get_footer(); ?>