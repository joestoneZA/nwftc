<?php get_header(); ?>

<?php $category_slug = str_replace('/','',strtolower($_REQUEST['cat']));
	$course_slug = str_replace('/','',strtolower($_REQUEST['course']));
	global $wpdb;
	$course_type = $wpdb->get_results( "SELECT id,name FROM courses_type WHERE slug = '".$category_slug."'");
	if(is_array($course_type) && count($course_type)){
		$category_name = $course_type[0]->name;
		$course_typeid = $course_type[0]->id;
		$courses = $wpdb->get_results( "SELECT `id`,`name`,`desc` FROM courses WHERE course_type_id = '".$course_typeid."' AND slug = '".$course_slug."'");
		if(isset($courses) && count($courses)){
			$course = $courses[0];
		}
		$course_options = $wpdb->get_results( "SELECT * FROM course_options WHERE course_options.courses_id = '".$course->id."' AND course_module_id = 0");
	}
	else{
		//get_404_template();
		//exit;
	} ?>


	<div class="container course-detail-page">
		<div class="row top-section">
			<div class="col-xs-12 col-sm-4 col-sm-push-8 right">
				<a class="link white share-link">Share</a>
				<a href="<?php echo site_url(); ?>/courses" class="link grey-white">Back to Sector Courses</a>
				<div class="a2a_kit a2a_kit_size_32 a2a_default_style share-buttons" style="display:none;">
				    <a class="a2a_button_facebook"></a>
				    <a class="a2a_button_twitter"></a>
				    <a class="a2a_button_google_plus"></a>
				</div>
				<script type="text/javascript" src="https://static.addtoany.com/menu/page.js"></script>
			</div>
			<div class="col-xs-12 col-sm-8 col-sm-pull-4">
				<br/><h1><?=$course->name?></h1>
				<p><?=$course->desc?></p>
			</div>
		</div>
		<div class="row">
			<?php foreach($course_options as $options){ ?>
				<div class="col-xs-12">
					<?=$course->name?> Full course <?=$options->space_avail?> spaces left. <a href="/basket?add=<?=$options->id?>">Add to basket</a>
				</div>
			<?php }?>
		</div>
		<div class="row">
			<?php $course_sub_options = $wpdb->get_results( "SELECT cm.name,co.spaces,co.space_avail FROM course_options co LEFT JOIN course_modules cm ON cm.id = co.course_module_id WHERE co.courses_id = '".$course->id."' AND co.course_module_id != 0");
			foreach($course_sub_options as $sub_option){?>
				<div class="col-xs-12">	
					<?=$sub_option->name?> Full course <?=$sub_option->space_avail?> spaces left.
				</div>
			<?php } ?>
		</div>
	</div>

<?php get_footer(); ?>