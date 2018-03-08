
$(document).ready(function(){
    $('#downArrow').click(function(){
        $('html, body').animate({
            scrollTop: $('#carouselTarget').offset().top
        },1500)
    });
    $('#upArrow').click(function(){
        $('html, body').animate({
            scrollTop: $('.nervbar').offset().top
        },1500)
    });
    $('#contactbutton').click(function(){
        $(location).attr('href','contact.php')
    });
    $('.carousel').carousel({
        interval: 3500
      });
    $('#skills').click(function(){
        $('html, body').animate({
            scrollTop: $('#page3Target').offset().top
        },1500)
    });
    $('#downArrow2').click(function(){
        $('html, body').animate({
            scrollTop: $('#page3Target').offset().top
        },500)
    });
})