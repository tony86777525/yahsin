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

                apiGet(url, formBody, functions, 'GET');
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

    document.querySelector('[data-form-button="submit"]')
        .addEventListener('click',
            function(event) {
            const formTarget = document.querySelector('form');
                // event.preventDefault();

                let url = '/api/store/first';

                let beforeSend = () => {
                    let errorTarget = document.querySelectorAll('form [data-error]');
                    errorTarget.forEach((item) => {
                        item.textContent = '';
                        item.classList.remove("active");
                    });
                };
                let resolve = (data) => {
                    const errors = data.errors;

                    if (errors) {
                        let errorMessage = '';

                        for (const name in errors) {
                            errorMessage = errors[name][0];
                            document.querySelector(`form [data-error="${name}"]`).textContent = errorMessage;
                            document.querySelector(`form [data-error="${name}"]`).classList.add("active");
                        }

                        const targetTop = document.querySelector(`form .active[data-error]`).offsetTop;
                        const header = document.querySelector(`.header`).offsetHeight;
                        const scrollTop = targetTop - header - 200;
                        window.scrollTo({
                            top: scrollTop > 0 ? scrollTop : 0,
                            behavior: "smooth",
                        });
                    } else {
                        formTarget.submit();
                    }
                };
                let reject = (error) => {
                    console.log(error);
                };

                functions = {
                    beforeSend,
                    resolve,
                    reject,
                };

                const getData = new FormData(formTarget);
                // let jsonData = [];
                // getData.forEach((value, key) => {
                //     jsonData[key] = value;
                // });
                //
                // let formBody = JSON.stringify(jsonData);
                const details = Object.fromEntries(getData.entries());
                let formBody = [];
                for (let property in details) {
                    if (property === '_token') continue;
                    let encodedKey = encodeURIComponent(property);
                    let encodedValue = encodeURIComponent(details[property]);
                    formBody.push(encodedKey + "=" + encodedValue);
                }
                formBody = formBody.join("&");


                apiPost(url, formBody, functions);
            }
        );

});



async function apiGet(
    url,
    formBody,
    functions,
) {
    functions.beforeSend
        ? functions.beforeSend()
        : () => {};

    await fetch(url + '?' + new URLSearchParams(formBody),
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

async function apiPost(
    url,
    formBody,
    functions,
) {
    functions.beforeSend
        ? functions.beforeSend()
        : () => {};

    await fetch(
        url,
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
                "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formBody
        }
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

