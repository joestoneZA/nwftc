<?php /* Template name: Meet the team */
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php include('inc/top-link-bar.php'); ?>

<div class="container team-members">


<?php
$i = 1; ?>
<div class="row team-row">
        <?php if( have_rows('team_members') ): ?>
        <?php while ( have_rows('team_members') ) : the_row(); ?>
          <div class="col-sm-4 item">
            <div class="inner">
              <div class="image">
                <?php echo wp_get_attachment_image( get_sub_field('image'), 'team-member-image' ); ?>
                <h4><?php the_sub_field('name'); ?></h4>
              </div>
              <div class="description">
                <?php the_sub_field('description'); ?>
                <div class="email">
                  <a href="mailto:<?php the_field('email_address','options'); ?>">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
     <?php if($i % 3 == 0) {echo '</div><div class="row team-row">';} ?>

<?php $i++; endwhile; endif; ?>
</div>

</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>