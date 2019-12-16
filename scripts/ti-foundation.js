jQuery(document).ready(function(){
    console.log('before theForm length check');
    if($('#theForm').length) {
        console.log('the body is set to have ti-form-page');
        $('body').addClass('ti-form-page');
    }
});