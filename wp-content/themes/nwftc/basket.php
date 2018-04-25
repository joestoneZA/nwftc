<?php /* Template name: Basket */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$basket_total = 0.00;
global $wpdb;
if(isset($_REQUEST['add'])){
	$existing = $wpdb->get_results( "SELECT id FROM baskets WHERE user = '".session_id()."' AND course_option_id = '".$_REQUEST['add']."'");
	if(count($existing) == 0){
		$wpdb->insert('baskets', array('user' => session_id(), 'course_option_id' => $_REQUEST['add'], 'date' => date("Y-m-d H:i:s")),array('%s','%s', '%s'));
	}
	wp_redirect('/basket');
	exit;
}
if(isset($_REQUEST['remove'])){
	 $wpdb->query( 
 $wpdb->prepare( 
    "
            DELETE FROM baskets
     WHERE id = %d",
        $_REQUEST['remove']
    )
);
wp_redirect('/basket');
	exit;
}
$basket_data = $wpdb->get_results( "SELECT b.id,c.name,co.`start`,co.`end`,co.cost FROM baskets b JOIN course_options co ON co.id = b.course_option_id JOIN courses c ON c.id = co.courses_id WHERE b.user = '".session_id()."' ORDER BY b.date ASC");
get_header();
?>
<?php if(isset($basket_data) && count($basket_data)){
	foreach($basket_data as $basket_item){
		$basket_total += $basket_item->cost;?>
Course: <?=$basket_item->name?>, Start: <?=$basket_item->start?>, End: <?=$basket_item->end?>, Cost: <?=$basket_item->cost?> <a href="/basket?remove=<?=$basket_item->id?>">Remove from basket</a> &nbsp; &nbsp; <a href="#">Book</a><br/>
<?php }?><br/>
Total Basket Cost: £<?=$basket_total?>
<?php }else{?>
You have no items in your basket. 
<?php } ?>
<?php get_footer(); ?>