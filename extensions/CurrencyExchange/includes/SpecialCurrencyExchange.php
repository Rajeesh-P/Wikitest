<?php
/**
 * VueTest Special page.
 *
 * @file
 */

namespace MediaWiki\Extension\CurrencyExchange;

class SpecialCurrencyExchange extends \SpecialPage {

	/**
	 * Initialize the special page.
	 */
	public function __construct() {
		parent::__construct( 'CurrencyExchange' );
	}

	/**
	 * Shows the page to the user.
	 * @param string $sub The subpage string argument (if any).
	 */
	public function execute( $sub ) {
        $out = $this->getOutput();
		//$api = "nWGZPnOhKSFp72bS5E3KsO8DMScc5AS7";
        $markup = <<<EOM
        <div id="vue-root"></div>
EOM;

		// $out->setPageTitle( $this->msg( 'vuetest' ) );
		// $out->addSubtitle( $this->msg( 'vuetest-summary' ) );
        $out->addHTML( $markup );
        $out->addModules( 'ext.currencyExchange' );
	}

	protected function getGroupName() {
		return 'other';
	}
}
