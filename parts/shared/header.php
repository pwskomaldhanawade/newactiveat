<!-- Site Header Wrap Starts -->
<div class="site-header-wrap"> 
  <header class="site-header">
    <div class="top-bar">
      <div class="inner-wrap"> 
        <div class="site-nav-container">
          <nav class="site-nav">
            <?php wp_nav_menu(array(
              'menu'            => 'Primary Nav',
              'container'       => 'ul',
              'container_class' => 'site-nav',
              'menu_class'      => 'sn-level-1',
              'walker'        => new themeslug_walker_nav_menu
            )); ?>
          </nav>   
        </div>

        <div class="sh-utility-bar">
          <div class="sh-form">
            <form action="<?php bloginfo('url'); ?>/" method="get" class="search-form">
              <div class="search-input">
                <input type="text" id="search-site" value="" name="s" class="search-text" title="Search Website..." tabindex="-1" aria-label="Search Website..." />
              </div>
              <div class="search-button">
                <button type="button" id="search-submit" class="search-text">
                  <img src="<?php bloginfo('template_url'); ?>/img/search.svg" alt="">
                </button>
              </div>
            </form>                
          </div>
        </div>
      </div>
    </div>  

    <div class="menu-bar">
      <div class="inner-wrap">
        <h1 class="site-logo">
          <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo( 'name' ); ?>">
            <?php $logo = get_field('global_footer_logo','option');
            if( !empty($logo) ): ?>
              <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
            <?php endif;?>
          </a> 
        </h1> 
        <div class="right-menu">
          <ul>
            <li class="meal-plans">
              <a href="https://newactiveat.bridgekash.net/wp/product-category/meal-plan/" title="Meal Plans">
                <div class="menu-img" style="background-image: url(<?php bloginfo('template_url'); ?>/img/meal-plans.svg);"></div>
                <span>meal plans</span>
              </a>
            </li>
            <li class="salad-plans">
              <a href="https://newactiveat.bridgekash.net/wp/product-category/salad-bowl-plan/" title="Salad Plans">
                <div class="menu-img" style="background-image: url(<?php bloginfo('template_url'); ?>/img/salad-plans.svg);"></div>
                <span>salad plans</span>
              </a>
            </li>
            <li class="bakery">
              <a href="https://newactiveat.bridgekash.net/wp/product-category/bakery/" title="Bakery">
                <div class="menu-img" style="background-image: url(<?php bloginfo('template_url'); ?>/img/bakery.svg);"></div>
                <span>bakery</span>
              </a>
            </li>
          </ul>
          <div class="cart-btn">
          <a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><span><?php echo WC()->cart->cart_contents_count; ?></span>
            <img src="<?php bloginfo('template_url'); ?>/img/shopping-cart.svg" alt="<?php _e( 'View your shopping cart' ); ?>">
          </a>
        </div>
        </div>            
      </div>
    </div>
        
    <div class="mobile-menu">
      <div class="inner-wrap">
        <div class="sh-icons">               
          <a href="#menu" class="sh-ico-menu menu-link" aria-label="Menu Icon">
            <img src="<?php bloginfo('template_url'); ?>/img/menu-icon.svg" alt="Menu">
          </a>
        </div>
        <h1 class="site-logo">
          <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo( 'name' ); ?>">
            <?php $logo = get_field('global_header_logo','option');
            if( !empty($logo) ): ?>
              <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
            <?php endif;?>
          </a> 
        </h1> 
        <div class="cart-btn">
          <a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><span><?php echo WC()->cart->cart_contents_count; ?></span>
            <img src="<?php bloginfo('template_url'); ?>/img/shopping-cart.svg" alt="<?php _e( 'View your shopping cart' ); ?>">
          </a>
        </div>
        <div class="site-nav-container">
          <div class="snc-header">
            <a href="javascript:void(0);" class="close-menu menu-link" aria-label="Close Menu"></a>
          </div>
          <nav class="site-nav">
            <?php wp_nav_menu(array(
              'menu'            => 'Mobile Nav',
              'container'       => 'ul',
              'container_class' => 'site-nav',
              'menu_class'      => 'sn-level-1',
              'walker'        => new themeslug_walker_nav_menu
            )); ?>
          </nav>      
        </div>
      </div>      
    </div>
  </header>
</div>
<!--Site Header Wrap Ends-->