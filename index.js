$(window).scroll(function() {
  if ($(document).scrollTop() > 50) {
    $('nav').addClass('shrink');
    $('.add').hide();
  } else {
    $('nav').removeClass('shrink');
    $('.add').show();
    
  }
});