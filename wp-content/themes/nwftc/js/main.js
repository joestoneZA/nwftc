jQuery(document).ready(function($){

	$(".set > a").on("click", function() {
		if ($(this).hasClass("active")) {
			$(this).removeClass("active");
			$(this).siblings(".content").slideUp(200);
			$(".set > a i").removeClass("fa-minus").addClass("fa-plus");
		} else {
			$(".set > a i").removeClass("fa-minus").addClass("fa-plus");
			$(this).find("i").removeClass("fa-plus").addClass("fa-minus");
			$(".set > a").removeClass("active");
			$(this).addClass("active");
			$(".content").slideUp(200);
			$(this).siblings(".content").slideDown(200);
		}
	});
	$(function () {
    	$('.news-listing .item, .similar-posts .items .item').matchHeight();
    });
	$(function() {
		var selectedClass = "";
		$(".hide-checkbox").click(function(){ 
			selectedClass = $(this).attr("data-rel"); 
	     $(".items").fadeTo(100, 0.1);
		$(".items .item").not("."+selectedClass).fadeOut().removeClass('scale-anm');
	    setTimeout(function() {
	      $("."+selectedClass).fadeIn().addClass('scale-anm');
	      $(".items").fadeTo(300, 1);
	    }, 300); 
			
		});
	});
	var buttons = document.querySelectorAll('.mdc-button, .mdc-fab');
	for (var i = 0, button; button = buttons[i]; i++) {
	  mdc.ripple.MDCRipple.attachTo(button);
	}

	var nodes = document.querySelectorAll('.mdc-icon-toggle');
	for (var i = 0, node; node = nodes[i]; i++) {
	  mdc.iconToggle.MDCIconToggle.attachTo(node);
	}

	var checkboxes = document.querySelectorAll('.mdc-checkbox');
	for (var i = 0, checkbox; checkbox = checkboxes[i]; i++) {
	  new mdc.checkbox.MDCCheckbox(checkbox);
	}

	var radios = document.querySelectorAll('.mdc-radio');
	for (var i = 0, radio; radio = radios[i]; i++) {
	  new mdc.radio.MDCRadio(radio);
	}

	var interactiveListItems = document.querySelectorAll('.mdc-list-item');
	for (var i = 0, li; li = interactiveListItems[i]; i++) {
	  mdc.ripple.MDCRipple.attachTo(li);
	  // Prevent link clicks from jumping demo to the top of the page
	  li.addEventListener('click', function(evt) {
	    evt.preventDefault();
	  });
	}
	$('.footer-images').slick({
		autoplay:true,
		autoplaySpeed:4000,
		arrows:false,
		pauseOnHover:false,
		pauseOnFocus:false,
		slidesToShow:5,
		responsive: [
		{
		  breakpoint: 1200,
		  settings: {
		    slidesToShow:5
		  }
		},
		{
		  breakpoint: 992,
		  settings: {
		    slidesToShow: 4
		  }
		},
		{
		  breakpoint: 768,
		  settings: {
		    slidesToShow: 3
		  }
		}
		]
	});
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