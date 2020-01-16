jQuery(document).ready(function() {
    // Instagram
    $.ajax({
        type: 'GET',
        dataType: 'jsonp',
        url: 'https://api.instagram.com/v1/users/self/media/recent/?access_token=6066943682.799b51a.7efdaece1f1446408c715bdf19f6b760&&callback=?'
     }).done(function (data){
         console.log('instagram api call data = %O', data);
         if(data.hasOwnProperty('data') && data.data.length) {
             var htmlToCreate = '';
             $.each(data.data, function(index, value){
                 if(index < 12) {
 //                    htmlToCreate += '<div class="instagram-parent"><img src="' + value.images.standard_resolution.url + '"></div>';
                     htmlToCreate += '<div class="instagram-parent" style="background: url(' + value.images.standard_resolution.url + '); background-size: cover;"></div>';
                 }else {
                     return false;
                 }
             });
             //Append
             if(htmlToCreate) {
                 $('.instagram-section .instagram-gallery').append(htmlToCreate);
             }
             $('.instagram-section .instagram-gallery').append('<div class="instagram-button-parent"><a class="instagram-button" href="https://www.instagram.com/specopssoftware/">CHECK OUT OUR INSTAGRAM</a></div>');
         }
     });

     // HTML entities Encode/Decode

    function htmlspecialchars(str) {
        var map = {
            "&": "&amp;",
            "<": "&lt;",
            ">": "&gt;",
            "\"": "&quot;",
            "'": "&#39;" // ' -> &apos; for XML only
        };
        return str.replace(/[&<>"']/g, function(m) { return map[m]; });
    }
    function htmlspecialchars_decode(str) {
        var map = {
            "&amp;": "&",
            "&lt;": "<",
            "&gt;": ">",
            "&quot;": "\"",
            "&#39;": "'"
        };
        return str.replace(/(&amp;|&lt;|&gt;|&quot;|&#39;)/g, function(m) { return map[m]; });
    }
    function htmlentities(str) {
        var textarea = document.createElement("textarea");
        textarea.innerHTML = str;
        return textarea.innerHTML;
    }
    function htmlentities_decode(str) {
        var textarea = document.createElement("textarea");
        textarea.innerHTML = str;
        return textarea.value;
    }

    $('.video-overlay, .video-overlay.video-button').on('click', function(){
        var videoWidth = $('.video-overlay').width() + 100;
        var videoHeight = videoWidth / 1.7777777777;
        var iframePlayer = $('iframe#player');
//            iframePlayer[0].style.removeProperty('width');
//            iframePlayer[0].style.removeProperty('height');
//            iframePlayer[0].style.setProperty('width', videoWidth + 'px' + 'important');
//            iframePlayer[0].style.setProperty('height', videoHeight + 'px' + 'important');
        iframePlayer.attr('style', 'width: ' + videoWidth + 'px !important; height: ' + videoHeight + 'px !important; display: block;');
        iframePlayer.css('display', 'block');
//            $('iframe#player').css({'height': videoHeight + ' !important', 'width': videoWidth + ' !important', 'display':'block'});
        $('.video-overlay').addClass('ti-hide');
        $('.video-overlay.video-button').addClass('ti-hide');
        startPlayer();
    });
});