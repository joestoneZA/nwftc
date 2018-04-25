jQuery(document).ready(function($){

(function() {
	$('select.material').each(function() {
		$(this).hide();
		makeElement($(this));
	});

	function makeElement(select) {
		var
		$div = $('<div />', {class:'ui-select'}).insertAfter(select),
		$nav = $('<span />').click(function() {
			$(this).parent().toggleClass('open');
		}).appendTo($div),
		$el = $('<ul />').appendTo($div);
		select.find('option').map(function(i) {
			
			var li = $('<li />').append($(this).text());
				li.click(onSelect.bind($div, li, $(this).val(), select, $nav));
			if($(this).attr('selected')) {
				li.addClass('selected');
			}
			var delay = i * 100 + 'ms';
			li.css({
				'-webkit-transition-delay': delay,
		        '-moz-transition-delay': delay,
		        '-o-transition-delay': delay,
		        'transition-delay': delay
			});
			$el.append(li);
		});
		var selected = $el.find('li.selected');
			selected = selected.length ? selected.html() : $el.find('li:first-child').addClass('selected').html();
		$nav.html(selected);
		// addAnimateDelay($el);
	}

	function onSelect(li, value, select, $nav) {
		this.removeClass('open');
		li.addClass('selected').siblings().removeClass('selected');
		select.val(value).trigger('change');
		$nav.html(li.html());
	}
})();

$('.feedback-home .inner .home-testimonial-carousel').slick({
	autoplay:true,
	autoplaySpeed:6000,
	fade:true,
	infinite: true,
	slidesToShow: 1,
	speed:3000
});

$(function() {
  var todayDate = moment().startOf('day');
  var YM = todayDate.format('YYYY-MM');
  var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
  var TODAY = todayDate.format('YYYY-MM-DD');
  var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay,listWeek'
    },
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    navLinks: true,
    events: [
      {
        title: 'All Day Event',
        start: YM + '-01'
      },
      {
        title: 'Long Event',
        start: YM + '-07',
        end: YM + '-10'
      },
      {
        id: 999,
        title: 'Repeating Event',
        start: YM + '-09T16:00:00'
      },
      {
        id: 999,
        title: 'Repeating Event',
        start: YM + '-16T16:00:00'
      },
      {
        title: 'Conference',
        start: YESTERDAY,
        end: TOMORROW
      },
      {
        title: 'Meeting',
        start: TODAY + 'T10:30:00',
        end: TODAY + 'T12:30:00'
      },
      {
        title: 'Lunch',
        start: TODAY + 'T12:00:00'
      },
      {
        title: 'Meeting',
        start: TODAY + 'T14:30:00'
      },
      {
        title: 'Happy Hour',
        start: TODAY + 'T17:30:00'
      },
      {
        title: 'Dinner',
        start: TODAY + 'T20:00:00'
      },
      {
        title: 'Birthday Party',
        start: TOMORROW + 'T07:00:00'
      },
      {
        title: 'Click for Google',
        url: 'http://google.com/',
        start: YM + '-28'
      }
    ]
  });
});

	$('.team-members .item').click(function(){
		$('.team-members .item .inner').removeClass('active');
		$('.team-members .team-row').removeClass('active');
		$(this).closest('.team-row').addClass('active');
		$(this).children('.inner').addClass('active');
	});
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
    	$('.news-listing .item, .similar-posts .items .item,.feedback-listing .item .inner .content, .home .feedback-home .inner, .home .news-home .inner').matchHeight();
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