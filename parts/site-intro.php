<section class="site-intro">
  <div class="si-slider">
    <?php if(have_rows('si_slider')): while ( have_rows('si_slider') ) : the_row();?>
      <div class="si-item">
        <div class="inner-wrap">
          <div class="si-content">
            <?php if( get_sub_field('si_heading')): ?>
              <h2><?php the_sub_field('si_heading'); ?></h2>
            <?php endif; ?>
            <?php if( get_sub_field('si_text')): ?>
              <p><?php the_sub_field('si_text'); ?></p>
            <?php endif; ?>
            <div>
              <a href="<?php if( get_sub_field('si_link')): ?>
                <?php the_sub_field('si_link') ?>
                <?php endif; ?>" class="btn" title="<?php the_sub_field('btn_text'); ?>">
                <?php the_sub_field('btn_text'); ?>
              </a>
            </div>
          </div>
          <div class="si-img">
            <img src="<?php if( get_sub_field('si_img')): ?>
              <?php the_sub_field('si_img'); ?>
            <?php endif; ?>" alt="">
          </div>
        </div>            
      </div>
    <?php endwhile; endif; ?>
  </div> 

  <div class="booking-btn">
    <a href="https://newactiveat.bridgekash.net/wp/?page_id=6216&preview=true" title="Booking a Consultation">Booking a Consultation</a>
  </div> 
</section>