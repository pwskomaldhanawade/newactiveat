
          <section class="dark-module">
            <div class="inner-wrap">
            <h1 class="section-header">Social</h1>
            <section class="col-7">
                <h2><a href="">Blog</a></h2>


<?php global $query_string; $posts = query_posts('&order=ASC&orderby=menu_order&showposts=20&post_type=post');?>
   

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <hr>
<article class="row">
            <figure class="col-3"><a href="<?php esc_url( the_permalink() ); ?>"><?php the_post_thumbnail('medium'); ?></a></figure>
            <div class="col-9">
            <h3><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
            <div class="post-meta">Posted by <?php the_author_link(); ?> on <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time>  </div>

           </div>
        </article>




<?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_query(); ?>








            </section>
            <section class="col-4-shift-1 last">
                <h2><a href="">Twitter</a></h2>



<div id="rssincl-box-container-833641">

<div id="rssincl-box-833641">
<div class="rssincl-content">
<a href="https://twitter.com/ThomasNetRPM/status/473442794304847873" target="_blank">
<div class="rssincl-entry">
<p class="rssincl-itemtitle">
RT @howellsrichard: Inside the factory where 1.5m creme eggs are made http://dailym.ai/P7zRxA  via @Femail #manufacturing #supplychain                                                        </p>

<div class="rssincl-clear"></div>
</div>
</a>
<a href="https://twitter.com/ThomasNetRPM/status/472756825134477312" target="_blank">
<div class="rssincl-entry">
<p class="rssincl-itemtitle">
@Cerasis Right back at ya! @NSKAmericas @AstroManufactur @EyesOnFreight @Industrialmfg @DebraTrack @Enser_Corp @HaydenARichards                                                          </p>

<div class="rssincl-clear"></div>
</div>
</a>
<a href="https://twitter.com/ThomasNetRPM/status/472755363134312448" target="_blank">
<div class="rssincl-entry">
<p class="rssincl-itemtitle">
Our ISO 9001:2008 certification verifies that we are approved for short-run stampings and sheet metal fabrications: http://hub.am/1ii9rV7                                                             </p>

<div class="rssincl-clear"></div>
</div>
</a>
</div>
<!-- RSSbox id#833641, generated 2014-06-02 14:49:16  powered by RSSinclude.com -->
</div>
</div>









            </section>

            </div>
            </section>