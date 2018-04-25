<?php get_header(); ?>
<?php include('inc/top-link-bar.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="full-width-image">
				<?php echo get_the_post_thumbnail(82); ?>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<section>
	  <div class="grid-flex">
	      <div class="col col-image">
	        <?php echo wp_get_attachment_image( get_field('left_image', 82), 'left-right-image' ); ?>
	      </div>
	    <div class="col col-text">
	      <div class="aligner-item">
	        <?php the_field('right_content', 82); ?>
	      </div>
	    </div>
	  </div>
	</section>
</div>

<div class="container feedback-listing">
	<div class="row">
		<div class="col-xs-12 items">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php foreach((get_the_category()) as $category) { 
                    $catSlug = $category->slug; 
                } ?>
                <?php setup_postdata($post); ?>
                
                <?php foreach((get_the_category()) as $category) { 
                    $catSlug = $category->slug; 
                } ?>
				<div class="col-sm-6 col-md-4 col-lg-3 item scale-anm all <?php foreach((get_the_category()) as $category) { echo $category->slug . ' '; } ?>">
					<div class="inner">
						<div class="content">
							<?php the_content(); ?>
							<h2>
								<?php the_title(); ?>
							</h2>
						</div>
					</div>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>