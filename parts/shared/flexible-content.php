
<?php if( have_rows('flexible_content') ): echo '<section class="additional-content">';
	while ( have_rows('flexible_content') ) : the_row(); ?>
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
					<?php if( get_sub_field('divider')): ?>
						<hr>
					<?php endif; ?>
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

		<?php elseif( get_row_layout() == 'process_module' ): ?>
			<section class="process-module" id="processModule">
				<div class="inner-wrap">
					<div class="section-heading">
						<?php if( get_sub_field('section_heading')): ?>
							<h3><?php the_sub_field('section_heading'); ?></h3>
						<?php endif; ?>
					</div>
					<div class="process-wrap">
            <ul>
							<?php if(have_rows('process_left')): while ( have_rows('process_left') ) : the_row();?>
								<li class="<?php the_sub_field('item_class'); ?>">
									<figure>
										<img src="<?php if( get_sub_field('item_image')): ?>
											<?php the_sub_field('item_image') ?>
										<?php endif; ?>" alt="">
									</figure>
									<?php if( get_sub_field('item_heading')): ?>
										<span><?php the_sub_field('item_heading'); ?></span>
									<?php endif; ?>
									<p>
										<?php the_sub_field('item_text'); ?>
									</p>
								</li>
							<?php endwhile; endif; ?>
            </ul>
            <div class="pm-img">
							<img src="<?php if( get_sub_field('section_image')): ?>
								<?php the_sub_field('section_image') ?>
							<?php endif; ?>" alt="">
            </div>
            <ul>
							<?php if(have_rows('process_right')): while ( have_rows('process_right') ) : the_row();?>
								<li class="<?php the_sub_field('item_class'); ?>">
									<figure>
										<img src="<?php if( get_sub_field('item_image')): ?>
											<?php the_sub_field('item_image') ?>
										<?php endif; ?>" alt="">
									</figure>
									<?php if( get_sub_field('item_heading')): ?>
										<span><?php the_sub_field('item_heading'); ?></span>
									<?php endif; ?>
									<p>
										<?php the_sub_field('item_text'); ?>
									</p>
								</li>
							<?php endwhile; endif; ?>
            </ul>
          </div>
					<?php if( get_sub_field('section_box')): ?>
						<div class="pm-box"><?php the_sub_field('section_box'); ?></div>
					<?php endif; ?>
					<div>
						<?php if( get_sub_field('section_link')): ?>
							<a href="<?php the_sub_field('section_link'); ?>" title="<?php the_sub_field('btn_txt'); ?>" class="<?php the_sub_field('btn_class'); ?>"><?php the_sub_field('btn_txt'); ?></a>
						<?php endif; ?>            
          </div> 
				</div>
			</section>

		<?php elseif( get_row_layout() == 'consultation_module' ): ?>
			<section class="consultation-module">
        <div class="inner-wrap">
          <div class="cm-content">
						<h4><?php the_sub_field('section_heading'); ?></h4>
            <p><?php the_sub_field('section_text'); ?></p>
            <div>
							<?php if( get_sub_field('section_link')): ?>
								<a href="<?php the_sub_field('section_link'); ?>" title="<?php the_sub_field('btn_txt'); ?>" class="<?php the_sub_field('btn_class'); ?>"><?php the_sub_field('btn_txt'); ?></a>
							<?php endif; ?>            
						</div>
          </div>
          <div class="cm-img">
            <figure>
              <img src="<?php bloginfo('template_url'); ?>/img/consultation-meal.png" alt="">
            </figure>
          </div>
        </div>
      </section> 

		<?php elseif( get_row_layout() == 'testimonials_module' ): ?>	
			<section class="testimonials-module">
        <div class="inner-wrap">
					<div class="section-heading">
						<?php if( get_sub_field('section_heading')): ?>
							<h3><?php the_sub_field('section_heading'); ?></h3>
						<?php endif; ?>
					</div>
          <div class="tm-slider">
						<?php if(have_rows('tm_item')): while ( have_rows('tm_item') ) : the_row();?>
							<div class="tm-item">
								<div class="tm-content">
									<div class="quotes">
										<img src="<?php bloginfo('template_url'); ?>/img/quotes.svg" alt="Quotes">
									</div>
									<ul class="stars">
										<?php if(have_rows('rating_img')): while ( have_rows('rating_img') ) : the_row();?>
											<li><img src="<?php the_sub_field('star_img'); ?>" alt="Rating"></li>
										<?php endwhile; endif; ?>
									</ul>
									<p><?php the_sub_field('item_text'); ?></p>
								</div>
								<div class="tm-user">
									<div class="tm-img">
										<img src="<?php the_sub_field('user_img'); ?>" alt="">
									</div>
									<div class="tm-text">
										<span><?php the_sub_field('user_name'); ?></span>
										<p><?php the_sub_field('user_subscription'); ?></p>
									</div>
								</div>
							</div>
						<?php endwhile; endif; ?>
          </div>          
        </div>
      </section> 

		<?php elseif( get_row_layout() == 'instagram_module' ): ?>
			<section class="instagram-module">
        <div class="inner-wrap">
					<div class="section-heading">
						<?php if( get_sub_field('section_heading')): ?>
							<h3><?php the_sub_field('section_heading'); ?></h3>
						<?php endif; ?>
					</div>
					<div class="im-slider">
						<?php the_sub_field('instagram_feed'); ?>
					</div>
					<div>
						<?php if( get_sub_field('section_link')): ?>
							<a href="<?php the_sub_field('section_link'); ?>" title="<?php the_sub_field('btn_txt'); ?>" class="<?php the_sub_field('btn_class'); ?>"><?php the_sub_field('btn_txt'); ?></a>
						<?php endif; ?>            
					</div>
        </div>
      </section>
		
		<?php elseif( get_row_layout() == 'contact_module' ): ?>
			<section class="contact-module">
        <div class="inner-wrap">
					<div class="section-heading">
						<?php if( get_sub_field('section_heading')): ?>
							<h3><?php the_sub_field('section_heading'); ?></h3>
						<?php endif; ?>
					</div>
          <div class="cm-form">
						<div class="section-heading">
							<?php if( get_sub_field('form_heading')): ?>
								<h3><?php the_sub_field('form_heading'); ?></h3>
							<?php endif; ?>
						</div>
            <?php the_sub_field('form_code'); ?>
          </div>
        </div>
      </section>
		
		<?php elseif( get_row_layout() == 'about_box_module' ): ?>
			<section class="about-box-module">
        <div class="inner-wrap">
					<div class="section-heading">
						<?php if( get_sub_field('section_heading')): ?>
							<h3><?php the_sub_field('section_heading'); ?></h3>
						<?php endif; ?>
					</div>
					<div class="rows-of-4">
						<?php if(have_rows('item')): while ( have_rows('item') ) : the_row();?>
							<div class="abm-item">
								<figure>
									<img src="<?php if( get_sub_field('item_img')): ?>
										<?php the_sub_field('item_img') ?>
									<?php endif; ?>" alt="">
								</figure>
								<div class="content">
									<?php if( get_sub_field('item_heading')): ?>
										<span><?php the_sub_field('item_heading'); ?></span>
									<?php endif; ?>
									<p>
										<?php the_sub_field('item_text'); ?>
									</p>
								</div>
							</div>
						<?php endwhile; endif; ?>
					</div>
        </div>
      </section>

		<?php elseif( get_row_layout() == 'teams_module' ): ?>
			<section class="teams-module">
        <div class="inner-wrap">
					<div class="section-heading">
						<?php if( get_sub_field('section_heading')): ?>
							<h3><?php the_sub_field('section_heading'); ?></h3>
						<?php endif; ?>
					</div>
					<div class="members-wrap">
						<?php if(have_rows('item')): while ( have_rows('item') ) : the_row();?>
							<div class="tm-item">
								<div class="img">
									<img src="<?php if( get_sub_field('item_img')): ?>
										<?php the_sub_field('item_img') ?>
									<?php endif; ?>" alt="">
									</div>
								<div class="content">
									<?php if( get_sub_field('item_name')): ?>
										<p class="name"><?php the_sub_field('item_name'); ?></p>
									<?php endif; ?>
									<?php if( get_sub_field('item_designation')): ?>
										<span class="designation"><?php the_sub_field('item_designation'); ?></span>
									<?php endif; ?>
									<p>
										<?php the_sub_field('item_text'); ?>
									</p>
								</div>
							</div>
						<?php endwhile; endif; ?>
					</div>
        </div>
      </section>

		<?php elseif( get_row_layout() == 'subscription_module' ): ?>
			<section class="subscription-module">
        <div class="inner-wrap">
					<ul>
            <li class="sm-img">
              <figure>
								<img src="<?php if( get_sub_field('section_image')): ?>
									<?php the_sub_field('section_image') ?>
								<?php endif; ?>" alt="">
              </figure>
            </li>
            <li class="sm-content">
							<?php if( get_sub_field('section_heading')): ?>
								<span><?php the_sub_field('section_heading'); ?></span>
							<?php endif; ?>
              <div><?php the_sub_field('section_text'); ?></div>
              <div class="sm-buttons">
								<?php if( get_sub_field('enquiry_link')): ?>
									<div>
										<a href="<?php the_sub_field('enquiry_link'); ?>" class="btn-alt" title="Enquire Now">enquire now</a>
									</div>									
								<?php endif; ?>
								<?php if( get_sub_field('booking_link')): ?>
									<div>
										<a href="<?php the_sub_field('booking_link'); ?>" class="btn" title="Book a Free Consultation">book a free consultation</a>
									</div>									
								<?php endif; ?>      
              </div>
            </li>
          </ul>
        </div>
      </section>
				
		<?php elseif( get_row_layout() == 'meal_module' ): ?>	
			<div class="merge">
				<section class="meal-module">
					<div class="inner-wrap">
						<div class="section-heading">
							<?php if( get_sub_field('section_heading')): ?>
								<h3><?php the_sub_field('section_heading'); ?></h3>
							<?php endif; ?>
						</div>
						<div class="mm-slider">
							<?php if(have_rows('mm_item')): while ( have_rows('mm_item') ) : the_row();?>
								<div class="mm-item">
									<div class="mm-img">
										<img src="<?php the_sub_field('item_img'); ?>" alt="">
									</div>
									<div class="mm-content">
										<h4><?php the_sub_field('item_heading'); ?></h4>
										<p><?php the_sub_field('item_text'); ?></p>
										<div class="module-btn">
											<?php if( get_sub_field('item_link')): ?>
												<a href="<?php the_sub_field('item_link'); ?>" title="<?php the_sub_field('btn_txt'); ?>" class="<?php the_sub_field('btn_class'); ?>"><?php the_sub_field('btn_txt'); ?></a>
											<?php endif; ?>   
										</div>
									</div>
									<div class="overlay">
                    <p>
										<?php the_sub_field('item_description'); ?>
                    </p>
                    <div class="module-btn">
											<?php if( get_sub_field('item_link')): ?>
												<a href="<?php the_sub_field('item_link'); ?>" title="<?php the_sub_field('btn_txt'); ?>" class="<?php the_sub_field('btn_class'); ?>"><?php the_sub_field('btn_txt'); ?></a>
											<?php endif; ?>   
										</div>
                  </div>
								</div>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</section>

			<?php elseif( get_row_layout() == 'bakery_module' ): ?>	
				<section class="bakery-module">
					<div class="inner-wrap">
						<div class="section-heading">
							<?php if( get_sub_field('section_heading')): ?>
								<h3><?php the_sub_field('section_heading'); ?></h3>
								<p><?php the_sub_field('section_txt'); ?></p>
							<?php endif; ?>
						</div>
						<div class="bm-slider">
							<?php if(have_rows('bm_item')): while ( have_rows('bm_item') ) : the_row();?>
								<div class="bm-item">
									<div class="bm-img">
										<img src="<?php the_sub_field('item_img'); ?>" alt="">
									</div>
									<div class="bm-content">
										<h4><?php the_sub_field('item_heading'); ?></h4>
										<p><?php the_sub_field('item_text'); ?></p>
										<div class="module-btn">
											<?php if( get_sub_field('item_link')): ?>
												<a href="<?php the_sub_field('item_link'); ?>" title="<?php the_sub_field('btn_txt'); ?>" class="<?php the_sub_field('btn_class'); ?>"><?php the_sub_field('btn_txt'); ?></a>
											<?php endif; ?> 
										</div>
									</div>
									<div class="overlay">
                    <p>
										<?php the_sub_field('item_description'); ?>
                    </p>
                    <div class="module-btn">
											<?php if( get_sub_field('item_link')): ?>
												<a href="<?php the_sub_field('item_link'); ?>" title="<?php the_sub_field('btn_txt'); ?>" class="<?php the_sub_field('btn_class'); ?>"><?php the_sub_field('btn_txt'); ?></a>
											<?php endif; ?>   
										</div>
                  </div>
								</div>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</section>

			<?php elseif( get_row_layout() == 'salad-module bakery_module' ): ?>	
				<section class="bakery-module">
					<div class="inner-wrap">
						<div class="section-heading">
							<?php if( get_sub_field('section_heading')): ?>
								<h3><?php the_sub_field('section_heading'); ?></h3>
								<p><?php the_sub_field('section_txt'); ?></p>
							<?php endif; ?>
						</div>
						<div class="bm-slider">
							<?php if(have_rows('bm_item')): while ( have_rows('bm_item') ) : the_row();?>
								<div class="bm-item">
									<div class="bm-img">
										<img src="<?php the_sub_field('item_img'); ?>" alt="">
									</div>
									<div class="bm-content">
										<h4><?php the_sub_field('item_heading'); ?></h4>
										<p><?php the_sub_field('item_text'); ?></p>
										<div class="module-btn">
											<?php if( get_sub_field('item_link')): ?>
												<a href="<?php the_sub_field('item_link'); ?>" title="<?php the_sub_field('btn_txt'); ?>" class="<?php the_sub_field('btn_class'); ?>"><?php the_sub_field('btn_txt'); ?></a>
											<?php endif; ?> 
										</div>
									</div>
									<div class="overlay">
                    <p>
										<?php the_sub_field('item_description'); ?>
                    </p>
                    <div class="module-btn">
											<?php if( get_sub_field('item_link')): ?>
												<a href="<?php the_sub_field('item_link'); ?>" title="<?php the_sub_field('btn_txt'); ?>" class="<?php the_sub_field('btn_class'); ?>"><?php the_sub_field('btn_txt'); ?></a>
											<?php endif; ?>   
										</div>
                  </div>
								</div>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</section> 
								
			<?php elseif( get_row_layout() == 'about_module' ): ?>
			</div>
				<section class="about-module">
					<div class="inner-wrap">
						<div class="section-heading">
							<?php if( get_sub_field('section_heading')): ?>
								<h3><?php the_sub_field('section_heading'); ?></h3>
							<?php endif; ?>
						</div>
						<?php if( get_sub_field('section_text')): ?>
							<p><?php the_sub_field('section_text'); ?></p>
						<?php endif; ?>
						<ul class="am-wrap">
							<?php if(have_rows('about_item')): while ( have_rows('about_item') ) : the_row();?>
								<li class="<?php the_sub_field('item_class'); ?>">
									<div class="am-img">
										<img src="<?php if( get_sub_field('item_image')): ?>
											<?php the_sub_field('item_image') ?>
										<?php endif; ?>" alt="">
									</div>
									<div class="am-content">
										<?php if( get_sub_field('item_heading')): ?>
											<h4><?php the_sub_field('item_heading'); ?></h4>
										<?php endif; ?>
										<p>
											<?php the_sub_field('item_text'); ?>
										</p>
									</div>
								</li>
							<?php endwhile; endif; ?>
						</ul>
						<div>
							<?php if( get_sub_field('section_link')): ?>
								<a href="<?php the_sub_field('section_link'); ?>" title="<?php the_sub_field('btn_txt'); ?>" class="<?php the_sub_field('btn_class'); ?>"><?php the_sub_field('btn_txt'); ?></a>
							<?php endif; ?>            
						</div> 
					</div>
				</section>
		
		<?php endif; ?>
	<?php endwhile; echo '</section>'; ?>
<?php endif; ?>