$(document).ready(function() {
//	$(".btn-nav").on('click', function(event) {
//		$(this).toggleClass("active");
//		$(".wrapper").toggleClass("wrapper--change");
//	});
	//
	js_pscroll();
});
//
function js_pscroll(){
	$('.scrollbar').each(function(){
		var ps = new PerfectScrollbar(this);
		$(window).on('resize', function(){
			ps.update();
		})
	});
}
