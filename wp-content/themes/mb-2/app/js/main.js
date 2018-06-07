(function ($) {
    $(document).ready(function () {
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

    $(document).ready(function (f) {
        var element = f('#shareList');
        f(window).scroll(function () {
            element['fade' + (f(this).scrollTop() > 200 ? 'In' : 'Out')](500);
        });
    });

    $(document).ready(function () {
        $('a[href="#search"]').on('click', function (event) {
            event.preventDefault();
            $('#search').addClass('open');
            $('#search > form > input[type="search"]').focus();
        });

        $('#search button.close').on('click keyup', function () {
            $('#search').removeClass('open');
        });

    });

})
(jQuery);

