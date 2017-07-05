var app = {};

app.init = function(){
	app.stickyMenu();
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

$(function(){
	app.init();
});