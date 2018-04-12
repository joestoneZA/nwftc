<?php get_header(); ?>
<?php include('inc/top-link-bar.php'); ?>
<div class="container careers-listing">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php setup_postdata($post); ?>
			<div class="row item">
				<div class="col-sm-10">
					<div class="inner">
						<h2>
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h2>
						<div class="date">
							<?php the_time('l jS  F Y'); ?>
						</div>
						<div><?php echo excerpt(30); ?></div>
					</div>
				</div>
				<div class="col-sm-2">
					<a class="apply" href="<?php the_permalink(); ?>">Apply</a>
				</div>
			</div>
		<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>