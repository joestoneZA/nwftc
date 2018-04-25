<?php get_header(); ?>
<?php include('inc/top-link-bar.php'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="container news-detail">
		<div class="row">
			<div class="col-xs-12 appear">
				<div class="narrow">
					<h1><?php the_title(); ?></h1>
					<?php the_time('l jS  F Y'); ?>
					<?php the_post_thumbnail('large'); ?>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="container similar-posts">
		<div class="row items">
			<?php global $post; ?>
			<?php $catIDList = wp_get_post_categories( get_the_ID(), $args ) ?>
			<?php $args = array(
                'post_type' => 'post',
                'posts_per_page' => '4',
                'tax_query' => array(
		            array(
		                'taxonomy' => 'category',
		                'field'    => 'term_id',
		                'terms'    => $catIDList,
		            ),
		        ),
            );
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) : ?>
	            <div class="col-xs-12">
					<h2>Other posts you may be interested in...</h2>
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
									View Article
								</a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>