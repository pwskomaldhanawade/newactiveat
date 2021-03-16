<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>
	<div class="summary entry-summary">

		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>

	</div><!-- .summary -->
    </div><!-- .product -->
    </div><!-- #content -->
    </div><!-- .container -->

		<div>			
			<ul class="accordion-tabs">
				<?php if(have_rows('plans_tab')): while ( have_rows('plans_tab') ) : the_row();?>

					<li class="tab-header-and-content">
						<?php if( get_sub_field('tab_title')): ?>
              <a href="javascript:void(0)" class="tab-link"><?php the_sub_field('tab_title'); ?></a>
            <?php endif; ?>	

						<div class="tab-content">
							<?php if( have_rows('tab_content') ): while ( have_rows('tab_content') ) : the_row(); ?>
								<?php if( get_row_layout() == 'multiple_columns' ): ?>
									<section class="multiple-cols-module">
										<div class="inner-wrap">	
											<div class="section-heading">
												<?php if( get_sub_field('section_header')): ?>
													<h3><?php the_sub_field('section_header'); ?></h3>
												<?php endif; ?>
											</div>					
											<?php if( get_sub_field('section_subtext')): ?>
												<h4 class="column-subtext"><?php the_sub_field('section_subtext'); ?></h4>
											<?php endif; ?>
											<section class="<?php if (get_sub_field('number_columns') == '2') {
													echo 'rows-of-2';
												} else if (get_sub_field('number_columns') == '3') {
																echo 'rows-of-3';
												} else if (get_sub_field('number_columns') == '4') {
																echo 'rows-of-4';
												}
												?>">

														<?php if( have_rows('content') ): while ( have_rows('content') ) : the_row(); ?>
													<div><?php the_sub_field('content_column'); ?></div>
												<?php endwhile; ?>
												<?php endif; ?>				
											</section>
										</div>
									</section> 

								<?php elseif( get_row_layout() == 'faq_module' ): ?> 
									<section class="faq-module">
										<div class="inner-wrap">
											<div class="section-heading">
												<?php if( get_sub_field('section_heading')): ?>
													<h3 class="no-style"><?php the_sub_field('section_heading'); ?></h3>
												<?php endif; ?>
											</div> 
											<div class="faq-list">
												<?php if(have_rows('faq_item')): while ( have_rows('faq_item') ) : the_row();?>
													<div class="click-expand">
														<h4 class="ce-header" tabindex="0"><?php the_sub_field('item_heading'); ?></h4>
														<div class="ce-body">
															<p><?php the_sub_field('item_text'); ?></p>
														</div>
													</div>
												<?php endwhile; endif; ?>
											</div>
										</div>
									</section>
								<?php endif; ?>
							<?php endwhile; endif; ?>	
						</div>
					</li>

				<?php endwhile; endif; ?>
			</ul>
		</div>

	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>
	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
