(function ($) {
    "use strict"; // Start of use strict

    // Configure tooltips for collapsed side navigation
    $('.navbar-sidenav [data-toggle="tooltip"]').tooltip({
        template: '<div class="tooltip navbar-sidenav-tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
    })

    // Toggle the side navigation
    $("#sidenavToggler").click(function (e) {
        e.preventDefault();
        $("body").toggleClass("sidenav-toggled");
        $(".navbar-sidenav .nav-link-collapse").addClass("collapsed");
        $(".navbar-sidenav .sidenav-second-level, .navbar-sidenav .sidenav-third-level").removeClass("show");
    });

    // Force the toggled class to be removed when a collapsible nav link is clicked
    $(".navbar-sidenav .nav-link-collapse").click(function (e) {
        e.preventDefault();
        $("body").removeClass("sidenav-toggled");
    });

    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $('body.fixed-nav .navbar-sidenav, body.fixed-nav .sidenav-toggler, body.fixed-nav .navbar-collapse').on('mousewheel DOMMouseScroll', function (e) {
        var e0 = e.originalEvent,
                delta = e0.wheelDelta || -e0.detail;
        this.scrollTop += (delta < 0 ? 1 : -1) * 30;
        e.preventDefault();
    });

    // Scroll to top button appear
    $(document).scroll(function () {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    // Configure tooltips globally
    $('[data-toggle="tooltip"]').tooltip()

    // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        event.preventDefault();
    });

    // Call the dataTables jQuery plugin
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });

})(jQuery); // End of use strict

// Chart.js scripts
// -- Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// -- Area Chart Example
var ctx = document.getElementById("myAreaChart");
var mesAtual = new Date().getMonth() + 1;
var mesExt1, mesExt2, mesExt3, mesExt4, mesExt5, mesExt6;

if (mesAtual == 1) {
    mesExt1 = "Agosto";
    mesExt2 = "Setembro";
    mesExt3 = "Outubro";
    mesExt4 = "Novembro";
    mesExt5 = "Dezembro";
    mesExt6 = "Janeiro";
}
if (mesAtual == 2) {
    mesExt1 = "Setembro";
    mesExt2 = "Outubro";
    mesExt3 = "Novembro";
    mesExt4 = "Dezembro";
    mesExt5 = "Janeiro";
    mesExt6 = "Fevereiro";
}
if (mesAtual == 3) {
    mesExt1 = "Outubro";
    mesExt2 = "Novembro";
    mesExt3 = "Dezembro";
    mesExt4 = "Janeiro";
    mesExt5 = "Fevereiro";
    mesExt6 = "Março";
}
if (mesAtual == 4) {
    mesExt1 = "Novembro";
    mesExt2 = "Dezembro";
    mesExt3 = "Janeiro";
    mesExt4 = "Fevereiro";
    mesExt5 = "Março";
    mesExt6 = "Abril";
}
if (mesAtual == 5) {
    mesExt1 = "Dezembro";
    mesExt2 = "Janeiro";
    mesExt3 = "Fevereiro";
    mesExt4 = "Março";
    mesExt5 = "Abril";
    mesExt6 = "Maio";
}
if (mesAtual == 6) {
    mesExt1 = "Janeiro";
    mesExt2 = "Fevereiro";
    mesExt3 = "Março";
    mesExt4 = "Abril";
    mesExt5 = "Maio";
    mesExt6 = "Junho";
}
if (mesAtual == 7) {
    mesExt1 = "Fevereiro";
    mesExt2 = "Março";
    mesExt3 = "Abril";
    mesExt4 = "Maio";
    mesExt5 = "Junho";
    mesExt6 = "Julho";
}
if (mesAtual == 8) {
    mesExt1 = "Março";
    mesExt2 = "Abril";
    mesExt3 = "Maio";
    mesExt4 = "Junho";
    mesExt5 = "Julho";
    mesExt6 = "Agosto";
}
if (mesAtual == 9) {
    mesExt1 = "Abril";
    mesExt2 = "Maio";
    mesExt3 = "Junho";
    mesExt4 = "Julho";
    mesExt5 = "Agosto";
    mesExt6 = "Setembro";
}

var val1, val2, val3, val4, val5, val6;
if (mesAtual >= 6) {
    val1 = $('#val' + (mesAtual - 5)).val();
    val2 = $('#val' + (mesAtual - 4)).val();
    val3 = $('#val' + (mesAtual - 3)).val();
    val4 = $('#val' + (mesAtual - 2)).val();
    val5 = $('#val' + (mesAtual - 1)).val();
    val6 = $('#val' + mesAtual).val();
} else if (mesAtual == 1) {
    val1 = $('#val8').val();
    val2 = $('#val9').val();
    val3 = $('#val10').val();
    val4 = $('#val11').val();
    val5 = $('#val12').val();
    val6 = $('#val1').val();
} else if (mesAtual == 2) {
    val1 = $('#val9').val();
    val2 = $('#val10').val();
    val3 = $('#val11').val();
    val4 = $('#val12').val();
    val5 = $('#val1').val();
    val6 = $('#val2').val();
} else if (mesAtual == 3) {
    val1 = $('#val10').val();
    val2 = $('#val11').val();
    val3 = $('#val12').val();
    val4 = $('#val1').val();
    val5 = $('#val2').val();
    val6 = $('#val3').val();
} else if (mesAtual == 4) {
    val1 = $('#val11').val();
    val2 = $('#val12').val();
    val3 = $('#val1').val();
    val4 = $('#val2').val();
    val5 = $('#val3').val();
    val6 = $('#val4').val();
}
//alert(set);
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [mesExt1, mesExt2, mesExt3, mesExt4, mesExt5, mesExt6],
        datasets: [{
                label: "Sessions",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 20,
                pointBorderWidth: 2,
                data: [val1, val2, val3, val4, val5, val6],
            }],
    },
    options: {
        scales: {
            xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
            yAxes: [{
                    ticks: {
                        min: 0,
                        max: 40,
                        maxTicksLimit: 5
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
        },
        legend: {
            display: false
        }
    }
});

// -- Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["January", "February", "March", "April", "May", "June"],
        datasets: [{
                label: "Revenue",
                backgroundColor: "rgba(2,117,216,1)",
                borderColor: "rgba(2,117,216,1)",
                data: [4215, 5312, 6251, 7841, 9821, 14984],
            }],
    },
    options: {
        scales: {
            xAxes: [{
                    time: {
                        unit: 'month'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    }
                }],
            yAxes: [{
                    ticks: {
                        min: 0,
                        max: 15000,
                        maxTicksLimit: 5
                    },
                    gridLines: {
                        display: true
                    }
                }],
        },
        legend: {
            display: false
        }
    }
});

// -- Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Blue", "Red", "Yellow", "Green"],
        datasets: [{
                data: [12.21, 15.58, 11.25, 8.32],
                backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
            }],
    },
});

