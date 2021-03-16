<?php

	/*
		Template Name: Full Width
	*/
?>
 
    
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
       
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<!--Site Content-->
	<section class="site-content" role="main">
	    <div class="inner-wrap">

	        <article class="site-content-primary-fullwidth"> 
	        	<h1><?php the_title(); ?></h1>
	       		<?php the_content(); ?> 
						<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/flexible-content' ) ); ?>
						<?php if (is_page( '9' )) : ?>
							<!--Sitemap Page-->
						   <ul>
						    <?php
						    // Add pages you'd like to exclude in the exclude here
						    wp_list_pages(
						    array(
						    'exclude' => '',
						    'title_li' => '',
						    )
						    );
						    ?>
						   </ul>
						<?php endif; ?>                    
	        </article>
	        
	
			

		</div>
	</section>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/slidebox' ) ); ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>