$(document).ready(function(){
	$('.ajaxbtn').click(function(){
		$('.popup').addClass('active');
	});
	$('.btn_close').click(function(){
		$('.popup').removeClass('active');
	});
});