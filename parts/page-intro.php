<!-- Page Intro Starts -->
<section class="page-intro" style="background-image:url(<?php if( get_field('pi_bg_image')): ?>
	<?php the_field('pi_bg_image') ?>
	<?php endif; ?>);">
	<div class="inner-wrap">
		<div class="pi-content">
			<?php if( get_field('pi_heading')): ?>
				<h2><?php the_field('pi_heading'); ?></h2>
			<?php endif; ?>
			<?php if( get_field('pi_text')): ?>
				<div><?php the_field('pi_text'); ?></div>
			<?php endif; ?>
		</div>		
	</div>
</section>
<!-- Page Intro Ends -->