<?php /* Template name: Locations */
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container locations-page">
	<div class="row">
		<div class="col-xs-12">
			<?php the_content(); ?>
		</div>
	</div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <section>
        <div class="grid-flex">
            <div class="col col-image">
              <?php echo wp_get_attachment_image( get_field('left_image'), 'left-right-image' ); ?>
            </div>
          <div class="col col-text">
            <div class="aligner-item">
              <?php the_field('right_content'); ?>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <section>
        <div class="grid-flex">
          <div class="col col-text">
            <div class="aligner-item">
              <?php the_field('left_content'); ?>
            </div>
          </div>
          <div class="col col-image">
            <?php echo wp_get_attachment_image( get_field('right_image'), 'left-right-image' ); ?>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>