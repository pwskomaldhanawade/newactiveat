<!-- Site Footer Starts -->
<footer class="site-footer">
	<div class="inner-wrap">
		<div class="sf-logo">
			<h6>
				<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo( 'name' ); ?>">
					<?php $logo = get_field('global_site_logo','option');
						if( !empty($logo) ): ?>
							<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
						<?php endif;?>
				</a>
				<span><?php the_sub_field('global_company_tagline'); ?></span>
			</h6>
		</div>

		<div class="sf-content">
			<div class="sf-form">
				<h5>subscribe</h5>
				<?php echo do_shortcode('[contact-form-7 id="6139" title="Subscription Form" html_class="subscribe-form"]'); ?>
			</div> 

			<div class="sf-blog">
				<h5>latest blog</h5>
				<?php global $query_string; $posts = query_posts('&order=ASC&orderby=menu_order&showposts=2&post_type=post');?>
				<ul class="blogs-list">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<li>
							<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
								<div class="blog-img">
									<?php the_post_thumbnail('medium'); ?>
								</div>
								<div class="blog-content">
									<?php the_title(); ?>
								</div>
							</a>
						</li>
					<?php endwhile; endif; ?>
				</ul>
			</div>
			<div class="sf-ql">
				<h5>quick links</h5>
				<ul>
					<?php if( have_rows('bottom_footer_menu','option') ): while ( have_rows('bottom_footer_menu','option') ) : the_row(); ?>
						<?php $link_url = get_sub_field('fm_add_links','option'); ?>
						<li>
							<a href="<?php echo esc_url($link_url['url']); ?>" title="<?php echo esc_html($link_url['title']); ?>"><?php echo esc_html($link_url['title']); ?></a>
						</li>
					<?php endwhile; endif; ?>
				</ul>
			</div>
		</div>
		<div class="floating-object1">
			<img src="<?php bloginfo('template_url'); ?>/img/Vector Smart Object copy 14.png" alt="">
		</div>
		<div class="floating-object2">
			<img src="<?php bloginfo('template_url'); ?>/img/Vector Smart Object copy 13.png" alt="">
		</div>
		<div class="floating-object3">
			<img src="<?php bloginfo('template_url'); ?>/img/Vector Smart Object copy 12.png" alt="">
		</div>
	</div>
</footer>

<div class="sf-small">
	<div class="inner-wrap">
		<div class="copyr">
			Copyright <?php echo date("Y"); ?> &copy; <?php bloginfo( 'name' ); ?>&period;
			All Rights Reserved &vert; 
			<span>Designed &amp; Developed by 
				<a href="https://bridgekash.com/" title="Bridgekash International Pvt. Ltd." target="_blank">Bridgekash International Pvt. Ltd.</a>
			</span>
		</div>
		<div class="social-wrap">
			<span>follow us&colon;</span>
			<ul class="social-icons">
				<?php if( have_rows('social_profiles','option') ): while ( have_rows('social_profiles','option') ) : the_row(); ?>
					<li>
						<?php $link_url = get_sub_field('sp_social_link','option'); ?>
						<a href="<?php echo esc_url($link_url); ?>" title="<?php the_sub_field('sp_social_title', 'option') ?>" target="_blank" rel="nofollow noreferrer">
							<?php $sp_social_icon = get_sub_field('sp_social_icon','option');
							if( !empty($sp_social_icon) ): ?>
								<img src="<?php echo $sp_social_icon['url']; ?>" alt="<?php echo $sp_social_icon['alt']; ?>">
							<?php endif; ?>
						</a>
					</li>
				<?php endwhile; endif; ?>
			</ul>
		</div>
	</div>
</div>
<!-- Site Footer Ends -->

<div class="scroll-btn">
	<a href="javascript:void(0)" title="Scroll to Top">
		<img src="<?php bloginfo('template_url'); ?>/img/slider-arrow.svg" alt="Up Arrow">
	</a>
</div>