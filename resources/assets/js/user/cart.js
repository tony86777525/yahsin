$(function(){
    $(".select2").select2({
        language: "zh-TW"
    });

    Date.prototype.addDays = function(days) {
        this.setDate(this.getDate() + days);
        return this;
    }

    document.querySelector('[name="bill"]')
        .addEventListener('change',
            function(event) {
                let currency = event.target.value;
                let amount = document.querySelector('[name="amount"]').value;

                let url = 'https://api.finmindtrade.com/api/v3/data'
                let resolve = (data) => {
                    if (data.msg === 'success') {
                        window.orderPriceRate = 1;
                        if (data.data[0]) {
                            window.orderPriceRate = data.data[0].cash_buy;
                        }
                    }

                    let newPrice = getPrice(window.orderPrice, window.orderPriceRate, 1);
                    let newTotalPrice = getPrice(window.orderPrice, window.orderPriceRate, amount);

                    document.querySelector('[data-js="price"]').innerHTML = newPrice;
                    document.querySelector('[data-js="totalPrice"]').innerHTML = newTotalPrice;

                }

                functions = {
                    resolve,
                };

                const today = new Date();

                let nowDate = formatDate(today.addDays(-3), 'Y-m-d');

                formBody = {
                    "dataset": "TaiwanExchangeRate",
                    "data_id": currency,
                    "date": nowDate,
                };

                apiGet(url, formBody, functions);
            }
        );

    document.querySelector('[data-js-button="amount"]')
        .addEventListener('click', function(event) {
            let amountTarget = document.querySelector('[name="amount"]');
            let amount = amountTarget.value;
            amount = Math.abs(parseInt(amount));

            if (!(amount > 0 && Number.isInteger(amount) === true)) {
                amount = 1
            }

            document.querySelector('[name="amount"]').value = amount;

            let newTotalPrice = getPrice(window.orderPrice, window.orderPriceRate, amount);

            document.querySelector('[data-js="totalPrice"]').innerHTML = newTotalPrice;
        });
});



async function apiGet(
    url,
    formBody,
    functions
) {
    functions.beforeSend
        ? functions.beforeSend()
        : () => {};

    await fetch(
        url + '?' + new URLSearchParams(formBody)
    ).then((response) => {
        return response.json();
    }).then((data) => {
        functions.resolve ?
            functions.resolve(data)
            : () => {};
    }).catch(err => {
        functions.reject
            ? functions.reject(err)
            : () => {};
    }).finally(() => {
        functions.final
            ? functions.final()
            : () => {};
    });
}

function formatDate(date, format) {
    const map = {
        m: (date.getMonth() + 1)
            .toString().padStart(2, '0'),
        d: (date.getDate())
            .toString().padStart(2, '0'),
        Y: date.getFullYear()
    }

    return format.replace(/m|d|Y/gi, matched => map[matched])
}

function getPrice(price, rate, amount) {
    return Math.floor(parseInt(price) * parseInt(amount) / parseInt(rate));
}
