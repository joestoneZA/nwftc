<?php get_header(); ?>
<?php 
	$category_slug = str_replace('/','',strtolower($_REQUEST['cat']));
	global $wpdb;
	$course_type = $wpdb->get_results( "SELECT id,name,slug,color FROM courses_type");
	if(is_array($course_type) && count($course_type)){
		foreach($course_type as $course_t){
			$courses = $wpdb->get_results( "SELECT `id`,`name`,`desc`,`slug`,'image_id' FROM courses WHERE course_type_id = '".$course_t->id."'");
			$course_data[$course_t->id][] = $courses;
			$course_types[$course_t->id] = array('id' => $course_t->id, 'slug' => $course_t->slug, 'name' => $course_t->name,'color'=>$course_t->color);
		}
	}
	else{
		//get_404_template();
		//exit;
	} ?>

	<div class="container course-listing">

		<div class="row items">

			<?php foreach($course_data as $category_id => $courses){?>

				<div class="col-xs-12 cat-title">
					<h2>
						<a href="/courses/<?=$course_types[$category_id]['slug']?>/">
							<?=$course_types[$category_id]['name']?>
						</a>
					</h2>
				</div>

				<?php foreach($courses[0] as $course){?>

					<div class="col-xs-6 col-sm-4 item">
						<div class="inner" style="border-color:<?=$course_types[$category_id]['color']?>">
							<a href="/courses/<?=$course_types[$category_id]['slug']?>/<?=$course->slug?>">
								<img src="http://placehold.it/400x200" />
							</a>
							<div class="content">
								<h3>
									<a href="/courses/<?=$course_types[$category_id]['slug']?>/<?=$course->slug?>">
										<?=$course->name?>
									</a>
								</h3>
								<a class="link grey share-link">
									Share
								</a>
								<a class="link orange" href="/courses/<?=$course_types[$category_id]['slug']?>/<?=$course->slug?>">
									View Course
								</a>
								<div class="bg-overlay"></div>
								<div class="a2a_kit a2a_kit_size_32 a2a_default_style share-buttons">
									<br clear="both"/>
								    <a class="a2a_button_facebook"></a>
								    <a class="a2a_button_twitter"></a>
								    <a class="a2a_button_google_plus"></a>
								</div>
								<script type="text/javascript" src="https://static.addtoany.com/menu/page.js"></script>
							</div>
						</div>
					</div>

				<?php } ?>

			<?php } ?>

		</div>

	</div>

<?php get_footer(); ?>