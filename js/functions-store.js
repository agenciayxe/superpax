$(document).ready(function () {
	var textLoading = '<div class="bg-light text-center text-uppercase p-5"><div class="fa-3x"><i class="fas fa-sync fa-spin"></i></div><h4>Carregando...</h4></div>';
	var contentStore = $("#store-list");
	$('#lojas').change(function () {
		contentStore.html(textLoading);
		var lojaAtual = $( "#lojas" ).val();
		$.post(store_object.location, {
			action: store_object.action,
			local: lojaAtual
		}, function (storeReturn) {
			contentStore.html(storeReturn);
		});
	});
});