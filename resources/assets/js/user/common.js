$(function(){
    $('[data-id="open-nav"]').on('click', function(){
        $('[data-id="nav"]').addClass('active');
    });

    $('[data-id="close-nav"]').on('click', function(){
        $('[data-id="nav"]').removeClass('active');
    });

    $('#language').on('change', (element) => {
        let url = $(element.target).val();
        window.location.href = url;
    });

    headerHeight = $('header').outerHeight();
    $('[data-js-item="anchor"]').on('click', function(){
        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
            console.log(target.length)
			if (target.length) {
				$("html, body").animate({
					scrollTop: target.offset().top - headerHeight
				}, 1000);
				return false;
			}
		}
    });
});
