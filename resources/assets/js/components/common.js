$(document).ready(function(){
	$('.ajaxbtn').click(function(){
	});
	$('.btn_close').click(function(){
		$('.popup').removeClass('active');
	});

	$('.view_cv').click(function(){
		var x = document.getElementById('cv');
	    if (x.style.display === 'none') {
	        x.style.display = 'block';
	    } else {
	        x.style.display = 'none';
	    }
	});
});