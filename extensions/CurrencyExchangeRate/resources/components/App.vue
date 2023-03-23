<template>
    <div>
        <p>This is sample currency rate</p>
    </div>
</template>

<script>

// @vue/component
module.exports = exports = {
	name: 'App',
	compatConfig: {
        MODE: 3
    },
    compilerOptions: {
        whitespace: 'condense'
    },
	data() {
		return {
			counter: 0,
            currencyRate: []
		};
	},
	methods: {
		decrease() {
			this.counter--;
		},
		increase() {
			this.counter++;
		},
        getCurrencyRate() {

        }
	}
};

</script>