(function ($) {
    $(function () {
        $('.uk-header-menu-current a').each(function () {
            var location = window.location.href
            var link = this.href
            var result = location.match(link);
            if (result != null) {
                $(this).addClass('current');
            }
        });
    });

    // archive side-menu

    $('#sidemenu a').click(function () {
        var a = $(this);
        if (a.attr('href') == '#') {
            if (!a.parent().hasClass('current-menu-parent')) {
                if (!a.parent().hasClass('opened')) {
                    a.next().slideDown(200).parent().addClass('opened');
                } else {
                    a.next().slideUp(200).parent().removeClass('opened');
                }
            }
            return false;
        }
    });
    /// archive side-menu #END

    $(function (f) {
        var element = f('#shareList');
        f(window).scroll(function () {
            element['fade' + (f(this).scrollTop() > 200 ? 'In' : 'Out')](500);
        });
    });


//
// $(function ($) {
//     var header = $('#header'),
//         lastScrollTop = 0;
//     var didScroll = false;
//     window.onscroll = doThisStuffOnScroll;
//     function doThisStuffOnScroll() {
//         didScroll = true;
//     }
//
//     setInterval(function () {
//         if (didScroll) {
//             didScroll = false;
//             var st = $(window).scrollTop();
//             if (st > lastScrollTop) {
//                 // scrolling on down
//                 header.removeClass('is-down').addClass('is-up');
//             } else {
//                 // scrolling on up
//                 if (st + $(window).height() < $(document).height()) {
//                     header.removeClass('is-up').addClass('is-down');
//                 }
//             }
//             lastScrollTop = st;
//         } else {
//             return;
//         }
//     }, 200);
// });
})
(jQuery);