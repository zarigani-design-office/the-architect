jQuery(function($){
  $('.drawer-button').click(function () {
    $(this).toggleClass('active');
    $('.drawer-bg').toggleClass('show');
    $('#site-navigation, #masthead').toggleClass('open');
  })
  $('.drawer-bg').click(function () {
    $(this).toggleClass('show');
    $('.drawer-button').removeClass('active');
		$('#site-navigation, #masthead').removeClass('open');
  });
})