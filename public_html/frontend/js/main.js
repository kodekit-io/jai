$(document).ready(function() {
	var w = $('#themoment ul li a').width();
	$('#themoment ul li a').height(w);

	$('.ja-nav-main>li>a').on('click',function(){
		if(!$('.ja-nav-sub').hasClass('uk-hidden')) {
			$('.ja-nav-sub').parent('li').addClass("active");
		} else {
			$('.ja-nav-sub').parent('li').removeClass("active");
		}
	});
});
