$(document).ready(function () {
	$('#search-input').on('focusin', function () {
		$('.header-search-autosuggest').addClass('active');
	});

	const $menu = $('.header-search-autosuggest');
	$(document).mouseup(function (e) {
		if (!$menu.is(e.target) && $menu.has(e.target).length === 0) {
			$menu.removeClass('active');
		}
	});
	$('.header-search').on('click', () => {
		$menu.toggleClass('active');
	});

	function delayKeyup(callback, ms) {
		var timer = 0;
		return function() {
			var context = this, args = arguments;
			clearTimeout(timer);
			timer = setTimeout(function () {
				callback.apply(context, args);
			}, ms || 0);
		};
	}
	$('.search-input').keyup(delayKeyup(function (e) {
		var contentSearch = $(this).val();
		console.log('Pesquisa Disparada');
		$.post(search_object.location, {
			action: search_object.action,
			search: contentSearch
		}, function (storeReturn) { $("#autosuggest-insert").html(storeReturn); });
	}, 500));
	$("#search-form").submit(function (e) { 
		var contentSearch = $('.search-input').val();
		console.log('Pesquisa Disparada');
		$.post(search_object.location, {
			action: search_object.action,
			search: contentSearch
		}, function (storeReturn) { $("#autosuggest-insert").html(storeReturn); $('.header-search-autosuggest').stop().addClass('active'); });
		e.preventDefault();
		return false;
	});
});