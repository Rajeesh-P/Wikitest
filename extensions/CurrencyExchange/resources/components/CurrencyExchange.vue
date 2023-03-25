<template>
	<div>
		<header>
			<h1>Currency Demo</h1>
		</header>

		<main class="sandbox-main">
			<p>This page is currency{{ counter }}</p>
		</main>
	</div>
</template>

<script>
//USD/CZK, EUR/CZK and GBP/CZK

// @vue/component
module.exports = exports = {
	name: 'CurrencyExchange',
	data() {
		return {
			counter: 0,
			exchage: []
		};
	},
	mounted() {
		this.getExchangeRate()
	},
	methods:{
		getExchangeRate() {
			var myHeaders = new Headers();
			myHeaders.append("apikey", "nWGZPnOhKSFp72bS5E3KsO8DMScc5AS7");

			var requestOptions = {
				method: 'GET',
				redirect: 'follow',
				headers: myHeaders
			};

			fetch("https://api.apilayer.com/exchangerates_data/convert?to=INR&from=EUR&amount=5", requestOptions)
				.then(response => response.text())
				.then(result => console.log(result))
				.catch(error => console.log('error', error));

		}
	}
};

</script>

<style>
.sandbox-main {
	max-width: 500px;
}
</style>
