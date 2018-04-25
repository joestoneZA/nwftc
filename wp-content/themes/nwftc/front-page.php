<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	

<?php include('inc/course-quick-search.php'); ?>

<div class="home-banner">
	<?php the_post_thumbnail(); ?>
</div>


<div class="container">
	<div class="row">
		<div class="col-sm-6 news-home">
			<div class="inner">
				<div class="titles">
					<div class="left">
						<h6>Latest Training News</h6>
					</div>
					<div class="right">
						<a href="<?php echo site_url(); ?>/news">View all news</a>
					</div>
				</div>
				<?php
				$args = array(
				    'post_type' => 'post',
				    'posts_per_page' => 2
				);
				$query = new WP_Query( $args );
				?>
				<?php if ( $query->have_posts() ) : ?>
				    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
				        <div class="row item">
				        	<div class="col-xs-5 col-sm-4 col-md-3 image">
				        		<a href="<?php the_permalink(); ?>">
				        			<?php the_post_thumbnail(); ?>
				        		</a>
				        	</div>
				        	<div class="col-xs-7 col-sm-8 col-md-9 content">
					        	<h6>
					        		<a href="<?php the_permalink(); ?>">
					        			<?php the_title(); ?>
					        		</a>
					        	</h6>
					        	<p><?php echo excerpt(10); ?></p>
					        	<a class="link orange" href="<?php the_permalink(); ?>">
					        		Read more
					        	</a>
					    	</div>
					    </div>
				    <?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>

			</div>
		</div>
		<div class="col-sm-6 feedback-home">
			<div class="inner">
				<div class="titles">
					<div class="left">
						<h6>See what our clients say</h6>
					</div>
					<div class="right">
						<a href="<?php echo site_url(); ?>/feedback">View Feedback</a>
					</div>
				</div>
				<?php
				$args = array(
				    'post_type' => 'testimonials',
				    'posts_per_page' => -1,
				    'orderby' => 'rand'
				);
				$query = new WP_Query( $args );
				?>
				<div class="home-testimonial-carousel">
					<?php if ( $query->have_posts() ) : ?>
					    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
					        <div class="row item">
					        	<div class="col-xs-12 quote">
						        	<div class="inner">
										<div class="content">
											<?php the_content(); ?>
											<h2>
												<?php the_title(); ?>
											</h2>
										</div>
									</div>
						    	</div>
						    </div>
					    <?php endwhile; ?>
					<?php endif; ?>
				</div>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>
	
<?php endwhile; endif; ?>
<?php get_footer(); ?>