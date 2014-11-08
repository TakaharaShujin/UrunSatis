jQuery.noConflict();
jQuery(document).ready(function($) {
	$("[data-toggle='tooltip']").tooltip({
		container : 'body',
		placement : 'top'
	});
	

	$('.wysi').wysihtml5();
});