//realoca o footer para o fim da página
$(document).ready(function () {
    var alturaDoc = $(document).innerHeight();
    var alturaPag = $(window).innerHeight();
    if (alturaDoc <= alturaPag) {
        $('footer').css('position', 'absolute');
    } else {
        $('footer').css('position', 'relative').css('margin-top: 50px');
    }

    //menu
    $('.btn-active-menu').on("click", function () {
        if ($('.sidebar').hasClass('fadeInMenu')) {
            $('.sidebar').removeClass('fadeInMenu');
        } else {
            $('.sidebar').addClass('fadeInMenu');
        }
    });

    $(".sidebar-menu > li.have-children > a").on("click", function (i) {
        i.preventDefault();
        if (!$(this).parent().hasClass("active")) {
            $(".sidebar-menu li ul").slideUp();
            $(this).next().slideToggle();
            $(".sidebar-menu li").removeClass("active");
            $(this).parent().addClass("active");
        } else {
            $(this).next().slideToggle();
            $(".sidebar-menu li").removeClass("active");
        }
    });
});

$(document).ready(function () {
    $('button.close').on('click', function () {
        $('.alert').fadeOut(300);
    });
});

function footer() {
    var alturaDoc = $(document).innerHeight();
    var alturaPag = $(window).innerHeight();
    if (alturaDoc <= alturaPag) {
        $('footer').css('position', 'absolute');
    } else {
        $('footer').css('position', 'relative').css('margin-top: 50px');
    }
}
