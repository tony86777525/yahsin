$(function () {
	//e.preventDefault();
	//e.stopPropagation();
	
	
	$('[data-id="open-nav"]').on('click',function(){
		$('body').addClass('openNav');
	});

	$('[data-id="close-nav"],[data-id="overlay"]').on('click',function(){
		$('body').removeClass('openNav');
	});
})