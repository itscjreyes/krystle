var app = {};

app.init = function(){
	app.smoothScroll();
	app.stickyMenu();
	app.homeBanner();
	app.testimonials();
};

app.smoothScroll = function(){
	$('a.smooth').on('click', function(event){
		event.preventDefault();
		var navHeight = $('header').height();

		$('html, body').animate({
			scrollTop: $( $.attr(this, 'href') ).offset().top - navHeight
		}, 500);
	});
};

app.stickyMenu = function(){
	var bannerHeight = $('header').height();

	$(window).scroll(function(){
		if ($(window).scrollTop() > bannerHeight) {
			$('header').addClass('sticky');
		}

		else {
			$('header').removeClass('sticky');
		}
	});
};

app.homeBanner = function(){
	$('.homeBanner').slick({
		dots: true,
		nextArrow: '<button class="arrow-next"><i class="fa fa-angle-right"></i></button>',
		prevArrow: '<button class="arrow-prev"><i class="fa fa-angle-left"></i></button>',
		autoplay: true,
		autoplaySpeed: 5000,
		fade: true,
		cssEase: 'ease'
	});
};

app.testimonials = function(){
	$('.testSlider').slick();
};

$(function(){
	app.init();
});