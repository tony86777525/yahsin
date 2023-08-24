$(function(){

    $(".select2").select2({
        language: "zh-TW"
    });

    document.querySelector('[name="bill"]')
        .addEventListener('change',
            function(event) {
                let currency = event.target.value;
                const price = event.target.getAttribute('data-default-price');

                let url = 'https://api.finmindtrade.com/api/v3/data'
                let resolve = (data) => {
                    let rate = 1;
                    if (data.msg === 'success') {
                        if (data.data[0]) {
                            rate = data.data[0].cash_buy;
                        }
                    }

                    document.querySelector('[data-js="price"]').innerHTML = rate * price;
                }

                functions = {
                    resolve,
                };

                const today = new Date();

                let nowDate = formatDate(today, 'Y-m-d');

                formBody = {
                    "dataset": "TaiwanExchangeRate",
                    "data_id": currency,
                    "date": nowDate,
                };

                apiGet(url, formBody, functions);
            }
        );
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
        d: (date.getDate() - 1)
            .toString().padStart(2, '0'),
        Y: date.getFullYear()
    }

    return format.replace(/m|d|Y/gi, matched => map[matched])
}
