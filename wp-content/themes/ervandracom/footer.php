<?php wp_footer(); ?>
<section id="contact-footer">
  <div class="section dark-section" id="hubungi-home">
    <div class="grid-container">
      <div class="grid-x grid-margin-x align-middle align-center">
        <div class="small-12 medium-5 cell ">
          <?php the_field('footer_form', 'option');?>
          <?php $wa = get_field('whatsapp_fix', 'option'); $ph = get_field('phone_fix', 'option');?>
          <?php if($wa!=='' || $ph!=='') : ?>
          <div class="flex-container footer-contact-container">
            <?php if($wa!=''):?>
            <?php $wa_tampil = get_field('whatsapp_tampil', 'option')!='' ? get_field('whatsapp_tampil', 'option') : $wa;?>
            <div class="footer-contact"><a href="tel:<?php echo $wa;?>"><span class="fa fa-whatsapp"></span><?php echo $wa_tampil;?></a></div>
            <?php endif;?>
            <?php if($ph!=''):?>
            <?php $ph_tampil = get_field('phone_tampil', 'option')!='' ? get_field('phone_tampil', 'option') : $ph;?>
            <div class="footer-contact"><a href="tel:<?php echo $ph;?>"><span class="fa fa-whatsapp"></span><?php echo $ph_tampil;?></a></div>
            <?php endif;?>
          </div>
          <?php endif;?>
        </div>
        <div class="cell small-12 medium-5">
          <div class="hubungi-form">
          <?php echo do_shortcode('[contact-form-7 id="46" title="Contact Form Footer"]');?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<footer id="footer">
    <div class="section">
      <div class="grid-container">
        <div class="grid-x grid-margin-x">
          <div class="small-12 medium-8 cell">
            <div class="footer-item">
              <h3><img src="<?php echo get_template_directory_uri();?>/images/logo.png" width="120" style="filter:grayscale(1);" alt=""></h3>
              <p><?php the_field('footer_about', 'option');?></p>
            </div>
          </div>
          <?php if( have_rows('social_media', 'option') ): ?>
          <div class="small-12 medium-4 cell">
            <div class="footer-item">
              <h3>Ikuti kami</h3>
              <ul class="footer-social">
                <?php while(have_rows('social_media', 'option')) : the_row(); ?>
                <li class="<?php the_sub_field('sosmed-type');?>"><a href="<?php the_sub_field('sosmed_link');?>"><span class="fa fa-<?php the_sub_field('sosmed_type');?>"></span></a></li>
                <?php endwhile;?>
              </ul>
            </div>
          </div>
          <?php endif;?>
        </div>
        <div class="grid-x grid-margin-x">
          <div class="cell"><div class="copyright">&copy;<?php echo date('Y')?>. <?php echo get_bloginfo('name')?>. All Rights Reserved.</div></div>
        </div>
      </div>
    </div>
  </footer>

</div>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WK5B934');</script>
<!-- End Google Tag Manager -->
</body>
</html>