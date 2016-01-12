
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

	return false;
}

$(document).ready(function() {

	// Go Top
	$().UItoTop();

	// Tooltip
	$('.at-tip').tooltip();

	// Mobile Menu
	$(".mobileButton").on('click', function(e){
		e.preventDefault();
		var div = $("#mobileMenu");
		if (div.css("left") === "-245px") {
			div.css({ left: "0px" }); 
		} else {
			div.css({ left: "-245px" });
		}
		return false;	
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
