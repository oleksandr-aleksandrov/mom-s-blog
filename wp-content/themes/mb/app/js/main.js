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
})
(jQuery);