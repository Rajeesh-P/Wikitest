<template>
	<div>
		<header>
			<h1>Currency Demo</h1>
		</header>

		<main class="sandbox-main">
			<div>
				<label for="amount">Amount</label>
				<input v-model="amount" placeholder="Enter the amount" />
			</div>
			<div>
				<label for="usdtoczk">USD to CZK</label>
				<input v-model="usdtoczk" />
			</div>
			<div>
				<label for="eurtoczk">EUR to CZK</label>
				<input v-model="eurtoczk" />
			</div>
			<div>
				<label for="gbptoczk">GBP to CZK</label>
				<input v-model="gbptoczk" />
			</div>
			<div>
				<button @click="getExchangeRates">Show</button>
			</div>
		</main>
	</div>
</template>

<script>

module.exports = exports = {
	name: 'CurrencyExchange',
	data() {
		return {
			amount: 0,
			usdtoczk: 0,
			eurtoczk: 0,
			gbptoczk: 0,
			apiKey: "nWGZPnOhKSFp72bS5E3KsO8DMScc5AS7"
		};
	},
	methods:{
		getExchangeRates() {
			if(this.amount != 0) {
				setInterval(() => {
					this.getExchangeRateforUSDToCZK()
					this.getExchangeRateforEURToCZK()
					this.getExchangeRateforGBPToCZK()
				}, 60000);
			}
		},

		getExchangeRateforUSDToCZK() {
			var myHeaders = new Headers();
			myHeaders.append("apikey", this.apiKey);

			var requestOptions = {
				method: 'GET',
				redirect: 'follow',
				headers: myHeaders
			};

			var apiUrl = "https://api.apilayer.com/exchangerates_data/convert?to=CZK&from=USD&amount=" + this.amount;

			fetch(apiUrl, requestOptions)
				.then(response => response.json())
  				.then(result => {
					this.usdtoczk = (result.success == true) ? result.result : 0;
				})
				.catch(error => {
					this.error = error.message
				});
		},

		getExchangeRateforEURToCZK() {
			var myHeaders = new Headers();
			myHeaders.append("apikey", this.apiKey);

			var requestOptions = {
				method: 'GET',
				redirect: 'follow',
				headers: myHeaders
			};

			var apiUrl = "https://api.apilayer.com/exchangerates_data/convert?to=CZK&from=EUR&amount=" + this.amount;

			fetch(apiUrl, requestOptions)
				.then(response => response.json())
				.then(result => {
					this.eurtoczk = (result.success == true) ? result.result : 0;
				})
				.catch(error => {
					this.error = error.message
				});
		},

		getExchangeRateforGBPToCZK() {
			var myHeaders = new Headers();
			myHeaders.append("apikey", this.apiKey);

			var requestOptions = {
				method: 'GET',
				redirect: 'follow',
				headers: myHeaders
			};

			var apiUrl = "https://api.apilayer.com/exchangerates_data/convert?to=CZK&from=GBP&amount=" + this.amount;

			fetch(apiUrl, requestOptions)
				.then(response => response.json())
				.then(result => {
					this.gbptoczk = (result.success == true) ? result.result : 0;
				})
				.catch(error => {
					this.error = error.message
				});
		},
	}
};

</script>

<style>
.sandbox-main {
	max-width: 500px;
}
</style>
