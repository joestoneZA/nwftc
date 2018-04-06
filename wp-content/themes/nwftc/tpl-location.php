<?php /*Template Name: Location*/ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php the_post_thumbnail(); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 locations-left appear">
                <?php if( have_rows('flying_directions') ): ?>
                    <div class="locations">
                        <div class="row">
                            <div class="col-xs-12">
                                <h1>Parker Guest House</h1>
                                <?php the_content(); ?>
                                <br><br>
                            </div>
                        </div>
                        <div class="row location-map">
                            <div class="col-xs-12">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6308.352052212235!2d-122.4329988665968!3d37.762470579761676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f7e1973fa2c15%3A0x1878e26d7887bae3!2sParker+Guest+House!5e0!3m2!1sen!2suk!4v1519809659072" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <h4>Public transport directions</h4>
                        <?php while ( have_rows('flying_directions') ) : the_row(); ?>
                            <h3 class="accordion-title">
                                <?php the_sub_field('title'); ?>
                                <div class="ui-icon"></div>
                            </h3>
                            <div class="accordion-content">
                                <?php the_sub_field('description'); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <?php if( have_rows('driving_directions') ): ?>
                    <div class="locations">
                        <h4>Driving directions</h4>
                        <?php while ( have_rows('driving_directions') ) : the_row(); ?>
                            <h3 class="accordion-title">
                                <?php the_sub_field('title'); ?>
                                <div class="ui-icon"></div>
                            </h3>
                            <div class="accordion-content">
                                <?php the_sub_field('description'); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-sm-3 locations-right appear">
                <div class="yellow-box">
                    <?php the_field('address_details'); ?>
                </div>
            </div>
        </div>
    </div>
        
<?php endwhile; endif; ?>
<?php include('inc/rooms-block.php'); ?>
<?php include('inc/footer-images.php'); ?>
<?php get_footer(); ?>