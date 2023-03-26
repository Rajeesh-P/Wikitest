( function () {
	const Vue = require( 'vue' );
	const App = require( 'ext.currencyExchange.components' ).App;

	Vue.configureCompat( {
		MODE: 3,
		ATTR_FALSE_VALUE: false
	} );

	Vue.createMwApp( App )
		.mount( '#vue-root' );
}() );
