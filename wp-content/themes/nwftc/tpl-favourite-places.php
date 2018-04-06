<?php /*Template Name: Favourite places*/ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php the_post_thumbnail(); ?>
    <div class="places-background">
        <div class="container">
    		<div class="row">
    			<div class="col-xs-12 appear">
                    
                    <?php if( have_rows('place_types') ): ?>
                        <?php $counter = 0; ?>
                        <div class="place-types" id="accordion">
                            <?php while ( have_rows('place_types') ) : the_row(); ?>
                                <?php $counter++; ?>
                                <h3 class="accordion-title">
                                    <img src="<?php the_sub_field('icon'); ?>" /><?php the_sub_field('title'); ?>
                                    <div class="ui-icon"></div>
                                </h3>
                                <div class="accordion-content">
                                    <h4><?php the_sub_field('description'); ?></h4>
                                    <?php if( have_rows('places') ): ?>
                                        <div class="place-images place-images">
                                            <?php while ( have_rows('places') ) : the_row(); ?>
                                                <div class="item">
                                                    <?php $image = wp_get_attachment_image_src( get_sub_field('image'), 'place-image' ); ?>
                                                    <?php if(get_sub_field('link')){ ?>
                                                        <a target="_blank" href="<?php the_sub_field('link'); ?>">
                                                    <?php } ?>
                                                        <div class="image" style="background-image:url('<?php echo $image[0]; ?>');">
                                                        </div>
                                                    <?php if(get_sub_field('link')){ ?>
                                                        </a>
                                                    <?php } ?>
                                                    <div class="title">
                                                        <?php if(get_sub_field('link')){ ?>
                                                            <a target="_blank" href="<?php the_sub_field('link'); ?>">
                                                        <?php } ?>
                                                            <?php the_sub_field('title'); 
                                                                ?>
                                                        <?php if(get_sub_field('link')){ ?>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                    <div>
                                                        <p>
                                                            <?php the_sub_field('description'); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

    			</div>
    		</div>
    	</div>
    </div>
<?php endwhile; endif; ?>
<?php include('inc/rooms-block.php'); ?>
<?php include('inc/footer-images.php'); ?>
<?php get_footer(); ?>