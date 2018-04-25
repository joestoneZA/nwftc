<?php /* Template name: About us */
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php include('inc/top-link-bar.php'); ?>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="full-width-image">
      	<?php the_post_thumbnail(); ?>
      </div>
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

<?php if( have_rows('downloads') ): ?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="narrow">
          <div class="downloads">
            <h3>
              Downloads available
            </h3>
            <?php while ( have_rows('downloads') ) : the_row(); ?>
                <a target="_blank" class="download" href="<?php the_sub_field('file'); ?>">
                  <?php the_sub_field('title'); ?> <i class="fa fa-file" aria-hidden="true"></i>
                </a>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

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

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <section>
        <div class="grid-flex">
            <div class="col col-image">
              <?php echo wp_get_attachment_image( get_field('left_image_2'), 'left-right-image' ); ?>
            </div>
          <div class="col col-text">
            <div class="aligner-item">
              <?php the_field('right_content_2'); ?>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>