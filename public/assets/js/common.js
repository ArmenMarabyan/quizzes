$(document).ready(function() {
	
	$('.radio').click(function() {
		$(this).toggleClass('radio-active')
		$(this).find(".answer__dec").css({'border-color':'#8AB71B', 'color':'#8AB71B'})
	})

	$('.popup').hover(function() {
		$(this).next('.popupText').fadeIn(200)
	}, function() {
		$(this).next('.popupText').fadeOut(200)
	});
	$('.search__block input').focus(function() {
		$('.search__block').css('transform', 'scale(1.05)')
	})

	$(".search__block input").focusin(function(){
		$('.search__block').css('transform', 'scale(1.05)')
	});
	$(".search__block input").focusout(function(){
		$('.search__block').css('transform', 'scale(1)')
	});

	$("#search").keyup(function(){
		var search = $("#search").val();
		
		if(search == 0) {
			$('.search__resultsBlock').fadeIn();	
		}

		$.ajax({
			url: "/search/index",
			type: "POST",
			data: {"search": search},
			cache: false,
			beforeSend: function() {
                $('.search__resultsBlock').html('<div style="margin: 0 auto;"><img style="max-width:100%;" src="/quizzes/public/assets/images/preloader.gif" alt=""></div>')
            },                           
			success: function(response){
				$(".search__resultsBlock").html(response);
			}
		});
		return false;
   	});
})