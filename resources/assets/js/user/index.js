$(function(){
    $('[data-input-id="hiddenFile"]').on('change', function(e){
        console.log(e)
        var fileName = this.files[0].name;
        console.log(fileName);
        $(this).siblings('[data-input-id="uploadFile"]').text(fileName);
    });

    $('[data-js="refresh-captcha"]').on('click', function(){
        let button = $(this);
        let url = button.data('js-url');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: url,
            dataType: "JSON",
            beforeSend : function() {
                button.attr('disabled', true);
            },
            success: function (res) {
                button.closest('.captcha').find('img').attr('src', res);
            },
            complete: function () {
                button.attr('disabled', false);
            },
            error: function(res) {
                console.log(res);
            }
        });
    });

    $('form[data-js-pay="ecpay"]').on('submit', function (event) {
        event.preventDefault();

        let form = $(this);
        let url = form.attr('action');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: url,
            dataType: "JSON",
            data: form.serialize(),
            beforeSend : function() {},
            success: function (res) {
                if (res.success === true) {
                    $('[data-js-pay="result"]').html(res.result);
                }
            },
            complete: function () {
            },
            error: function(res) {
                console.log(res);
            }
        });
    });

    $('form[data-js-search="ecpay"]').on('submit', function (event) {
        event.preventDefault();

        let form = $(this);
        let url = form.attr('action');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: url,
            dataType: "JSON",
            data: form.serialize(),
            beforeSend : function() {},
            success: function (res) {
                if (res.success === true) {
                    let result = $.map(res.result, function(v, k){
                        return `${k}:${v}`;
                    }).join('\n');
                    alert(result);
                }
            },
            complete: function () {
            },
            error: function(res) {
                console.log(res);
            }
        });
    });
});
