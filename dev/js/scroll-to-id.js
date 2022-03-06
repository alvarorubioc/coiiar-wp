/* eslint-disable no-undef */
/*global $ */
$ = jQuery;
jQuery( document ).ready( function() {
	$( '.entry-title a[href*="#"]' ).on( 'click', function( e ) {
		e.preventDefault();

		$( 'html, body' ).animate(
			{
				scrollTop: $( $( this ).attr( 'href' ) ).offset().top - 40,
			},
			300,
			'linear'
		);
	} );
} );
