jQuery(document).ready(function($){

	$('.book-online-nav').attr('data-featherlight','#book-iframe');

	$('.full-width-home-images').slick({
		arrows:false,
		infinite:true,
		speed:2500,
		autoplay:true,
		fade:true,
		pauseOnHover:false,
		pauseOnFocus:false
	});
	$('a.gallery').featherlightGallery({
		previousIcon: '«',
		nextIcon: '»',
		galleryFadeIn: 300,
		openSpeed: 300
	});
	$('.why-book-trigger').click(function(){
		$('.why-book-content').addClass('active');
		$('.footer-images-close').addClass('active');
	});
	$('.footer-book-links a.link').click(function(){
		$('.footer-book').addClass('active');
		$('.footer-images-close').addClass('active');
	});
	$('.footer-book').hover(
		function(){ 
			$(this).addClass('active');
			$('.footer-images-close').addClass('active');
			},
		function(){
			$(this).removeClass('active');
			$('.why-book-content').removeClass('active');
			$('.footer-images-close').removeClass('active');
		}
	);

	$('.footer-images-close').click(function(){
		$('.footer-book').removeClass('active');
		$('.footer-images-close').removeClass('active');
		$('.why-book-content').removeClass('active');
	});

	$('.accordion-title').first().addClass('ui-state-active');
	$('.accordion-content').first().css('display','block');

	$('.accordion-title').click(function(){
		$(this).toggleClass('ui-state-active');
		$(this).next('.accordion-content').slideToggle();
		$('.place-images').slick('setPosition');
	});

	$('.place-images').slick({
		autoplay: true,
		autoplaySpeed: 4000,
		arrows: false,
		centerMode: true,
		centerPadding: '80px',
		pauseOnHover: false,
		pauseOnFocus: false,
		infinite: true,
		slidesToShow: 3,
		speed: 1000,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					centerMode: false,
					slidesToShow: 1,
				}
			},
		]
	});


	$('.room-gallery').slick({
		arrows:false,
		infinite:true,
		asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
		arrows:false,
		centerMode:true,
		centerPadding:'80px',
		infinite:true,
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.room-gallery',
		focusOnSelect: true,
		responsive: [
	    {
	      breakpoint: 500,
	      settings: {
	        slidesToShow: 1,
	      }
	    },
	  ]
	});

	$('.footer-images').slick({
		autoplay:true,
		autoplaySpeed:4000,
		arrows:true,
		draggable:false,
		infinite:true,
		slidesToShow:6,
		speed:500,
		responsive: [
	    {
	      breakpoint: 992,
	      settings: {
	        slidesToShow: 4,
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 3,
	      }
	    }
	  ]
	});
	$(function() {
		$('.rooms-block .item .inner, .post-type-archive-rooms .rooms .item').matchHeight();
	});
	$('.appear').viewportChecker({
		classToAdd: 'animated fadeInUp',
		offset: 0
	});
	$('i.nav-icon').click(function(){
		$(this).toggleClass('active');
		$('nav.menu').toggleClass('active');
	});
	$(function() {
	  $('a[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 750);
	        return false;
	      }
	    }
	  });
	});

	$(function(){
	    // scroll is still position
		var scroll = $(document).scrollTop();
		var headerHeight = $('header.header').outerHeight();
		//console.log(headerHeight);
		$(window).scroll(function() {
			// scrolled is new position just obtained
			var scrolled = $(document).scrollTop();
			if(scrolled < 30){
					$('header.header').removeClass('header-down');
					$('header.header').removeClass('header-up');

				} else {				

			    if (scrolled > scroll){
			        // scrolling down
					$('header.header').removeClass('header-down');
					$('header.header').addClass('header-up');
					$('nav.menu').addClass('nav-up');
			      } else {
					//scrolling up
					$('header.header').removeClass('header-up');
					$('header.header').addClass('header-down');
					$('nav.menu').removeClass('nav-up');
			    }
			}
			scroll = $(document).scrollTop();	
		 });
	 });

});