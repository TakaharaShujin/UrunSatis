jQuery.noConflict();
jQuery(document).ready(function($) {
	$('.urun').popover({
		container: 'body',
		placement: 'auto left right',
		template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>',
		content: 'İçerik',
		title: 'Başlık Başlık Başlık Başlık Başlık Başlık Başlık Başlık Başlık ',
		selector: '[data-toggle="overview"]'
	});

	$(window).load(function(){
		$('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
				$('section').removeClass('loading');
			},
			controlNav: false,
			direction: "vertical",
			touch: true
		});
	});

	$("figure").hover(function(){
		$(this).children("figcaption").removeClass("fadeOutDown").addClass('animated fadeInDown').show();
	}, function(){
		$(this).children("figcaption").removeClass("fadeInDown").addClass('fadeOutDown');
	});

	$('body').on('click', '.ajaxMenu', function(){
		$a 		= $(this);
		$sub 	= $('aside.sideContent').children('.sub-menu');
		$cid 	= $a.data('id');
		$sub.html('').append('<li class="text-center"><i class="fa fa-circle-o-notch fa-spin"></i></li>');
		$.ajax({
			type 	: 'get',
			url 	: 'kategori/alt/' + $cid,
			dataType: 'json',
			success : function($data){
				$sub.html('');
				$.each($data, function($key, $val){
					$sub.append($val).delay(50);
				})
			}
		});
		return false;
	});
});