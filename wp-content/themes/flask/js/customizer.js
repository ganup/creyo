/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	//Title Font
	wp.customize( 'flask_settings[title_font_family]', function( value ) {
		value.bind( function( to ) {
			var titleFont = to.replace(/\:.+/i, '').replace('+',' ');
			if ( $('head #customizer-title-font-family').length < 1 )
				$( 'head' ).append('<link rel="stylesheet" id="customizer-title-font-family">');
			$("#customizer-title-font-family").attr('href', 'http://fonts.googleapis.com/css?family=' + to);
			$("h1, h2, h3, h4, h5, h6").css({ 'font-family' : titleFont });
		} );
	} );
	//Body Font
	wp.customize( 'flask_settings[body_font_family]', function( value ) {
		value.bind( function( to ) {
			var bodyFont = to.replace(/\:.+/i, '').replace('+',' ');
			if ( $('head #customizer-body-font-family').length < 1 )
				$( 'head' ).append('<link rel="stylesheet" id="customizer-body-font-family">');
			$("#customizer-body-font-family").attr('href', 'http://fonts.googleapis.com/css?family=' + to);
			$("body, button, input, select, textarea").css({ 'font-family' : bodyFont });
		} );
	} );
	//Font Size
	wp.customize( 'flask_settings[font_size]', function( value ) {
		value.bind( function( to ) {
			$( 'body, button, input, select, textarea' ).css({ 'font-size' : to });
			$(".site-logo").css({ 'max-height' : $(".site-branding").innerHeight() * .9 });
		} );
	} );
	//Hyphens
	wp.customize( 'flask_settings[hyphens]', function( value ) {
		value.bind( function( to ) {
			if ( to == '1' ) {
				$( '.page-content, .entry-content, .entry-summary, .textwidget' ).css({ '-webkit-hyphens' : 'auto', '-moz-hyphens' : 'auto', 'hyphens' : 'auto', 'word-wrap' : 'break-word' });
			} else {
				$( '.page-content, .entry-content, .entry-summary, .textwidget' ).css({ '-webkit-hyphens' : 'manual', '-moz-hyphens' : 'manual', 'hyphens' : 'manual', 'word-wrap' : 'normal' });
			}
		} );
	} );
	//Sidebar Left or Right
	wp.customize( 'flask_settings[sidebar_side]', function( value ) {
		value.bind( function( to ) {
			if ( to == 'left' ) {
				$("#primary").css({ 'float': 'right', 'margin-right' : 'auto', 'margin-left' : '5%' });
				$("#secondary").css({ 'float' : 'left', 'display' : 'block' });
			} else if ( to == 'right' ) {
				$("#primary").css({ 'float': 'left', 'margin-right' : '5%', 'margin-left' : 'auto' });
				$("#secondary").css({ 'float' : 'right', 'display' : 'block' });
			} else if ( to == 'none' ) {
				$("#primary").css({ 'float': 'none', 'margin-right' : 'auto', 'margin-left' : 'auto' });
				$("#secondary").css({ 'float' : 'none', 'display' : 'none' });				
			}
		} );
	} );
	//Hide Site Footer
	wp.customize( 'flask_settings[hide_footer]', function( value ) {
		value.bind( function( to ) {
			if ( to == '1' ) {
				$('#colophon').hide();
			} else {
				$('#colophon').show();
			}
		} );
	} );
	// Site License Text
	wp.customize( 'flask_settings[site_license]', function( value ) {
		value.bind( function( to ) {
			$( '.site-license' ).html( to );
		} );
	} );
} )( jQuery );
