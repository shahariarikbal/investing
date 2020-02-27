export default{
    data() {
        return {
            methods: [
                {
                    name: 'PayPal',
                    icon: 'https://www.f-cdn.com/assets/main/en/assets/payments/paypal_reference.svg',
                    currencys: ['usd'],
                    currency: 'usd',
                    class: 'paypal',
                    amount: 30,
                    processing_fee: '0.3+0.023*v'
                },
                {
                    name: 'Perfect Money',
                    icon: 'https://perfectmoney.is/img/logo3.png',
                    currencys: ['usd'],
                    class: 'perfect-money',
                    currency: 'usd',
                    amount: 30,
                    processing_fee: '0.02*v'
                },
                {
                    name: 'SSLCOMMERZ',
                    icon: 'https://www.sslcommerz.com/images/logo.png',
                    currencys: ['usd'],
                    currency: 'usd',
                    class: 'sslcommerz',
                    amount: 30,
                    processing_fee: '0.02*v'
                },
                {
                    name: 'Webmoney',
                    icon: 'https://www.f-cdn.com/assets/main/en/assets/payments/web_money.svg',
                    currencys: ['usd'],
                    currency: 'usd',
                    class: 'webmoney',
                    amount: 30,
                    processing_fee: '0.02*v'
                },
                {
                    name: 'Bank Diposit',
                    icon: 'https://www.f-cdn.com/assets/main/en/assets/payments/wire.svg',
                    currencys: ['usd'],
                    currency: 'usd',
                    class: 'bank-deposit',
                    amount: 30,
                    processing_fee: '0.02*v'
                },
                {
                    name: 'Skrill',
                    icon: 'https://www.f-cdn.com/assets/main/en/assets/payments/skrill.svg',
                    currencys: ['usd'],
                    transection: true,
                    uploader: true,
                    class: 'skrill',
                    currency: 'usd',
                    amount: 0,
                    processing_fee: false,
                },
                {
                    name: 'Neteller',
                    icon: 'https://www.f-cdn.com/assets/main/en/assets/payments/skrill.svg',
                    currencys: ['usd'],
                    transection: true,
                    uploader: true,
                    class: 'neteller',
                    currency: 'usd',
                    amount: 0,
                    processing_fee: false,
                }

            ],
        }
    }
}