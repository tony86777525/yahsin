$(function(){
    $('[data-input-id="hiddenFile"]').on('change', function(e){
        console.log(e)
        var fileName = this.files[0].name;
        console.log(fileName);
        $(this).siblings('[data-input-id="uploadFile"]').text(fileName);
    });
});