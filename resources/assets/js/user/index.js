$(function(){
    $(".select2").select2({
        language: "zh-TW"
    });

    $('[data-input-id="hiddenFile"]').on('change', function(e){
        var fileLength = e.currentTarget.files.length;
        let fileText = $(this).data('file-text');
        if(fileLength !== 0) {
            var fileName = e.currentTarget.files[0].name;
            $(this).siblings('[data-input-id="uploadFile"]').text(fileName);
            $(this).closest('[data-input-id="elWrap"]').addClass('active');
        } else {
            $(this).siblings('[data-input-id="uploadFile"]').text(fileText);
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

    // $('[data-js="refresh-captcha"]').on('click', function(){
    //     let button = $(this);
    //     let url = button.data('js-url');
    //
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         type: 'POST',
    //         url: url,
    //         dataType: "JSON",
    //         beforeSend : function() {
    //             button.attr('disabled', true);
    //         },
    //         success: function (res) {
    //             button.closest('.captcha').find('img').attr('src', res);
    //         },
    //         complete: function () {
    //             button.attr('disabled', false);
    //         },
    //         error: function(res) {
    //             console.log(res);
    //         }
    //     });
    // });$('[data-js="refresh-captcha"]').on('click', function(){
    //     let button = $(this);
    //     let url = button.data('js-url');
    //
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         type: 'POST',
    //         url: url,
    //         dataType: "JSON",
    //         beforeSend : function() {
    //             button.attr('disabled', true);
    //         },
    //         success: function (res) {
    //             button.closest('.captcha').find('img').attr('src', res);
    //         },
    //         complete: function () {
    //             button.attr('disabled', false);
    //         },
    //         error: function(res) {
    //             console.log(res);
    //         }
    //     });
    // });

    $('form').on('submit', function () {
        let form = $(this);
        form.next('.mask').show();
    });

    new WOW().init();
});
