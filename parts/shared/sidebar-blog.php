<!--Secondary Content-->
<aside class="site-content-secondary">
<h4>Recent Posts</h4>
<ul>
<?php wp_get_archives('type=postbypost&limit=5'); ?>
</ul>
<h4><?php _e('Archives:'); ?></h4>
<ul>
<?php wp_get_archives('type=monthly&limit=5'); ?>
</ul>
<h4><?php _e('Categories:'); ?></h4>
<ul>
<?php wp_list_cats(); ?>
</ul>
</aside>