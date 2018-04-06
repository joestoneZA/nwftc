<?php /*Template Name: Offers and Events*/ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php the_post_thumbnail(); ?>
    <div class="container">
		<div class="row">
			<div class="col-xs-12 appear">
                <div class="narrow clear">
				    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
			</div>
		</div>
		<?php if( have_rows('content_blocks') ): ?>
			<?php $counter = 0; ?>
			<div class="row content-blocks">
				<div class="col-xs-12 appear">
					<?php while ( have_rows('content_blocks') ) : the_row(); ?>
						<?php $counter++; ?>
						<div class="row item-<?php echo $counter; ?>">
							<div class="col-xs-12 no-padding">
                                <div class="inner <?php echo $oddEven; ?>">
                                    <div class="overlay appear">
                                        <div class="text">
                                            <?php $link = get_sub_field('link');
                                            if( $link ): ?>
                                                <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
                                            <?php endif; ?>
                                            <h2><?php the_sub_field('title'); ?></h2>
                                            <?php if( $link ): ?>
                                                </a>
                                            <?php endif; ?>
                                            <p><?php the_sub_field('description'); ?></p>
                                            <?php $link = get_sub_field('link');
                                            if( $link ): ?>
                                                <a class="orange-link" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php $image = wp_get_attachment_image_src( get_sub_field('image'), 'content-block-image' ); ?>
                                    <div class="background-image appear" style="background-image:url('<?php echo $image[0]; ?>');">
                                    </div>
                                </div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
<?php endwhile; endif; ?>
<?php include('inc/rooms-block.php'); ?>
<?php get_footer(); ?>