jQuery(function ($) {
    var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
        bottomOffset = 1000; // the distance (in px) from the page bottom when you want to load more posts

    $(window).scroll(function () {
        var data = {
            'action': 'loadmore',
            'query': MAIN.posts,
            'page': MAIN.current_page
        };
        if ($(document).scrollTop() > ( $(document).height() - bottomOffset ) && canBeLoaded == true) {
            $('.infinite-loader').show();
            $.ajax({
                url: MAIN.ajaxurl,
                data: data,
                type: 'POST',
                beforeSend: function (xhr) {
                    canBeLoaded = false;
                },
                success: function (data) {
                    if (data) {
                        setTimeout(function () {
                            $('.mb-archive-page').append(data); // where to insert posts
                            canBeLoaded = true; // the ajax is completed, now we can run it again
                            MAIN.current_page++;
                            $('.infinite-loader').hide();
                        }, 800);
                    }
                    else {
                        $('.infinite-loader').hide();
                    }
                }
            });
        }

    });

});