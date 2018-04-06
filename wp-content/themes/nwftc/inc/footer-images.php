<?php if( have_rows('footer_images','options') ): ?>
	<div class="footer-images">
		<?php while ( have_rows('footer_images','options') ) : the_row(); ?>
			<?php $image = wp_get_attachment_image_src( get_sub_field('image'), 'room-gallery-large' ); ?>
	    	<section class="image">
	        	<a class="gallery" href="<?php echo $image[0]; ?>">
					<?php echo wp_get_attachment_image( get_sub_field('image'), 'room-gallery-thumb', $attr ); ?>
				</a>
			</section>
	    <?php endwhile; ?>
    </div>
<?php endif; ?>