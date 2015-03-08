(function (window, $, undefined) {

	$( document ).ready( function () {

		var $heroHeader = $( document.getElementById( 'hero-header' ) ),
			$mainMenuLink = $( document.getElementById( 'site-navigation' ) ).find( ' a[href^="#"]' ),
			$mainMenuAllLinks = $( document.getElementById( 'site-navigation' ) ).find( 'a' ),
			$porfolioCloseOverlay = $( '.close-overlay' ),
			$portfolioPhoto = $( '.photo' ),
			$graph = $( '.skill' );


		/**
		 * Initiate hero slider
		 */
		function initSlider() {
			$heroHeader.owlCarousel( {
				navigation     : true, // Show next and prev buttons
				slideSpeed     : 300,
				paginationSpeed: 400,
				singleItem     : true,
				navigationText : ['<i class="icon-left-open"></i>', '<i class="icon-right-open"></i>']
			} );
		}

		/**
		 * Scroll navigation
		 */
		function scrollNavigation() {
			var document = $( document );

			//document.scroll( onPageScroll );
			$mainMenuLink.on( 'click', function (e) {
				e.preventDefault();
				document.off( "scroll" );
				$mainMenuAllLinks.each( function () {
					$( this ).removeClass( 'active' );
				} );
				$( this ).addClass( 'active' );

				var target = this.hash;
				//menu = target;
				$target = $( target );
				$( 'html, body' ).stop().animate( {
					'scrollTop': $target.offset().top + 2
				}, 400, 'swing', function () {
					//window.location.hash = target;
					//$( document ).on( "scroll", onPageScroll );
				} );
			} );
		}

		//function onPageScroll(event){
		//	var scrollPos = $(document).scrollTop();
		//	$('#site-navigation a').each(function () {
		//		var currLink = $(this);
		//		var refElement = $(currLink.attr("href"));
		//		if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
		//			$('#site-navigation a').removeClass("active");
		//			currLink.addClass("active");
		//		}
		//		else{
		//			currLink.removeClass("active");
		//		}
		//	});
		//}


		/**
		 * Animate skills graph
		 */

		function checkElementInViewport(elem) {
			var $el = $( elem ),
			// Get the scroll position.
				scrollElem = ((navigator.userAgent.toLowerCase().indexOf( 'webkit' ) != -1) ? 'body' : 'html'),
				$viewportTop = $( scrollElem ).scrollTop(),
				viewportBottom = $viewportTop + $( window ).height(),
			// Get the position of the element on the page.
				elemTopPosition = Math.round( $el.offset().top ),
				elemBottomPosition = elemTopPosition + $el.height();

			return ( (elemBottomPosition > $viewportTop) && (elemTopPosition < viewportBottom));
		}

		// Check if it's time to start the animation.
		function checkGraphAnimation() {
			if ($graph.hasClass( 'anim' )) return;
			if (checkElementInViewport( '#about' )) {
				$graph.addClass( 'anim' );
			}
		}

		/**
		 * Animate portfolio hover
		 */

		function imageHover() {
			if (Modernizr.touch) {

				// Show the close overlay button on mobile device
				$porfolioCloseOverlay.removeClass( 'hidden' );

				// Add hover class when tapped / clicked
				$portfolioPhoto.click( function (e) {
					e.preventDefault();
					if (!$( this ).hasClass( 'hover' )) {
						$( this ).addClass( 'hover' );
					}
				} );

				// handle the closing of the overlay
				$porfolioCloseOverlay.click( function (e) {
					e.preventDefault();
					e.stopPropagation();
					if ($( this ).closest( '.photo' ).hasClass( 'hover' )) {
						$( this ).closest( '.photo' ).removeClass( 'hover' );
					}
				} );

			} else {

				$portfolioPhoto.hover( function () {
					$( this ).addClass( 'hover' );
				}, function () {
					$( this ).removeClass( 'hover' );
				} );

			}
		}


		// Capture scroll events
		$( window ).scroll( function () {
			checkGraphAnimation();
			//onPageScroll();
		} );


		function init() {
			initSlider();
			scrollNavigation();
			imageHover();
		}

		init();
	} );


})( window, jQuery, undefined );

