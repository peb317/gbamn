
// Menu
var $menu_container = $('#menu-all .menu-all');

function tsearch_submit(f) {

	if (f.stx.value.length < 2) {
		alert("검색어는 두글자 이상 입력하십시오.");
		f.stx.select();
		f.stx.focus();
		return false;
	}

	f.action = f.url.value;

	return true;
}

function sub_menu(id){
	var menu = $("#" + id);
	var msub = $("#" + id + ' .menu-all-sub');

	if(msub.is(":visible")){
		msub.hide();
		menu.removeClass('active');
	} else {
		msub.show();
		menu.addClass('active');
	}

	// Masonry - PC
	$menu_container.masonry('layout');

	return false;
}

$(document).ready(function() {

	//Go Top
	$().UItoTop();

	//Tooltip
	$('.at-tip').tooltip();

	// Masonry - PC
	$menu_container.masonry({
		columnWidth : '.menu-all-head',
		itemSelector : '.menu-all-head'
	});

	$('#menu-all').on('shown.bs.collapse', function () {
		$menu_container.masonry('layout');
	});

	// Sidebar
	$(".asideButton").on('click', function(e){
		e.preventDefault();
		var div = $("#asideMenu");
		if (div.css("right") === "-320px") {
			div.css({ right: "0px" }); 
		} else {
			div.css({ right: "-320px" });
		}

		return false;	
	});
});
