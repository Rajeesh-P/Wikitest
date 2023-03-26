<template>
	<div>
		<header>
			<h1>Currency exchange rate</h1>
		</header>

		<main class="sandbox-main">
			<cdx-card>
				<template #description>
					<div class="amount-div">
						<label class="amount-label" for="amount">Amount</label>
						<input class="amount-text" v-model="amount" placeholder="Enter the amount" />
						<cdx-button @click="getExchangeRates" class="btn" action="progressive" weight="primary">Display</cdx-button>
					</div>
					<div>
						<table>
							<thead>
								<tr>
									<th>From</th>
									<th>CZK</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>USD</td>
									<td>{{ usdtoczk }}</td>
								</tr>
								<tr>
									<td>EUR</td>
									<td>{{ eurtoczk }}</td>
								</tr>
								<tr>
									<td>GBP</td>
									<td>{{ gbptoczk }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</template>
			</cdx-card>
		</main>
	</div>
</template>

<script>

const { CdxButton, CdxCard } = require( '@wikimedia/codex' );
const { defineComponent } = require( 'vue' );


module.exports = exports = {
	name: 'CurrencyExchange',
	components:{
		CdxButton,
		CdxCard,
		defineComponent
	},
	data() {
		return {
			amount: 0,
			usdtoczk: 0,
			eurtoczk: 0,
			gbptoczk: 0,
			apiKey: "nWGZPnOhKSFp72bS5E3KsO8DMScc5AS7",
			errors: []
		};
	},
	mounted() {
		setInterval(() => {
			this.getExchangeRates()
		}, 60000);
	},
	methods:{
		getExchangeRates() {
			if(this.amount != 0) {
				this.getExchangeRateforUSDToCZK()
				this.getExchangeRateforEURToCZK()
				this.getExchangeRateforGBPToCZK()
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
					this.errors.push(error.message)
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
					this.errors.push(error.message)
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
					this.errors.push(error.message)
				});
		},
	}
};

</script>

<style>
.sandbox-main {
	max-width: 700px;
}
.cdx-card {
	width: 525px;
}
.btn {
	margin-left: 10px;
	height: 40px;
}
.amount-div {
	padding: 10px;
}
.amount-label {
	padding: 10px;
}
.amount-text {
	padding: 10px;
	width: 100px;
    text-align: center;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
  margin: auto;
  width: 500px;
}

th {
  padding: 10px 20px;
  border: solid 1px;
}

td {
  padding: 20px;
  border: solid 1px;
}

tbody {
	text-align: center;
}

tbody tr:nth-child(odd) {
  background-color: rgb(222, 226, 230);
}

</style>
