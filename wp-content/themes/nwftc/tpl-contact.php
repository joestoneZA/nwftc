<?php /*Template Name: Contact Us*/ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php the_post_thumbnail(); ?>
    <div class="container contact-container">
		<div class="row">
			<div class="col-xs-12 appear">
                <div class="narrow">
				    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
                <div class="row top-text">
                    <div class="col-sm-6">
                        <?php the_field('left_content'); ?>
                    </div>
                    <div class="col-sm-6">
                        <?php the_field('right_content'); ?>
                    </div>
                </div>
                <div class="form-content">
                    <?php the_field('above_form_content'); ?>
                    <?php echo do_shortcode('[contact-form-7 id="4" title="Contact form"]'); ?>
                </div>
			</div>
		</div>
	</div>
<?php endwhile; endif; ?>
<?php include('inc/rooms-block.php'); ?>
<?php include('inc/footer-images.php'); ?>
<?php get_footer(); ?>