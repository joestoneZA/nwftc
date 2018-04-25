<?php /* Template name: Calendar */
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div id='calendar'></div>
		</div>
	</div>
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>