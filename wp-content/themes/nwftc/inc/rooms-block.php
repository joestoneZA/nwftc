<?php wp_reset_postdata(); ?>
<div class="rooms-block">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 top-content appear">
				<h2><?php the_field('rooms_block_title','options'); ?></h2>
				<p><?php the_field('rooms_block_description','options'); ?></p>
			</div>
			<?php $args = array(
			    'post_type' => 'rooms',
			    'posts_per_page' => '-1',
			);
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="col-xs-6 col-sm-3 item appear">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('room-thumb'); ?></a>
						<div class="inner">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<p><?php echo excerpt(10); ?></p>
							<div class="room-links">
								<a class="link yellow" href="#" data-featherlight="#book-iframe-<?php echo $counter; ?>">BOOK</a>
								<a class="link white" href="<?php the_permalink(); ?>">VIEW</a>
							</div>
							<div class="book-iframe" id="book-iframe-<?php echo $counter; ?>">
								<iframe class="clearFloat" src="https://secure.rezovation.com/Reservations/CheckAvailabilityEmbedded.aspx?_0E2C76B2YWVR3S" width="300" height="175" frameborder="no" scrolling="No"></iframe>
							</div>
							<div class="gallery">
								<div data-featherlight-gallery data-featherlight-filter="a">
									<?php if( have_rows('images') ): ?>
										<?php $counter = 0; ?>
									    <?php while ( have_rows('images') ) : the_row(); ?>
									    	<?php $image = wp_get_attachment_image_src( get_sub_field('image'), 'room-gallery-large', $attr ); ?>
									    <?php $counter++; ?>
									    	<?php if($counter == 1){ ?>
									    		<a href="<?php echo $image[0]; ?>"><i class="fa fa-camera"></i></a>
									    	<?php } else { ?>
									        	<a href="<?php echo $image[0]; ?>"></a>
									        <?php } ?>
									    <?php endwhile; ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php wp_reset_postdata(); ?>