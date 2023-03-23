( function () {
	const Vue = require( 'vue' );
	const App = require( 'ext.vueTest.components' ).App;

	Vue.configureCompat( {
		MODE: 1
	} );

	Vue.createMwApp( App )
		.mount( '#vue-root' );
}() );
