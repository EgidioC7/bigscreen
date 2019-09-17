$(function () {
    // Sidebar toggle behavior
    $('#sidebarCollapse').on('click', function () {
    	$('#sidebar, #content').toggleClass('active');
    });
    
    $('.first-button').on('click', function () {

    	$('.animated-icon1').toggleClass('open');
    });
    $('.second-button').on('click', function () {

    	$('.animated-icon2').toggleClass('open');
    });
    $('.third-button').on('click', function () {

    	$('.animated-icon3').toggleClass('open');
    });

});