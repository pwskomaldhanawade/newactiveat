<?php if(get_field('slide_cta') ): ?>
	<p id="last"></p>
	<div id="slidebox"><a href="javascript:void(0)" class="close">&nbsp;</a>
		<?php the_field('slide_cta'); ?>
	</div>
<?php elseif(get_field('global_slide_cta','option') ): ?>
	<p id="last"></p>
	<div id="slidebox"><a href="javascript:void(0)" class="close">&nbsp;</a>
		<?php the_field('global_slide_cta','option'); ?>
	</div>
<?php endif; ?>