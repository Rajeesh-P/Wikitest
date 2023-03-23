( function () {
	const Vue = require( 'vue' );
	const App = require( 'ext.currencyExchangeRate.components' ).App;

	Vue.configureCompat( {
		MODE: 1
	} );

	Vue.createMwApp( App )
		.mount( '#vue-currency' );
}() );
