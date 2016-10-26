$(document).ready(function() {
	var w = $('#themoment ul li a').width();
	$('#themoment ul li a').height(w);

	$('.ja-nav-main li').on('click','a',function(){
		if(!$('.ja-nav-sub').hasClass('uk-hidden')) {
			$(this).addClass("active");
		} else {
			$(this).removeClass("active");
		}
	});
});
