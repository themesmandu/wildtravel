// added class on dropdown menu span

jQuery(document).ready(function($) {
    if ($(document).width() < 1200) {
        var $menu_item = $('.menu-item-has-children');

        $menu_item.append('<span class="caret"></span>');

        $('.caret').click(function() {
            $(this).parent().toggleClass('menu-open');
        });
    }
});

// background smooth scroll javascript

jQuery(document).ready(function($) {
    (function() {
        var parallax = document.querySelectorAll(".site-header"),
            speed = 0.8;
        window.onscroll = function() {
            [].slice.call(parallax).forEach(function(el, i) {

                var windowYOffset = window.pageYOffset,
                    elBackgrounPos = ".5% " + (windowYOffset * speed) + "px";

                el.style.backgroundPosition = elBackgrounPos;

            });
        };
    })();
});


// To top Java Script

jQuery(document).ready(function($) {

});