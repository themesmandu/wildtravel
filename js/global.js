jQuery(document).ready(function($) {
    // adding class fixed in navigation bar

    $(window).scroll(function() {
        var height = $(window).scrollTop();
        if (height > 300) {
            $('.main-navigation, #up-btn').addClass('fixed');
        } else {
            $('.main-navigation, #up-btn').removeClass('fixed');
        }
    });

    // added class on dropdown menu span

    if ($(document).width() < 1200) {
        var $menu_item = $('.menu-item-has-children');

        $menu_item.append('<span class="caret"></span>');

        $('.caret').click(function() {
            $(this).parent().toggleClass('menu-open').siblings().removeClass('menu-open');
        });
    }

    // To top Java Script

    $('#up-btn').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 1000);
    });
});