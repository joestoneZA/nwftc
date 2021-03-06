<?php /* Template name: Locations */
get_header(); 
?>
<?php 
	global $wpdb;
	$locations = $wpdb->get_results( "SELECT * FROM locations");
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container locations-page">
	<div class="row">
		<div class="col-xs-12">
			<?php the_content(); ?>
		</div>
	</div>
</div>
<?php 
$x = 0;
foreach($locations as $index=> $location){
?>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <section>
	  <?php if($index % 2 == 0){?>
        <div class="grid-flex">
            <div class="col col-image">
			<?php if($location->image_id > 0){
				echo wp_get_attachment_image( $location->image_id, 'left-right-image' );
			}else{
              echo wp_get_attachment_image( get_field('left_image'), 'left-right-image' );
			}			  ?>
            </div>
          <div class="col col-text">
            <div class="aligner-item">
			<h1><?php print $location->title ?></h1>
              <?php print $location->description ?>
            </div>
          </div>
        </div>
	  <?php }else{ ?>
	          <div class="grid-flex">
          <div class="col col-text">
            <div class="aligner-item">
			<h1><?php print $location->title ?></h1>
              <?php print $location->description ?>
            </div>
          </div>
          <div class="col col-image">
              			<?php if($location->image_id > 0){
				echo wp_get_attachment_image( $location->image_id, 'left-right-image' );
			}else{
              echo wp_get_attachment_image( get_field('left_image'), 'left-right-image' );
			}			  ?>
          </div>
        </div>
	  <?php } ?>
      </section>
    </div>
  </div>
</div>
<?php } ?>

<!---
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
--->
<?php endwhile; endif; ?>
<?php get_footer(); ?>