$(function(){
    $(".select2").select2({
        language: "zh-TW"
    });
    
    $('[data-input-id="hiddenFile"]').on('change', function(e){        
        var fileLength = e.currentTarget.files.length;
        if(fileLength !== 0) {
            var fileName = e.currentTarget.files[0].name;
            $(this).siblings('[data-input-id="uploadFile"]').text(fileName);
            $(this).closest('[data-input-id="elWrap"]').addClass('active');
        } else {
            $(this).siblings('[data-input-id="uploadFile"]').text('選擇檔案');
            $(this).closest('[data-input-id="elWrap"]').removeClass('active');
        }
    });

    var elementTop = $('.feature').offset().top;
    var elementBottom = elementTop + $('.feature').height();

    $(window).on('scroll', function(){
        var pageTop = $(this).scrollTop();
        var pageBottom = pageTop + $(window).height();

        if ((elementTop <= pageBottom) && (elementBottom >= pageTop)) {
            $('[data-js-count="true"]').each(function () {
                $(this).find('span').prop('Counter',0).animate({
                    Counter: $(this).data('count')
                }, {
                    duration: 3000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        }
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
    
    new WOW().init();
});
