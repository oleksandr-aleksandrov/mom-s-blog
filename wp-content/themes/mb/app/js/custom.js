jQuery(document).ready(function ($) {

    // Контейнер с контентом
    var $mainBox = $('.mb-archive-page');

    // Отправка ajax запроса при клике по ссылке на рубрику в виджете "Рубрики"
    $('#menu-archive-menu-news a').click(function (e) {
        e.preventDefault();

        var linkCat = $(this).attr('href');
        var titleCat = $(this).text();

        document.title = titleCat;
        history.pushState({page_title: titleCat}, titleCat, linkCat);

        ajaxCat(linkCat);
    });


    // Отслеживание события нажатия кнопок браузера "Вперед/Назад"
    window.addEventListener("popstate", function (event) {
        document.title = event.state.page_title;
        ajaxCat(location.href);
    }, false);


    /**
     * Ajax запрос постов из рубрики по переданной ссылке на неё
     *
     * @param linkCat ссылка на рубрику
     */
    function ajaxCat(linkCat) {
        $mainBox.animate({opacity: 0.5}, 300);

        jQuery.post(
            myPlugin.ajaxurl,
            {
                action: 'get_cat',
                link: linkCat
            },
            function (response) {
                $mainBox
                    .html(response)
                    .animate({opacity: 1}, 300);
            });
    }

});