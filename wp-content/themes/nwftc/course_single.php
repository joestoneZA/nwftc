<?php 
	$category_slug = str_replace('/','',strtolower($_REQUEST['cat']));
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
	}
	?>
<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 appear">
				<br/><h1><?=$course->name?></h1>
				<p><?=$course->desc?></p>
			</div>
			<?php foreach($course_options as $options){ ?>
			<?=$course->name?> Full course <?=$options->space_avail?> spaces left. <a href="/basket?add=<?=$options->id?>">Add to basket</a><br/>
			<?php }?>
			<div style="margin-left:50px;">
				<?php 
				$course_sub_options = $wpdb->get_results( "SELECT cm.name,co.spaces,co.space_avail FROM course_options co LEFT JOIN course_modules cm ON cm.id = co.course_module_id WHERE co.courses_id = '".$course->id."' AND co.course_module_id != 0");
				foreach($course_sub_options as $sub_option){?>
				<?=$sub_option->name?> Full course <?=$sub_option->space_avail?> spaces left.<br/>
				<?php }
				?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>