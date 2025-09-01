$(".sidebar_dropdown_toggle").on('click', function () {
    var isActive = $(this).hasClass('active');
    $(".sidebar_dropdown_toggle").removeClass('active');
    $(".sidebar_dropdown").slideUp();
    if (!isActive) {
        $(this).addClass('active');
        $(this).siblings(".sidebar_dropdown").slideDown();
    }
});