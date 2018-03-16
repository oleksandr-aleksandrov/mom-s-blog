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

    $(function ($) {


        var header = $('#header'),
            is_open = 'is-open',
            lastScrollTop = 0,
            delta = 100,
            arraytops = new Array(),
            arraybottoms = new Array();

        // $('.full').each(function (i) {
        //     arraytops[i] = $(this).offset().top;
        //     arraybottoms[i] = arraytops[i] + $(this).height();
        // })


        var didScroll = false;
        window.onscroll = doThisStuffOnScroll;

        function doThisStuffOnScroll() {
            didScroll = true;

        }

        setInterval(function () {
            if (didScroll) {
                didScroll = false;
                var st = $(window).scrollTop(),
                    socialhide = 1;

                if (st > 250) {
                    socialhide = 0;
                    arraytops.forEach(function (val, index) {
                        if ((val - st) < 350 && (arraybottoms[index] - st) > 110)
                            socialhide = 1;
                    });
                } else {
                    socialhide = 1;
                }

                // if (socialhide == 1) {
                //     $('#mishashares').addClass('hidden');
                // } else {
                //     $('#mishashares').removeClass('hidden');
                // }

                // make sure they scroll more than delta
                // for blog headers hide please our menu


                // if (Math.abs(lastScrollTop - st) <= delta)
                //     return;

                // only run if the navigation is not open
                if (!$('body').hasClass('nav-open')) {
                    // if they scrolled down and are past the navbar

                    // if (st < 100) {
                    //     header.removeClass('fixed');
                    // } else {
                    //     header.addClass('fixed')
                    // }

                    if (st > lastScrollTop) {
                        // scrolling on down
                        header.removeClass('is-down').addClass('is-up');
                        $('.anchored').removeClass('withmenu');
                    } else {
                        // scrolling on up
                        if (st + $(window).height() < $(document).height()) {
                            header.removeClass('is-up').addClass('is-down');
                            $('.anchored').addClass('withmenu');
                        }
                    }
                }
                lastScrollTop = st;
            } else {
                return;
            }
        }, 200);
    });
})
(jQuery);