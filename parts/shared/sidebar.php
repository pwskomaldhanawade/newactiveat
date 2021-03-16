<!--Secondary Content-->
<aside class="site-content-secondary">

	<!-- 
	//Page Conditionals 
	<?php if (is_page( '20' ) || '20' == $post->post_parent) : ?> 
	<?php elseif (is_page( 'services' ) || '14' == $post->post_parent) : ?>
	<?php endif; ?>
	-->


	<!-- Aside CTAs -->
	<?php if(get_field('aside_cta') ): ?>
	<div class="cta-aside">
		<?php the_field('aside_cta'); ?>
	</div>                 
	<?php elseif(get_field('global_aside_cta','option') ): ?>
	<div class="cta-aside">
		<?php the_field('global_aside_cta','option'); ?>
	</div>
	<?php endif; ?>


	<!-- Additional Aside Content -->
	<?php if(get_field('additional_aside_content') ): ?>
		<?php the_field('additional_aside_content'); ?>              
	<?php elseif(get_field('global_additional_aside_content','option') ): ?>
		<?php the_field('global_additional_aside_content','option'); ?>
	<?php endif; ?>

</aside>


