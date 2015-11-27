jQuery(document).ready(function() {
	jQuery('#cff a.view-comments').on('click', function(){
		jQuery(this).closest('.cff-item').find('.comments-box').slideToggle();
	});
});