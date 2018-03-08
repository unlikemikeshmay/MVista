
$(document).ready(function(){
    $('#downArrow').click(function(){
        $('html, body').animate({
            scrollTop: $('#carouselTarget').offset().top
        },500)
    })
    $('#upArrow').click(function(){
        $('html, body').animate({
            scrollTop: $('.nervbar').offset().top
        },500)
    })
    $('#contactbutton').click(function(){
        $(location).attr('href','contact.php')
    })
    $('.carousel').carousel({
        interval: 3500
      })
})