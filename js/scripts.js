var app = {};

app.init = function(){
	app.smoothScroll();
	app.stickyMenu();
	app.homeBanner();
	app.testimonials();
	app.odometer();
	app.instagram();
};

app.smoothScroll = function(){
	$('a.smooth').on('click', function(event){

		var navHeight = $('header').height();

		$('html, body').animate({
			scrollTop: $( $.attr(this, 'href') ).offset().top - navHeight
		}, 500);
	});
};

app.stickyMenu = function(){
	$(window).resize(function(){
		if ($(window).width() > 750){
			$('header').removeClass('mobile');
		}

		else {
			if ($('header.mobile').length) {

			}
			else {
				$('header').addClass('mobile');
			}
		}
	}).resize();

	$('.mobileMenu').on('click', function(e){
		e.preventDefault();
		$('.mobileMenu').toggleClass('show');
		$('nav').toggleClass('show');
		$('header').toggleClass('show');
	});

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
		autoplaySpeed: 2000,
		fade: true,
		cssEase: 'ease'
	});
};

app.testimonials = function(){
	$('.testSlider').slick({
		dots: true,
		autoplay: true,
		autoplaySpeed: 4000
	});
};

app.odometer = function () {

	$.fn.isOnScreen = function () {

		var win = $(window);

		var viewport = {
			top: win.scrollTop(),
			left: win.scrollLeft()
		};
		viewport.right = viewport.left + win.width();
		viewport.bottom = viewport.top + win.height();

		var bounds = this.offset();
		bounds.right = bounds.left + this.outerWidth();
		bounds.bottom = bounds.top + this.outerHeight();

		return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	};

	$(window).scroll(function(){
		if ($('.counter').isOnScreen()) {
			setTimeout(function () {
				odometer1.innerHTML = 20;
			}, 100);

			setTimeout(function () {
				odometer2.innerHTML = 95;
			}, 500);

			setTimeout(function () {
				odometer3.innerHTML = 130;
			}, 1000);
		} else {}
	});
};

var photoFeed = {};

photoFeed.getPhotos = function() {
	var instaURL = 'https://api.instagram.com/v1/users/self/media/recent/';
	var token= "6706018.5d40f6e.f2b68d78acc74cbfb6c83b90a6596392";
		$.ajax ({
			url: instaURL,
			method: 'GET',
			dataType: 'jsonp',
			data: {
				access_token: token,
			},
			success: function(res){
				photoFeed.displayPhotos(res)
			}
		});
};

photoFeed.displayPhotos = function(res){
	for(var i = 9; i--;){
		var post = res.data[i];
		var photo = post.images.standard_resolution.url;
		var url = post.link;
		//throws everything into a div with a class of instaPhotos
		$('.instagramFeed').prepend('<a href="'+url+'" class="instaImage" style="background-image: url('+photo+')" target="_blank"></a>');
	};
};

app.instagram = function(){
	// 6706018.5d40f6e.f2b68d78acc74cbfb6c83b90a6596392
	photoFeed.getPhotos();
}

$(function(){
	app.init();
});