<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
  <!--Main Start-->
  <section class="site-content " role="main">
    <div class="inner-wrap clearfix">
      <?php
        if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb( '<p class="breadcrumb">','</p>' );
        }
      ?>
      <div class="woocommerce-wrap">
        <?php if ( is_product_category() ) {
          $queried_object = get_queried_object(); 
          $taxonomy = $queried_object->taxonomy;
          $term_id = $queried_object->term_id;  
        ?>
          <section class="product-module cat-page-bucket">
            <ul class="accordion-tabs">
              <?php if( have_rows( 'product_tab_module', $taxonomy . '_' . $term_id) ): while ( have_rows('product_tab_module', $taxonomy . '_' . $term_id) ) : the_row(); ?>
                <li class="tab-header-and-content">
                  <a href="javascript:void(0)" class=" tab-link">
                    <span><?php the_sub_field('product_tab_header'); ?></span>
                  </a>
                  <div class="tab-content">
                    <div class="pm-wrap rows-of-4">

                      <?php if( have_rows('product_tab_buckets') ): while ( have_rows('product_tab_buckets') ) : the_row(); ?>
                        <?php 
                          $link_pm = get_sub_field('bucket_link');
                          if( $link_pm ): 
                            $link_url_pm = $link_pm['url'];
                            $link_target = $link_pm['target'] ? $link_pm['target'] : '_self';
                          ?>  
                            <a href="<?php echo esc_attr( $link_url_pm ); ?>"  target="<?php echo esc_attr( $link_target ); ?>"  class="pm-item">
                              <?php  $image2 = get_sub_field('bucket_image');
                              if( !empty( $image2 ) ): ?>
                                <img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" title="<?php echo $image2['alt']; ?>">
                              <?php endif; ?>
                              <h3><?php the_sub_field('bucket_header'); ?></h3>
                              <span class="pm-learn btn">View Product</span>
                            </a>
                        <?php endif; ?> 
                      <?php endwhile; endif; ?>  
                  
                    </div>
                    <div>
                      <a href="<?php the_sub_field('know_more_ct'); ?>" title="Know More" class="btn-alt">know more</a>
                    </div>
                  </div>
                </li>
              <?php endwhile; endif; ?>  
            </ul>
          </section>
        <?php }?>
        <?php woocommerce_content(); ?>  
      </div>
    </div>
  </section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>