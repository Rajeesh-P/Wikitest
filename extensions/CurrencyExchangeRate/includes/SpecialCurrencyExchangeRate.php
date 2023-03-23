<?php
/**
 * CurrencyExchangeRate Special page.
 *
 * @file
 */

namespace MediaWiki\Extension\CurrencyExchangeRate;

class SpecialCurrencyExchangeRate extends \SpecialPage {

	/**
	 * Initialize the special page.
	 */
	public function __construct() {
		// A special page should at least have a name.
		// We do this by calling the parent class (the SpecialPage class)
		// constructor method with the name as first and only parameter.
		parent::__construct( 'CurrencyExchangeRate' );
	}

	/**
	 * Shows the page to the user.
	 * @param string $sub The subpage string argument (if any).
	 *  [[Special:HelloWorld/subpage]].
	 */
	public function execute( $sub ) {
		$out = $this->getOutput();

        $apikey = "nWGZPnOhKSFp72bS5E3KsO8DMScc5AS7";

        //$out->setPageTitle( $this->msg( 'vuetest' ) );

        //$exchange = $this->getExchangeRates();

		$markup = <<<EOM
		<div id="vue-currency">
		</div>
EOM;
		$out->addHTML( $markup );
	}

    public function getExchangeRates() {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            "CURLOPT_URL" => "https://api.apilayer.com/exchangerates_data/convert?to=inr&from=eur&amount=5",
            "CURLOPT_HTTPHEADER" => array(
              "Content-Type: text/plain",
              "apikey: nWGZPnOhKSFp72bS5E3KsO8DMScc5AS7"
            ),
            "CURLOPT_RETURNTRANSFER" => true,
            "CURLOPT_ENCODING" => "",
            "CURLOPT_MAXREDIRS" => 10,
            "CURLOPT_TIMEOUT" => 0,
            "CURLOPT_FOLLOWLOCATION" => true,
            "CURLOPT_HTTP_VERSION" => "CURL_HTTP_VERSION_1_1",
            "CURLOPT_CUSTOMREQUEST" => "GET"
        ));
          
        $response = curl_exec($curl);
          
        curl_close($curl);
        return $response;
    }

	// phpcs:ignore
	protected function getGroupName() {
		return 'other';
	}
}
