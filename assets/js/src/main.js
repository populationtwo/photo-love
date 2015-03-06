//(function (window, $, undefined) {

	$(document).ready(function() {

		$("#hero-header").owlCarousel({
			navigation : true, // Show next and prev buttons
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem:true,
			navigationText: ['<i class="icon-left-open"></i>','<i class="icon-right-open"></i>']
		});

	});
	//function init() {
	//	loadPartials();
	//	initCanvasMenu();
	//	filterPosts();
	//	toggleView();
	//	showReplies();
	//	detectIe();
	//}
	//
	//init();

//
//if (Modernizr.touch) {
//	// show the close overlay button
//	$(".close-overlay").removeClass("hidden");
//	// handle the adding of hover class when clicked
//	$(".img").click(function(e){
//		if (!$(this).hasClass("hover")) {
//			$(this).addClass("hover");
//		}
//	});
//	// handle the closing of the overlay
//	$(".close-overlay").click(function(e){
//		e.preventDefault();
//		e.stopPropagation();
//		if ($(this).closest(".img").hasClass("hover")) {
//			$(this).closest(".img").removeClass("hover");
//		}
//	});
//} else {
	// handle the mouseenter functionality
	$(".photo").mouseenter(function(){
		$(this).addClass("hover");
	})
		// handle the mouseleave functionality
		.mouseleave(function(){
			$(this).removeClass("hover");
		});
//}
//})( window, jQuery, undefined );