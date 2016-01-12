function view_modal(href) {
	$('#viewModal').modal('show').on('hidden.bs.modal', function (e) {
		$("#viewModalFrame").attr("src", "");
	});

	$('#viewModal').modal('show').on('shown.bs.modal', function (e) {
		$('#viewModalLoading').show();
		$("#viewModalFrame").attr("src", href + '&pim=1');
		$('#viewModalFrame').load(function() {
			$('#viewModalLoading').hide();
		});
	});
	return false;
}

$(document).ready(function () {

	var view_modal_height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;

	$('#viewModalFrame').height(parseInt(view_modal_height - 140));

	$(window).resize(function () {
		view_modal_height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
		$('#viewModalFrame').height(parseInt(view_modal_height - 140));
	});
});
