<!--Site Header Wrap Starts-->
<div class="site-header-wrap"> 
  <header class="site-header">
    <div class="inner-wrap">
      <div class="site-utility-nav">
        <span class="sh-icons">
          <a href="#menu" class="sh-ico-menu menu-link" aria-label="Menu Icon"><span>Menu</span></a>
        </span>
      </div>
     <!--  <a href="<?php //bloginfo('url'); ?>" class="logo"><img src="<?php //bloginfo('template_url'); ?>/img/site-logo.png" alt="Site Logo"></a> -->
     
     <h1 class="site-logo">
        <a href="<?php bloginfo('url'); ?>" title="NC Routing">
          <?php $logo = get_field('global_header_logo','option');
          if( !empty($logo) ): ?>
            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
          <?php endif;?>
        </a> 
      </h1> 
    </div>
    <!--inner-wrap END-->
  </header>
    <?php if ( is_front_page() ) : ?>
      <!--Site Intro Starts-->
      <?php Starkers_Utilities::get_template_parts( array( 'parts/site-intro' ) ); ?>   
      <!--Site Intro Ends-->
    <?php else : ?>
      <!--Page Intro Starts-->  
      <?php Starkers_Utilities::get_template_parts( array( 'parts/page-intro' ) ); ?>    
      <!--Page Intro Ends-->
    <?php endif; ?>
</div>
<!--Site Header Wrap Ends-->