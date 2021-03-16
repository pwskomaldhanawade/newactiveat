<?php
  get_header();
?>
     <div class="page-intro" <?php if(is_home()):?> style="background-image: url(<?php the_field('pi_bg_image', 7); ?>);" <?php else: ?> style="background-image: url(<?php if(get_field('pi_bg_image')) { the_field('pi_bg_image'); } else { bloginfo('template_url'); ?>/img/dest-hero.jpg <?php  } ?>);" <?php endif; ?>>
  <div class="inner-wrap">
 <?php if(get_field('pi_heading')):?>
  <h1 class="pi-header"><?php the_field('pi_heading');?></h1>
  <?php elseif(is_archive()):?>
  <?php echo woocommerce_template_single_title(); ?>
<?php else: ?>
 <h1 class="pi-header"><?php the_title(); ?></h1>
<?php endif;?>
  </div>
</div>
  
  <!--Main Start-->
  <main>
<div class="inner-wrap">
<div class="woocommerce-wrap">
<?php woocommerce_content(); ?>
	
</div>
</div>

<?php get_footer(); ?>