(function (window, $, undefined) {

	$( document ).ready( function () {
		//Declare all variables
		var bodyElement = document.body,
			$heroHeader = $( document.getElementById( 'hero-header' ) ),
			$mainMenuLink = $( document.getElementById( 'site-navigation' ) ).find( ' a[href^="#"]' ),
			$mainMenuAllLinks = $( document.getElementById( 'site-navigation' ) ).find( 'a' ),
			$portfolioCloseOverlay = $( '.close-overlay' ),
			$portfolioPhoto = $( '.photo' ),
			$graph = $( '.skill' ),
			toggleMobileMenu = document.getElementById( 'js-mobile-menu' ),
			contentWrap = document.querySelector( '.content-wrap' ),
			numberAnimationIsExecuted = false,
			isOpen = false;


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

			$mainMenuLink.on( 'click', function (e) {
				e.preventDefault();
				document.off( "scroll" );
				$mainMenuAllLinks.each( function () {
					$( this ).removeClass( 'active' );
				} );
				$( this ).addClass( 'active' );

				var target = this.hash;
				$target = $( target );
				$( 'html, body' ).stop().animate( {
					'scrollTop': $target.offset().top + 2
				}, 400, 'swing' );
			} );
		}


		/**
		 * Check if Element is in viewport
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

		/**
		 * Animate skills graph
		 */
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
				$portfolioCloseOverlay.removeClass( 'hidden' );

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

		/**
		 * Animate stats number
		 */

		function checkAnimateStats() {
			var numberShutters = $( '.animate-number-shutters' ),
				numberClients = $( '.animate-number-clients' ),
				numberProjects = $( '.animate-number-projects' ),
				numberHours = $( '.animate-number-hours' );

			if (checkElementInViewport( '#stats-animate-number' )) {  // check if the #stat section is in viewport

				if (!numberAnimationIsExecuted) { // check if the number has been animated
					numberAnimationIsExecuted = true;
					numberShutters.animateNumber( {
						number: 86,
						easing: 'easeInOut'
					}, 1000 );
					numberClients.animateNumber( {
						number: 251,
						easing: 'easeInOut'
					}, 1100 );
					numberProjects.animateNumber( {
						number: 658,
						easing: 'easeInOut'

					}, 1300 );
					numberHours.animateNumber( {
						number: 16,
						easing: 'easeInOut'
					}, 900 );
					console.log( 'numberanimated' );
				}

			}
		}

		/**
		 * Mobile Menu
		 */

		function toggleCanvasMenu() {
			if (isOpen) {
				classie.remove( bodyElement, 'ss-mobile-menu-active' );
			}
			else {
				classie.add( bodyElement, 'ss-mobile-menu-active' );
			}
			isOpen = !isOpen;
		}

		function initCanvasMenu() {
			toggleMobileMenu.addEventListener( 'click', toggleCanvasMenu );
			contentWrap.addEventListener( 'click', function (e) {
				var target = e.target;
				if (isOpen && target !== toggleMobileMenu) {
					toggleCanvasMenu();
				}
			} );
		}


		// Capture scroll events
		$( window ).scroll( function () {
			checkGraphAnimation();
			checkAnimateStats();
		} );


		function init() {
			initCanvasMenu();
			initSlider();
			scrollNavigation();
			imageHover();
		}

		init();
	} );


})( window, jQuery, undefined );