<?php get_header(); ?>
<?php include('inc/top-link-bar.php'); ?>
<div class="container news-listing">
	<div class="row">
		<div class="col-sm-3 category-filter">
			<h4>Filter by category</h4>
			<div class="category-item">
				<input data-rel="all" class="hide-checkbox" type="radio" id="all" name="checkbox-option">
				<label for="all">All</label>
			</div>
			<?php $args = array(
                  'orderby' => 'id',
                  'hide_empty'=> 1
              );
              $categories = get_categories($args);
              foreach ($categories as $cat) {
                $catName = $cat->name;
                $catSlug = $cat->slug; ?>
                <div class="category-item">
	                <input data-rel="<?php echo $catSlug; ?>" class="hide-checkbox" type="radio" id="<?php echo $catSlug; ?>" name="checkbox-option">
	                <label for="<?php echo $catSlug; ?>"><?php echo $catName; ?></label>
	            </div>
            <?php } ?>

		</div>
		<div class="col-sm-9 items">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php foreach((get_the_category()) as $category) { 
                    $catSlug = $category->slug; 
                } ?>
                <?php setup_postdata($post); ?>
                
                <?php foreach((get_the_category()) as $category) { 
                    $catSlug = $category->slug; 
                } ?>
				<div class="col-xs-6 col-sm-4 item scale-anm all <?php foreach((get_the_category()) as $category) { echo $category->slug . ' '; } ?>">
					<div class="inner">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('thumbnail'); ?>
						</a>
						<div class="content">
							<h2>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>
							<?php the_time('l jS  F Y'); ?>
							<a class="article-link" href="<?php the_permalink(); ?>">
								View Article
							</a>
						</div>
					</div>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>