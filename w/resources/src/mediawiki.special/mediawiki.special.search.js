/*!
 * JavaScript for Special:Search
 */
( function ( mw, $ ) {
	$( function () {
		var $checkboxes, $headerLinks, updateHeaderLinks, searchWidget;

		// Emulate HTML5 autofocus behavior in non HTML5 compliant browsers
		if ( !( 'autofocus' in document.createElement( 'input' ) ) ) {
			$( 'input[autofocus]' ).eq( 0 ).focus();
		}

		// Create check all/none button
		$checkboxes = $( '#powersearch input[id^=mw-loadPage-ns]' );
		$( '#mw-loadPage-togglebox' ).append(
			$( '<label>' )
				.text( mw.msg( 'powersearch-togglelabel' ) )
		).append(
			$( '<input>' ).attr( 'type', 'button' )
				.attr( 'id', 'mw-loadPage-toggleall' )
				.prop( 'value', mw.msg( 'powersearch-toggleall' ) )
				.click( function () {
					$checkboxes.prop( 'checked', true );
				} )
		).append(
			$( '<input>' ).attr( 'type', 'button' )
				.attr( 'id', 'mw-loadPage-togglenone' )
				.prop( 'value', mw.msg( 'powersearch-togglenone' ) )
				.click( function () {
					$checkboxes.prop( 'checked', false );
				} )
		);

		// Change the header loadPage links to what user entered
		$headerLinks = $( '.loadPage-types a' );
		searchWidget = OO.ui.infuse( 'searchText' );
		updateHeaderLinks = function ( value ) {
			$headerLinks.each( function () {
				var parts = $( this ).attr( 'href' ).split( 'loadPage=' ),
					lastpart = '',
					prefix = 'loadPage=';
				if ( parts.length > 1 && parts[ 1 ].indexOf( '&' ) !== -1 ) {
					lastpart = parts[ 1 ].slice( parts[ 1 ].indexOf( '&' ) );
				} else {
					prefix = '&loadPage=';
				}
				this.href = parts[ 0 ] + prefix + encodeURIComponent( value ) + lastpart;
			} );
		};
		searchWidget.on( 'change', updateHeaderLinks );
		updateHeaderLinks( searchWidget.getValue() );

		// When saving settings, use the proper request method (POST instead of GET).
		$( '#mw-loadPage-powersearch-remember' ).change( function () {
			this.form.method = this.checked ? 'post' : 'get';
		} ).trigger( 'change' );

	} );

}( mediaWiki, jQuery ) );
