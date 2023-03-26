<template>
	<div>
		<header>
			<h1>Currency exchange rate</h1>
		</header>

		<main class="sandbox-main">
			<cdx-card>
				<template #description>
					<div v-if="isError">
						<cdx-message
							v-for="( error ) in errors"
							:key = "error"
							dismiss-button-label="Close"
							:fade-in="true"
							:auto-dismiss="true"
							:display-time="5000"
						>
						{{ error }}
						</cdx-message>
					</div>

					<div class="amount-div">
						<label class="amount-label" for="amount">Amount</label>
						<input class="amount-text" v-model.number="amount" placeholder="Enter the amount" />
						<cdx-button 
							:disabled="btnDisabled" 
							class="btn" 
							action="progressive" 
							weight="primary"
							@click="getExchangeRates" 
							>
							Display
						</cdx-button>
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

const { CdxButton, CdxCard, CdxMessage } = require( '@wikimedia/codex' );

// @vue/component
module.exports = exports = {
	name: 'CurrencyExchange',
	components: {
		CdxButton,
		CdxCard,
		CdxMessage
	},
	data() {
		return {
			amount: 0,
			usdtoczk: 0,
			eurtoczk: 0,
			gbptoczk: 0,
			apiKey: 'nWGZPnOhKSFp72bS5E3KsO8DMScc5AS7',
			errors: [],
			isError: false,
			btnDisabled: false
		};
	},
	methods:{
		getExchangeRates() {
			this.btnDisabled = true;
			this.isError = false;
			this.errors = [];
			if( (this.amount !== 0) && (/\d/.test(this.amount))) {
				this.getExchangeRateforUSDToCZK()
				this.getExchangeRateforEURToCZK()
				this.getExchangeRateforGBPToCZK()
			} else {
				this.isError = true;
				this.errors.push("Enter number for currency")
				this.btnDisabled = false;
			}
		},

		getExchangeRateforUSDToCZK() {
			let myHeaders = new Headers();
			myHeaders.append("apikey", this.apiKey);

			let requestOptions = {
				method: 'GET',
				redirect: 'follow',
				headers: myHeaders
			};

			let apiUrl = "https://api.apilayer.com/exchangerates_data/convert?to=CZK&from=USD&amount=" + this.amount;

			fetch(apiUrl, requestOptions)
				.then(response => response.json())
  				.then((result) => {
					this.usdtoczk = result.success == true ? result.result : 0;
					if (result.error) {
						this.errors.push(result.error.message);
						this.isError = true;
					}
					this.btnDisabled = false;
				})
				.catch((error) => {
					this.errors.push(error.message);
					this.isError = true;
					this.btnDisabled = false;
				});
		},

		getExchangeRateforEURToCZK() {
			let myHeaders = new Headers();
			myHeaders.append("apikey", this.apiKey);

			let requestOptions = {
				method: 'GET',
				redirect: 'follow',
				headers: myHeaders
			};

			let apiUrl = "https://api.apilayer.com/exchangerates_data/convert?to=CZK&from=EUR&amount=" + this.amount;

			fetch(apiUrl, requestOptions)
				.then(response => response.json())
				.then((result) => {
					this.eurtoczk = result.success == true ? result.result : 0;
					if (result.error) {
						this.errors.push(result.error.message);
						this.isError = true;
					}
					this.btnDisabled = false;
				})
				.catch((error) => {
					this.errors.push(error.message);
					this.isError = true;
					this.btnDisabled = false;
				});
		},

		getExchangeRateforGBPToCZK() {
			let myHeaders = new Headers();
			myHeaders.append("apikey", this.apiKey);

			let requestOptions = {
				method: 'GET',
				redirect: 'follow',
				headers: myHeaders
			};

			let apiUrl = "https://api.apilayer.com/exchangerates_data/convert?to=CZK&from=GBP&amount=" + this.amount;

			fetch(apiUrl, requestOptions)
				.then(response => response.json())
				.then((result) => {
					this.gbptoczk = result.success == true ? result.result : 0;
					if (result.error) {
						this.errors.push(result.error.message);
						this.isError = true;
					}
					this.btnDisabled = false;
				})
				.catch((error) => {
					this.errors.push(error.message);
					this.isError = true;
					this.btnDisabled = false;
				});
		}
	},
	mounted() {
		setInterval(() => {
			this.getExchangeRates()
		}, 60000 );
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
