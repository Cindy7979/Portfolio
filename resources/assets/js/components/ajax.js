var menu = {
    loginForm: function(){
		let url = $(this).attr('data-link');

		$.get(url, {}, function(response){
			if(response.success == 1){
				$('.popup .pop_inner div').html(response.data.html);
				$('.popup').addClass('active');
			}
		})
		
        
    },
    bind: function(){
        $('.ajaxbtn').click(menu.loginForm);
    }
}

 $(menu.bind);