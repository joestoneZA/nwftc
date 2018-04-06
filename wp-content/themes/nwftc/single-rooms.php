<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="container">
	<div class="row main-image">
		<div class="col-xs-12 appear">
			<?php the_post_thumbnail('room-large'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-9 room-item appear">
			<div class="inner">
				<div class="row">
					<div class="col-md-9">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div>
					<div class="col-md-3 right-col">
						<?/*<div class="left">
							<span class="dollar">&dollar;</span><?php the_field('price'); ?>.<span class="zeros">00</span>
						</div>*/ ?>
						<div class="right">
							<a class="link yellow" href="#" data-featherlight="#book-iframe">BOOK</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="share">
							<label>SHARE THIS</label><?php echo do_shortcode('[addtoany]'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<?php the_field('main_content'); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="tripadvisor">
							<div id="TA_cdsscrollingravewide832" class="TA_cdsscrollingravewide">
							<ul id="UnHGm0uwc5U" class="TA_links jFvQeDc2">
							<li id="47CMUkZVKt" class="VUDMDUC">
							<a target="_blank" href="https://www.tripadvisor.com/"><img src="https://static.tacdn.com/img2/t4b/Stacked_TA_logo.png" alt="TripAdvisor" class="widEXCIMG" id="CDSWIDEXCLOGO"/></a>
							</li>
							</ul>
							</div>
							<script async src="https://www.jscache.com/wejs?wtype=cdsscrollingravewide&amp;uniq=832&amp;locationId=112358&amp;lang=en_US&amp;border=true&amp;shadow=false&amp;display_version=2"></script>
						</div>
					</div>
				</div>
				<div class="row gallery">
					<div class="col-xs-12">
						<?php if( have_rows('images') ): ?>
							<div class="room-gallery">
							    <?php while ( have_rows('images') ) : the_row(); ?>
							    	<div class="image">
							        	<?php echo wp_get_attachment_image( get_sub_field('image'), 'room-gallery-large', $attr ); ?>
									</div>
							    <?php endwhile; ?>
						    </div>
						<?php endif; ?>
						<?php if( have_rows('images') ): ?>
							<div class="slider-nav">
							    <?php while ( have_rows('images') ) : the_row(); ?>
							    	<div class="image">
							        	<?php echo wp_get_attachment_image( get_sub_field('image'), 'room-gallery-thumb', $attr ); ?>
									</div>
							    <?php endwhile; ?>
						    </div>
						<?php endif; ?>
					</div>
				</div>
				<?php if( have_rows('room_rates_include') ): ?>
					<div class="row room-rates-include">
						<div class="rates-inner">
							<div class="col-xs-12">
								<h6><?php the_field('room_rates_title'); ?></h6>
							</div>
						    <?php while ( have_rows('room_rates_include') ) : the_row(); ?>
						    	<div class="col-xs-6 rates-item">
						    		<img src="<?php the_sub_field('icon'); ?>" />
									<label><?php the_sub_field('title'); ?></label>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if( have_rows('all_guest_rooms_feature') ): ?>
					<div class="row room-rates-include">
						<div class="rates-inner">
							<div class="col-xs-12">
								<h6><?php the_field('all_guest_rooms_feature_title'); ?></h6>
							</div>
						    <?php while ( have_rows('all_guest_rooms_feature') ) : the_row(); ?>
						    	<div class="col-xs-6 rates-item">
						    		<img src="<?php the_sub_field('icon'); ?>" />
									<label><?php the_sub_field('title'); ?></label>
								</div>
							<?php endwhile; ?>
							<p class="small-text">Minimum stay requirements apply on most weekends.</p>
						</div>
					</div>
				<?php endif; ?>
				<div class="row bottom-details">
					<div class="col-sm-6">
						<h2><?php the_title(); ?></h2>
					</div>
					<div class="col-sm-6">
						<div class="right">
							<?php /*<div class="bottom-price">
								<span class="dollar">&dollar;</span><?php the_field('price'); ?>.<span class="zeros">00</span>
							</div>*/ ?>
							<a class="link yellow" href="#" data-featherlight="#book-iframe">BOOK</a>
							<div class="book-iframe" id="book-iframe">
								<iframe class="clearFloat" src="https://secure.rezovation.com/Reservations/CheckAvailabilityEmbedded.aspx?_0E2C76B2YWVR3S" width="300" height="175" frameborder="no" scrolling="No"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3 sidebar appear">
			<?php if( have_rows('quick_links') ): ?>
				<div class="row quick-links">
					<?php while ( have_rows('quick_links') ) : the_row(); ?>
						<?php $image = wp_get_attachment_image_src( get_sub_field('image'), 'quick-link-image', $attr ); ?>
						<div class="col-xs-6 col-sm-12 item <?php the_sub_field('text_color'); ?>">
							<?php $link = get_sub_field('link'); ?>
							<?php if( $link ): ?>
								<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
							<?php endif; ?>	
							<div class="inner" style="background-image:url(<?php echo $image[0]; ?>);">
								<div class="overlay-content">
									<h4><?php the_sub_field('title'); ?></h4>
									<?php the_sub_field('description'); ?>
								</div>
								<div class="overlay-bg"></div>
							</div>
							<?php if( $link ): ?>
								</a>
							<?php endif; ?>	
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>	
		</div>
	</div>
</div>
<?php endwhile; endif; ?>
<?php wp_reset_postdata(); ?>
<?php include('inc/rooms-block.php'); ?>
<?php get_footer(); ?>