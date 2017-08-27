var app = {};

app.init = function(){
	app.smoothScroll();
	app.stickyMenu();
	app.homeBanner();
	app.testimonials();
	app.instagram();
};

app.smoothScroll = function(){
	// Select all links with hashes
	$('a[href*="#"]')
	  // Remove links that don't actually link to anything
	  .not('[href="#"]')
	  .not('[href="#0"]')
	  .click(function(event) {
		// On-page links
		if (
		  location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
		  && 
		  location.hostname == this.hostname
		) {
		  // Figure out element to scroll to
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
		  // Does a scroll target exist?
		  if (target.length) {
			// Only prevent default if animation is actually gonna happen
			event.preventDefault();
			$('.mobileMenu').removeClass('show');
			$('nav').removeClass('show');
			$('header').removeClass('show');
			$('body').removeClass('menuShow');
			var navHeight = $('header').height();

			$('html, body').animate({
			  scrollTop: target.offset().top - navHeight
			}, 1000, function() {
			  // Callback after animation
			  // Must change focus!
			  var $target = $(target);
			  $target.focus();
			  if ($target.is(":focus")) { // Checking if the target was focused
				return false;
			  } else {
				$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
				$target.focus(); // Set focus again
			  };
			});
		  }
		}
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
		$('body').toggleClass('menuShow');
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
		autoplaySpeed: 3000,
		fade: true,
		cssEase: 'ease'
	});
};

app.testimonials = function(){
	$('.testSlider').slick({
		dots: true,
		autoplay: true,
		autoplaySpeed: 5000
	});
};

app.clientLogos = function(){
	$('.clientLogo').clone().insertAfter('.clientLogo:last-child');

	var totalWidth = 0;
	for (var i = 0; i < $('.clientLogo').length; i++){
		totalWidth += $('.clientLogo')[i].offsetWidth;
	}
	$('.clientLogos').css('width', totalWidth);

	function marquee(a, b) {
		var width = b.width();
		var start_pos = 0;
		var end_pos = -width;

		function scroll() {
			if (b.position().left <= -width) {
				b.css('left', start_pos);
				scroll();
			}
			else {
				time = (parseInt(b.position().left, 10) - end_pos) *
					(100000 / (start_pos - end_pos));
				b.animate({
					'left': -width
				}, time, 'linear', function() {
					scroll();
				});
			}
		}

		b.css({
			'width': width,
			'left': start_pos
		});
		scroll(a, b);
		
		b.mouseenter(function() {
			b.stop();
			b.clearQueue();
		});
		b.mouseleave(function() {
			scroll(a, b);
		});
		
	}

	marquee($('.clientLogosContainer'), $('.clientLogos'));
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

$(window).load(function(){
	app.clientLogos();
});

$(function(){
	app.init();
});