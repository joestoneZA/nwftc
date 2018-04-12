<?php get_header(); ?>
<?php include('inc/top-link-bar.php'); ?>
<div class="container news-listing">
	<div class="row">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php setup_postdata($post); ?>
			<div class="col-sm-10">
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
</div>
<?php get_footer(); ?>