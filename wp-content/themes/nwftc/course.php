<?php 

	get_header();

	$id = $_REQUEST['id'];

	global $wpdb;    

	$course = $wpdb->get_results( "SELECT * FROM courses WHERE id = '".$id."'");

	$modules = $wpdb->get_results( "SELECT * FROM course_modules WHERE courses_id = '".$id."'");

	$options = $wpdb->get_results( "SELECT * FROM course_options WHERE courses_id = '".$id."'");

	?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<form method="post" action="">

<div class="container">

  <div class="row" id="pwd-container">

    <div class="col-md-12"><h2><?=$course[0]->name?></h2></div>

    <div class="col-md-12">

<?=$course[0]->desc?>

<h3>Modules</h3>

<?php 

foreach($modules as $module){

	print '- '.$module->name.'<br/>';

}?>

<h3>Dates Available:</h3>

<?php

foreach($options as $option){

	print "<br/>Start: " . $option->start;

	print "<br/>End:" . $option->end;

	print "<br/>Spaces:" . $option->space_avail;

	

	print "<br/><br/><br/>";

}

?>



      </div>   

  </div>     

</div>

</form>

<?php get_footer();

