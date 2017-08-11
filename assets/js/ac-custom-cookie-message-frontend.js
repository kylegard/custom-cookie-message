/**
 * Author: Johan Sylvan
 * Date: 2016-10-10.
 */

//Debounce from David Walsh https://davidwalsh.name/javascript-debounce-function
function debounce( func, wait, immediate ) {
	var timeout;
	return function () {
		var context = this, args = arguments;
		var later = function () {
			timeout = null;
			if ( ! immediate ) {
				func.apply( context, args );
			}
		};
		var callNow = immediate && ! timeout;
		clearTimeout( timeout );
		timeout = setTimeout( later, wait );
		if ( callNow ) {
			func.apply( context, args );
		}
	};
};


jQuery( document ).ready( function ( $ ) {
	// Hide Header on on scroll
	var didScroll;
	var lastScrollTop = 0;
	var lastScrollBot = 0;
	var scrollPosition = $( this ).scrollTop();
	var delta = 50;
	var navbarHeight = $( '#custom-cookie-message-container' ).outerHeight();
	var cookieContainer = $( '#custom-cookie-message-container' );
	var slideAnimation = 400;

	var storage = (
		function () {
			var uid = new Date;
			var storage;
			var result;
			try {
				(
					storage = window.localStorage
				).setItem( uid, uid );
				result = storage.getItem( uid ) == uid;
				storage.removeItem( uid );
				return result && storage;
			} catch ( exception ) {
			}
		}()
	);

	if ( storage ) {
		var fallback = storage.getItem( "ac-cookie-fallback" );
		if ( fallback !== "fallback" ) {
			$( '#custom-cookie-message-container' ).slideDown( slideAnimation, function () {
				$( this ).find( '.form-control' ).focus();
			} );
		}
	}
	else {
		$( '#custom-cookie-message-container' ).slideDown( slideAnimation, function () {
			$( this ).find( '.form-control' ).focus();
		} );
	}

	// $( '#cookies-button-ok' ).click( function ( e ) {
	// 	e.preventDefault();
	// 	//var ajaxURL = window.location.protocol + "//" + window.location.host + '/wp-admin/admin-ajax.php';
	// 	$.ajax( {
	// 		//url : ajaxURL,
	// 		url: MyAjax.ajaxurl,
	// 		type: 'GET',
	// 		data: {
	// 			action: 'setcookie',
	// 		},
	// 	} )
	// 	 .done( function ( data ) {
	// 		 if ( storage ) {
	// 			 storage.setItem( "ac-cookie-fallback", "fallback" );
	// 		 }
	//
	// 		 $( '#custom-cookie-message-container' ).hide();
	// 	 } )
	// 	 .fail( function () {
	// 	 } )
	// 	 .always( function () {
	// 	 } );
	// } );

	$('.container-cookies').on('click', '.cookies-button-ok', function(e){
	e.preventDefault();

	 	$('#cookies-settings').modal('show');
	});
} );
