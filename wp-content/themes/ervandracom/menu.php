<?php
$_home = esc_url(home_url('/'));
$_dir = get_template_directory_uri();
$_idx = get_the_ID();
$_parents = get_post_ancestors(get_the_ID());
$_parent = ($_parents) ? $_parents[count($_parents)-1]: get_the_ID();
?>
<div class="off-canvas position-right" id="mobile-menu" data-off-canvas>
  <div class="mobile-menu-container">
    <div class="logo-mobile">
      <div data-close class="close-handle">
        <span class="logo-img"><img src="<?php echo $_dir;?>/images/logo.png" alt=""></span>
        <!-- <span class="logo-text"><?php echo get_bloginfo('name');?></span> -->
        <span class="close-btn">&times;</span>
      </div>
    </div>
    <?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container_id'=>'menumob', 'menu_class'=>'') );?>
  </div>
</div>
<div class="off-canvas-content" data-off-canvas-content>
<header id="header">
    <div class="grid-container">
      <div class="grid-x grid-margin-x align-middle">
        <div class="shrink cell">
          <div class="logo">
            <a href="<?php echo $_home;?>">
              <span class="logo-img"><img src="<?php echo $_dir;?>/images/logo.png" alt="<?php echo get_bloginfo('name');?>"></span>
              <!-- <span class="logo-text">
                <span class="logo-title"><?php echo get_bloginfo('name');?></span>
                <span class="logo-subtitle"><?php echo get_bloginfo('description');?></span>
              </span> -->
            </a>
          </div>
        </div>
        <div class="cell auto">
          <?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container_id'=>'mainmenu', 'menu_class'=>'') );?>
          <div id="mobile-menu-button"><button class="button" data-toggle="mobile-menu"><span class="fa fa-bars"></span></button></div>
        </div>
      </div>
    </div>
  </header>