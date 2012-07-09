$(document).ready(function() {

	// Accordion Demo #2
	$('#accordion2').accordionza({
		autoPlay: true,
		autoRestartDelay: 3000,
		onSlideClose: function() {
			$(this).children('p').stop(true).animate({left: 320, opacity: 0}, 500);
		},
		onSlideOpen: function() {
			var properties = {left: 160, opacity: 1};
			var duration = 500;
			var easing = 'easeOutBack';
			$(this).children('p').stop(true)
				.filter(':eq(0)').animate({opacity: 0}, 000).animate(properties, duration, easing).end()
				.filter(':eq(1)').animate({opacity: 0}, 250).animate(properties, duration, easing).end()
				.filter(':eq(2)').animate({opacity: 0}, 500).animate(properties, duration, easing);
		},
		slideDelay: 3000,
		slideEasing: 'easeOutCirc',
		slideSpeed: 250,
		slideTrigger: 'mouseover',
		slideWidthClosed: 160
	});

});
