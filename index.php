<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<!-- <div class="page-intro">
  <div class="inner-wrap">
  <h1 class="page-header">Latest Posts</h1>
  </div>
</div> -->
<section class="site-content" role="main" style="margin-top: 5em;">
    <div class="inner-wrap">
			<div class="site-content-primary blogs rows-of-3"> 
				<?php if ( have_posts() ): ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<article>
							<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
								<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time>
								<figure><?php the_post_thumbnail('medium'); ?></figure>
								<div>
									<h3><?php the_title(); ?></h3>
									<?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>															
								</div>
							</a>
						</article>
					<?php endwhile; ?>

			<?php else: ?>
				<h2>No posts to display</h2>
				<p>No idea what happened.</p>
			<?php endif; ?>
			<?php wp_pagenavi(); ?>
			</div>
	</div>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>