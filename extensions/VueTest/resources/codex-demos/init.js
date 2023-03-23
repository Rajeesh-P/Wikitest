( function () {
	const Vue = require( 'vue' );
	const Sandbox = require( './Sandbox.vue' );

	Vue.configureCompat( {
		MODE: 1
	} );

	Vue.createMwApp( Sandbox )
		.mount( '#vue-root' );
}() );
