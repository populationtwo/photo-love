//(function (window, $, undefined) {

	$(document).ready(function() {

		function initSlider() {
			$( "#hero-header" ).owlCarousel( {
				navigation     : true, // Show next and prev buttons
				slideSpeed     : 300,
				paginationSpeed: 400,
				singleItem     : true,
				navigationText : ['<i class="icon-left-open"></i>', '<i class="icon-right-open"></i>']
			} );
		}

		function smoothScroll() {
			$( document ).on( "scroll", onScroll );

			//smoothscroll
			$( 'a[href^="#"]' ).on( 'click', function (e) {
				e.preventDefault();
				$( document ).off( "scroll" );

				$( 'a' ).each( function () {
					$( this ).removeClass( 'active' );
				} );
				$( this ).addClass( 'active' );

				var target = this.hash,
					menu = target;
				$target = $( target );
				$( 'html, body' ).stop().animate( {
					'scrollTop': $target.offset().top + 2
				}, 500, 'swing', function () {
					window.location.hash = target;
					$( document ).on( "scroll", onScroll );
				} );
			} );
		}

		function onScroll(event){
			var scrollPos = $(document).scrollTop();
			$('#site-navigation a').each(function () {
				var currLink = $(this);
				var refElement = $(currLink.attr("href"));
				if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
					$('#menu-center ul li a').removeClass("active");
					currLink.addClass("active");
				}
				else{
					currLink.removeClass("active");
				}
			});
		}



	function init() {
		initSlider();
		smoothScroll();
	//	filterPosts();
	//	toggleView();
	//	showReplies();
	//	detectIe();
	}

	init();
	});

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

