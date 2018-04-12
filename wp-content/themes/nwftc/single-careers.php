<?php get_header(); ?>
<?php include('inc/top-link-bar.php'); ?>
<div class="container careers-listing">
	<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php setup_postdata($post); ?>
			<div class="col-xs-12 item">
				<div class="inner">
					<h1>
						<?php the_title(); ?>
					</h1>
					<div class="date">
						<?php the_time('l jS  F Y'); ?>
					</div>
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</div>
	<div class="row apply-for-position">
		<div class="col-xs-12 item">
			<h3>Apply for this Position</h3>
			<div class="row contact-form">
				<div class="col-xs-12">
					<?php echo do_shortcode('[contact-form-7 id="116" title="Apply form"]'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container similar-posts">
	<div class="row items">
		<?php global $post;
		$currentID = get_the_ID(); ?>
		<?php $catIDList = wp_get_post_categories( get_the_ID(), $args ) ?>
		<?php $args = array(
            'post_type' => 'careers',
            'posts_per_page' => '4',
            'post__not_in' => array($currentID)
        );
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) : ?>
            <div class="col-xs-12">
				<h2>Other careers you may be interested in...</h2>
			</div>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="col-xs-6 col-sm-4 col-md-3 item">
					<div class="inner">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('thumbnail'); ?>
						</a>
						<div class="content">
							<h3>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h3>
							<?php the_time('l jS  F Y'); ?>
							<a class="article-link" href="<?php the_permalink(); ?>">
								Apply
							</a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</div>
</div>
<?php get_footer(); ?>