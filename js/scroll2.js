$(function(){

$('.but').on('click', function(e){
  $('html,body').stop().animate({ scrollTop: $('form').offset().top}, 1500);
  e.preventDefault();
});

});