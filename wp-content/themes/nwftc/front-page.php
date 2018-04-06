<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php if( have_rows('full_width_banner_background_images') ): ?>
		<div class="full-width-home-images appear">
			<?php while ( have_rows('full_width_banner_background_images') ) : the_row(); ?>
				<?php $image = wp_get_attachment_image_src( get_sub_field('image'), 'home-full-width-banner' ); ?>
				<div class="home-full-width" style="background-image:url(<?php echo $image[0]; ?>);">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 overlay-content">
								<div class="subtitle">
									<?php the_field('full_width_banner_subtitle'); ?>
								</div>
								<?php the_field('full_width_banner_title'); ?>
								<?php if( have_rows('full_width_banner_icons') ): ?>
									<div class="icons">
										<?php while ( have_rows('full_width_banner_icons') ) : the_row(); ?>
											<div class="icon">
												<img src="<?php the_sub_field('icon'); ?>" />
												<label><?php the_sub_field('title'); ?></label>
											</div>
										<?php endwhile; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
	<div class="home-half">
		<?php $image2 = wp_get_attachment_image_src( get_field('second_home_block_background_image'), 'home-half-banner-1' ); ?>
		<?php $image3 = wp_get_attachment_image_src( get_field('third_home_block_background_image'), 'home-half-banner-2' ); ?>
		<div class="row">
			<div class="col-sm-6 left appear" style="background-image:url(<?php echo $image2[0]; ?>);">
				<div class="bg-colour"></div>
				<div class="col-xs-12 overlay-content">
					<?php $link2 = get_field('second_home_block_link');
					if( $link2 ): ?>
						<a href="<?php echo $link2['url']; ?>" target="<?php echo $link2['target']; ?>"><?php echo $link['title']; ?>
					<?php endif; ?>
						<?php the_field('second_home_block_title'); ?>
						<div class="subtitle">
							<?php the_field('second_home_block_subtitle'); ?>
						</div>
					<?php if( $link2 ): ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-sm-6 right appear" style="background-image:url(<?php echo $image3[0]; ?>);">
				<div class="bg-colour"></div>
				<div class="col-xs-12 overlay-content">
					<?php $link3 = get_field('third_home_block_link');
					if( $link3 ): ?>
						<a href="<?php echo $link3['url']; ?>" target="<?php echo $link3['target']; ?>"><?php echo $link['title']; ?>
					<?php endif; ?>
						<?php the_field('third_home_block_title'); ?>
						<div class="subtitle">
							<?php the_field('third_home_block_subtitle'); ?>
						</div>
					<?php if( $link3 ): ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="yellow-block">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 left appear">
					<?php the_content(); ?>
				</div>
				<div class="col-sm-6 tripadvisor right appear">
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
	</div>
	<?php include('inc/rooms-block.php'); ?>
	<?php include('inc/footer-images.php'); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>