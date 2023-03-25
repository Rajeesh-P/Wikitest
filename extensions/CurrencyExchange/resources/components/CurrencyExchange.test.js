const VueTestUtils = require( '@vue/test-utils' );
const App = require( './CurrencyExchange.vue' );

describe( 'App', () => {
	const wrapper = VueTestUtils.shallowMount( App );

	it( 'contains a p element', () => {
		expect( wrapper.find( 'p' ).exists() ).toBe( true );
	} );
} );
