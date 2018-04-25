<?php /* Template name: FAQs */
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container faqs">
	<div class="row">
		<div class="col-xs-12">
			<h1><?php the_title(); ?></h1> 
			<?php the_content(); ?>
			<?php if( have_rows('faqs') ): ?>
			    <?php while ( have_rows('faqs') ) : the_row(); ?>
			        <div class="set">
						<a href="#">
							<?php the_sub_field('question'); ?>
							<i class="fa fa-plus"></i>
						</a>
						<div class="content">
							<p><?php the_sub_field('answer'); ?></p>
						</div>
					</div>
			    <?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>