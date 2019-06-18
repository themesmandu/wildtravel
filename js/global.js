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


// To top Java Script

jQuery(document).ready(function($) {

});