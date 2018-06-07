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

// jQuery(document).ready(function ($) {
//
//     // Контейнер с контентом
//     var $mainBox = $('.mb-archive-page');
//
//     // Отправка ajax запроса при клике по ссылке на рубрику в виджете "Рубрики"
//     $('#menu-archive-menu-news a').click(function (e) {
//         e.preventDefault();
//
//         var linkCat = $(this).attr('href');
//         var titleCat = $(this).text();
//
//         document.title = titleCat;
//         history.pushState({page_title: titleCat}, titleCat, linkCat);
//
//         ajaxCat(linkCat);
//     });
//
//
//     // Отслеживание события нажатия кнопок браузера "Вперед/Назад"
//     window.addEventListener("popstate", function (event) {
//         document.title = event.state.page_title;
//         ajaxCat(location.href);
//     }, false);
//
//
//     /**
//      * Ajax запрос постов из рубрики по переданной ссылке на неё
//      *
//      * @param linkCat ссылка на рубрику
//      */
//     function ajaxCat(linkCat) {
//         $mainBox.animate({opacity: 0.5}, 300);
//
//         jQuery.post(
//             MAIN.ajaxurl,
//             {
//                 action: 'get_cat',
//                 link: linkCat
//             },
//             function (response) {
//                 $mainBox
//                     .html(response)
//                     .animate({opacity: 1}, 300);
//             });
//     }
//
// });