/*! DataTables Bootstrap 5 integration
 * © SpryMedia Ltd - datatables.net/license
 */

(function( factory ){
	if ( typeof define === 'function' && define.amd ) {
		// AMD
		define( ['jquery', 'datatables.net'], function ( $ ) {
			return factory( $, window, document );
		} );
	}
	else if ( typeof exports === 'object' ) {
		// CommonJS
		var jq = require('jquery');
		var cjsRequires = function (root, $) {
			if ( ! $.fn.dataTable ) {
				require('datatables.net')(root, $);
			}
		};

		if (typeof window === 'undefined') {
			module.exports = function (root, $) {
				if ( ! root ) {
					root = window;
				}

				if ( ! $ ) {
					$ = jq( root );
				}

				cjsRequires( root, $ );
				return factory( $, root, root.document );
			};
		}
		else {
			cjsRequires( window, jq );
			module.exports = factory( jq, window, window.document );
		}
	}
	else {
		// Browser
		factory( jQuery, window, document );
	}
}(function( $, window, document ) {
'use strict';
var DataTable = $.fn.dataTable;

/* Set the defaults for DataTables initialisation */
$.extend( true, DataTable.defaults, {
	renderer: 'bootstrap'
} );


/* Default class modification */
$.extend( true, DataTable.ext.classes, {
	container: "dt-container dt-bootstrap5",
	search: {
		input: "dt-input" // Menggunakan class custom
	},
	length: {
		select: "dt-input" // Menggunakan class custom
	},
	processing: {
		container: "dt-processing" // Class custom dari CSS
	},
	layout: {
		row: 'row my-3 justify-content-between',
		cell: 'col-md-auto',
		tableCell: 'col-12',
		start: 'dt-layout-start',
		end: 'dt-layout-end',
	}
} );


/* Brutalist paging button renderer */
DataTable.ext.renderer.pagingButton.bootstrap = function (settings, buttonType, content, active, disabled) {
	var btnClasses = ['dt-paging-button'];

	if (active) {
		btnClasses.push('current');
	}

	if (disabled) {
		btnClasses.push('disabled')
	}

	var btn = $('<button>', {
		'class': btnClasses.join(' '),
		'role': 'link',
		'type': 'button'
	}).html(content);

	return {
		display: btn,
		clicker: btn
	};
};

DataTable.ext.renderer.pagingContainer.bootstrap = function (settings, buttonEls) {
	// Menggunakan div sederhana sebagai container, bukan ul.pagination
	return $('<div/>').addClass('dt-paging').append(buttonEls);
};


return DataTable;
}));
