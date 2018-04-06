<?php get_header(); ?>
<div class="container rooms">
	<div class="row">
		<?php $counter = 0; ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php $counter++; ?>
			<div class="col-xs-6 item appear">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('room-medium'); ?></a>
				<div class="inner">
					<div class="left">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div>
					<div class="right">
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
					<p><?php echo excerpt(40); ?></p>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</div>
</div>
<?php include('inc/footer-images.php'); ?>
<?php get_footer(); ?>