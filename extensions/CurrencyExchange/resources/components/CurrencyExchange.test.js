const VueTestUtils = require( '@vue/test-utils' );
const App = require( './CurrencyExchange.vue' );

describe( 'App', () => {
	const wrapper = VueTestUtils.shallowMount( App );

	it( 'contains a h1 element', () => {
		expect( wrapper.find( 'h1' ).exists() ).toBe( true );
	} );
} );
