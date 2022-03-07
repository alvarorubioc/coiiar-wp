/* eslint-disable no-undef */
/*global $ */
$ = jQuery;
jQuery( document ).ready( function() {
	/**
	 * Filters | Blog
	 */

	$( '.filters-bar .dropdown.categories' ).on( 'click', function( e ) {
		e.preventDefault();
		$( this ).toggleClass( 'active' );
		$( '.filters-wrapper .categories' ).slideToggle( 200 );
		$( '.filters-wrapper .tags' ).css( 'display', 'none' );
		$( '.filters-wrapper .tags-2' ).css( 'display', 'none' );
		$( '.dropdown.tags' ).removeClass( 'active' );
		$( '.dropdown.tags-2' ).removeClass( 'active' );
	} );

	$( '.filters-bar .dropdown.tags' ).on( 'click', function( e ) {
		e.preventDefault();
		$( this ).toggleClass( 'active' );
		$( '.filters-wrapper .tags' ).slideToggle( 200 );
		$( '.filters-wrapper .categories' ).css( 'display', 'none' );
		$( '.filters-wrapper .tags-2' ).css( 'display', 'none' );
		$( '.dropdown.categories' ).removeClass( 'active' );
		$( '.dropdown.tags-2' ).removeClass( 'active' );
	} );

	$( '.filters-bar .dropdown.tags-2' ).on( 'click', function( e ) {
		e.preventDefault();
		$( this ).toggleClass( 'active' );
		$( '.filters-wrapper .tags-2' ).slideToggle( 200 );
		$( '.filters-wrapper .categories' ).css( 'display', 'none' );
		$( '.filters-wrapper .tags' ).css( 'display', 'none' );
		$( '.dropdown.categories' ).removeClass( 'active' );
		$( '.dropdown.tags' ).removeClass( 'active' );
	} );
} );