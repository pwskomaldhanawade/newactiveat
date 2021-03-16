<?php
/**
 * The template for displaying Category Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section class="site-content" role="main">
    <div class="inner-wrap">
		<?php if ( have_posts() ): ?>
		<h1>Category Archive: <?php echo single_cat_title( '', false ); ?></h1>
		<?php while ( have_posts() ) : the_post(); ?>

				<article>
					<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<div class="post-meta">Posted by <?php the_author_link(); ?> on <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> | <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?> </div>
					<?php the_content(); ?>
				</article>
		<?php endwhile; ?>

		<?php else: ?>
		<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
		<?php endif; ?>
		<?php wp_pagenavi(); ?>
	</div>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>