$(function(){
    $('[data-id="open-nav"]').on('click', function(){
        $('[data-id="nav"]').addClass('active');
    });

    $('[data-id="close-nav"]').on('click', function(){
        $('[data-id="nav"]').removeClass('active');
    });
});