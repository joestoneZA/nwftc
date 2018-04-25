<?php 
	$category_slug = str_replace('/','',strtolower($_REQUEST['cat']));
	global $wpdb;
	$course_type = $wpdb->get_results( "SELECT id,name FROM courses_type WHERE slug = '".$category_slug."'");
	if(is_array($course_type) && count($course_type)){
		$category_name = $course_type[0]->name;
		$course_typeid = $course_type[0]->id;
		$courses = $wpdb->get_results( "SELECT * FROM courses WHERE course_type_id = '".$course_typeid."'");
	}
	else{
		//get_404_template();
		//exit;
	}
	function assignPageTitle(){
		global $wp_query,$category_name;
		return $category_name;
	}
	add_filter('wp_title', 'assignPageTitle');
	?>
	
<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 appear">
				<h1><?=$category_name?></h1>
				<?php foreach($courses as $course){?>
				Course Name: <a href="/courses/<?=$category_slug?>/<?=$course->slug?>"><?=$course->name?></a><br/>
				Course Description: <?=$course->name?><br/>
				<br/><br/><br/>
				<?php } ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>