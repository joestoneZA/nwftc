jQuery(document).ready(function($){

	$('.nav-icon').click(function(){
		$(this).toggleClass('active');
		$('nav.menu').toggleClass('active');
	});
	$("ul.menu > .menu-item-has-children > a").after("<i class='nav-dropdown fa fa-caret-down' aria-hidden='true'></i>");
	$('nav.menu ul li i.fa').click(function(){
		$(this).siblings('ul.sub-menu').slideToggle();
		$(this).toggleClass('active');
	});

});