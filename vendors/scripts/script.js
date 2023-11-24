jQuery(window).on("load", function () {
	"use strict";
	// bootstrap wysihtml5
	$(".textarea_editor").wysihtml5({
		html: true,
	});
});
jQuery(window).on("load resize", function () {
	// custom scrollbar
	$(".customscroll").mCustomScrollbar({
		theme: "dark-2",
		scrollInertia: 300,
		autoExpandScrollbar: true,
		advanced: { autoExpandHorizontalScroll: true },
	});
});
jQuery(document).ready(function () {
	"use strict";
	// Background Image
	jQuery(".bg_img").each(function (i, elem) {
		var img = jQuery(elem);
		jQuery(this).hide();
		jQuery(this)
			.parent()
			.css({
				background: "url(" + img.attr("src") + ") no-repeat center center",
			});
	});

	/*==============================================================*/
	// Image to svg convert start
	/*==============================================================*/
	jQuery("img.svg").each(function () {
		var $img = jQuery(this);
		var imgID = $img.attr("id");
		var imgClass = $img.attr("class");
		var imgURL = $img.attr("src");
		jQuery.get(
			imgURL,
			function (data) {
				var $svg = jQuery(data).find("svg");
				if (typeof imgID !== "undefined") {
					$svg = $svg.attr("id", imgID);
				}
				if (typeof imgClass !== "undefined") {
					$svg = $svg.attr("class", imgClass + " replaced-svg");
				}
				$svg = $svg.removeAttr("xmlns:a");
				if (
					!$svg.attr("viewBox") &&
					$svg.attr("height") &&
					$svg.attr("width")
				) {
					$svg.attr(
						"viewBox",
						"0 0 " + $svg.attr("height") + " " + $svg.attr("width")
					);
				}
				$img.replaceWith($svg);
			},
			"xml"
		);
	});
	/*==============================================================*/
	// Image to svg convert end
	/*==============================================================*/

	// click to scroll
	// $('.collapse-box').on('shown.bs.collapse', function () {
	// 	$(".customscroll").mCustomScrollbar("scrollTo",$(this));
	// });

	// code split
	var entityMap = {
		"&": "&amp;",
		"<": "&lt;",
		">": "&gt;",
		'"': "&quot;",
		"'": "&#39;",
		"/": "&#x2F;",
	};
	function escapeHtml(string) {
		return String(string).replace(/[&<>"'\/]/g, function (s) {
			return entityMap[s];
		});
	}
	//document.addEventListener("DOMContentLoaded", init, false);
	window.onload = function init() {
		var codeblock = document.querySelectorAll("pre code");
		if (codeblock.length) {
			for (var i = 0, len = codeblock.length; i < len; i++) {
				var dom = codeblock[i];
				var html = dom.innerHTML;
				html = escapeHtml(html);
				dom.innerHTML = html;
			}
			$("pre code").each(function (i, block) {
				hljs.highlightBlock(block);
			});
		}
	};

	// Search Icon
	$("#filter_input").on("keyup", function () {
		var value = $(this).val().toLowerCase();
		$("#filter_list .fa-hover").filter(function () {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
		});
	});

	// custom select 2 init
	$(".custom-select2").select2();

	// Bootstrap Select
	//$('.selectpicker').selectpicker();

	// tooltip init
	$('[data-toggle="tooltip"]').tooltip();

	// popover init
	$('[data-toggle="popover"]').popover();

	// form-control on focus add class
	$(".form-control").on("focus", function () {
		$(this).parent().addClass("focus");
	});
	$(".form-control").on("focusout", function () {
		$(this).parent().removeClass("focus");
	});

	// sidebar menu icon
	$('.menu-icon, [data-toggle="left-sidebar-close"]').on("click", function () {
		//$(this).toggleClass('open');
		$("body").toggleClass("sidebar-shrink");
		$(".left-side-bar").toggleClass("open");
		$(".mobile-menu-overlay").toggleClass("show");
	});
	$('[data-toggle="header_search"]').on("click", function () {
		jQuery(".header-search").slideToggle();
	});

	var w = $(window).width();
	$(document).on("touchstart click", function (e) {
		if (
			$(e.target).parents(".left-side-bar").length == 0 &&
			!$(e.target).is(".menu-icon, .menu-icon img")
		) {
			$(".left-side-bar").removeClass("open");
			$(".menu-icon").removeClass("open");
			$(".mobile-menu-overlay").removeClass("show");
		}
	});
	// $(window).on("resize", function () {
	// 	var w = $(window).width();
	// 	if ($(window).width() > 1200) {
	// 		$(".left-side-bar").removeClass("open");
	// 		$(".menu-icon").removeClass("open");
	// 		$(".mobile-menu-overlay").removeClass("show");
	// 	}
	// });

	// sidebar menu Active Class
	$("#accordion-menu").each(function () {
		var vars = window.location.href.split("/").pop();
		$(this)
			.find('a[href="' + vars + '"]')
			.addClass("active");
	});

	// click to copy icon
	$(".fa-hover").click(function (event) {
		event.preventDefault();
		var $html = $(this).find(".icon-copy").first();
		var str = $html.prop("outerHTML");
		CopyToClipboard(str, true, "Copied");
	});
	var clipboard = new ClipboardJS(".code-copy");
	clipboard.on("success", function (e) {
		CopyToClipboard("", true, "Copied");
		e.clearSelection();
	});

	// date picker
	$(".date-picker").datepicker({
		language: "en",
		autoClose: true,
		dateFormat: "dd MM yyyy",
	});
	$(".datetimepicker").datepicker({
		timepicker: true,
		language: "en",
		autoClose: true,
		dateFormat: "dd MM yyyy",
	});
	$(".datetimepicker-range").datepicker({
		language: "en",
		range: true,
		multipleDates: true,
		multipleDatesSeparator: " - ",
	});
	$(".month-picker").datepicker({
		language: "en",
		minView: "months",
		view: "months",
		autoClose: true,
		dateFormat: "MM yyyy",
	});

	// only time picker
	$(".time-picker").timeDropper({
		mousewheel: true,
		meridians: true,
		init_animation: "dropdown",
		setCurrentTime: false,
	});
	$(".time-picker-default").timeDropper();

	// var color = $('.btn').data('color');
	// console.log(color);
	// $('.btn').style('color'+color);
	$("[data-color]").each(function () {
		$(this).css("color", $(this).attr("data-color"));
	});
	$("[data-bgcolor]").each(function () {
		$(this).css("background-color", $(this).attr("data-bgcolor"));
	});
	$("[data-border]").each(function () {
		$(this).css("border", $(this).attr("data-border"));
	});

	$("#accordion-menu").vmenuModule({
		Speed: 400,
		autostart: false,
		autohide: true,
	});

	var currentPage = window.location.href;
	var lastPartOfUrl = currentPage.substring(currentPage.lastIndexOf('/') + 1);

	if (lastPartOfUrl === "submission.html" || lastPartOfUrl === "document-history.html") {
		jQuery('#user-sub-btn').addClass('d-none');
	}

	handleSubmissionTabs();

	const checkAllCheckbox = document.getElementById('unverifiedMOVS-checkAll');
	const unverifiedMOVsCheckboxes = document.querySelectorAll('.unverifiedMOVsCheckbox');

	// Add a click event listener to the "Check All" checkbox
	checkAllCheckbox.addEventListener('click', function () {
		// Loop through each checkbox and set its checked property
		unverifiedMOVsCheckboxes.forEach(checkbox => {
			checkbox.checked = checkAllCheckbox.checked;
		});
	});

	function countChckedUnverifiedMOV() {
		let checkedCount = 0;
		unverifiedMOVsCheckboxes.forEach(checkbox => {
			if (checkbox.checked) {
				checkedCount++;
			}
		});
		return checkedCount;
	}

	// Get the unverifiedMOVS-initDelete button
	const initDelUnverifiedMOVButton = document.getElementById('unverifiedMOVS-initDelete');
	const initViewUnverifiedMOVBtn = document.getElementById('unverifiedMOVS-initView');
	const initDownloadUnverifiedMOVBtn = document.getElementById('unverifiedMOVS-initDownload');

	// Get all checkboxes with the unverifiedMOVsCheckbox class
	const unverifiedMOVSChckElements = document.querySelectorAll('.unverifiedMOVS-operation');

	// Get all elements with the class 'unverifiedMOVS-Actions'
	const unverifiedMOVSActElements = document.querySelectorAll('.unverifiedMOVS-Actions');

	// Add a click event listener to each element
	unverifiedMOVSActElements.forEach(element => {
		element.addEventListener('click', function () {
			// Loop through each checkbox and remove the d-none class
			unverifiedMOVSChckElements.forEach(elements => {
				elements.classList.remove('d-none');
			});
		});
	});


	// Add click event listener to the unverifiedMOVS-initDelete button
	initDelUnverifiedMOVButton.addEventListener('click', function () {
		const primaryUnvMOVOperBtn = document.querySelector('.primary-UnverifiedMOVOperation')

		primaryUnvMOVOperBtn.classList.add('btn-danger');
		primaryUnvMOVOperBtn.textContent = 'Delete All Selected';
		if (primaryUnvMOVOperBtn.classList.contains('btn-primary')) {
			primaryUnvMOVOperBtn.classList.remove('btn-primary');
		}
		// Add click event listener to the unverifiedMOVS-initDelete button
		primaryUnvMOVOperBtn.addEventListener('click', function () {;
			if(countChckedUnverifiedMOV()>0){
				primaryUnvMOVOperBtn.setAttribute('data-toggle', 'modal');
				primaryUnvMOVOperBtn.setAttribute('data-target', '#delUnverifiedMOVModal');
			}else{
				primaryUnvMOVOperBtn.removeAttribute('data-toggle');
				primaryUnvMOVOperBtn.removeAttribute('data-target');
			}
		});
	});

	initViewUnverifiedMOVBtn.addEventListener('click', function () {

		const primaryUnvMOVOperBtn = document.querySelector('.primary-UnverifiedMOVOperation');
		primaryUnvMOVOperBtn.classList.add('btn-primary');
		primaryUnvMOVOperBtn.textContent = 'View All Selected';
		if (primaryUnvMOVOperBtn.hasAttribute('data-toggle')) {
			primaryUnvMOVOperBtn.removeAttribute('data-toggle');
		}
		// Check if the 'data-target' attribute is present before attempting to remove it
		if (primaryUnvMOVOperBtn.hasAttribute('data-target')) {
			primaryUnvMOVOperBtn.removeAttribute('data-target');
		}
		if (primaryUnvMOVOperBtn.classList.contains('btn-danger')) {
			primaryUnvMOVOperBtn.classList.remove('btn-danger');
		}
	});

	initDownloadUnverifiedMOVBtn.addEventListener('click', function () {

		const primaryUnvMOVOperBtn = document.querySelector('.primary-UnverifiedMOVOperation');
		primaryUnvMOVOperBtn.classList.add('btn-primary');
		primaryUnvMOVOperBtn.textContent = 'Download All Selected';
		if (primaryUnvMOVOperBtn.hasAttribute('data-toggle')) {
			primaryUnvMOVOperBtn.removeAttribute('data-toggle');
		}
		// Check if the 'data-target' attribute is present before attempting to remove it
		if (primaryUnvMOVOperBtn.hasAttribute('data-target')) {
			primaryUnvMOVOperBtn.removeAttribute('data-target');
		}
		if (primaryUnvMOVOperBtn.classList.contains('btn-danger')) {
			primaryUnvMOVOperBtn.classList.remove('btn-danger');
		}
	});

	const cancelUnverifiedMOVBtn = document.getElementById('cancelUnverifiedMOVOperation');
	cancelUnverifiedMOVBtn.addEventListener('click', function () {
		const primaryUnvMOVOperBtn = document.querySelector('.primary-UnverifiedMOVOperation');

		if (primaryUnvMOVOperBtn.classList.contains('btn-danger')) {
			primaryUnvMOVOperBtn.classList.remove('btn-danger');
		}
		if (primaryUnvMOVOperBtn.classList.contains('btn-primary')) {
			primaryUnvMOVOperBtn.classList.remove('btn-primary');
		}
		if (primaryUnvMOVOperBtn.hasAttribute('data-toggle')) {
			primaryUnvMOVOperBtn.removeAttribute('data-toggle');
		}
		// Check if the 'data-target' attribute is present before attempting to remove it
		if (primaryUnvMOVOperBtn.hasAttribute('data-target')) {
			primaryUnvMOVOperBtn.removeAttribute('data-target');
		}


		primaryUnvMOVOperBtn.textContent = '';

		unverifiedMOVSChckElements.forEach(checkbox => {
			checkbox.classList.add('d-none');
		});


	});

	// Delete Modal Submit
	// const movOvwTableForm = document.getElementById('movOverviewTable');
	// const movOvwDeleteButton = document.getElementById('delSel-movOverview');
	// movOvwDeleteButton.addEventListener('click', function() {
	// 	movOvwTableForm.submit();
	// })

});

function handleSubmissionTabs() {
	$("#completed-tab").on("click", function () {
		window.location.hash = "completed";
	});
	$("#submission-tab").on("click", function () {
		window.location.hash = "submission";
	});

	let submissionTabPanel = window.location.hash;
	if (submissionTabPanel === "#completed") {
		document.getElementById("completed-tab").click();
	}
	if (submissionTabPanel === "#submission") {
		document.getElementById("submission-tab").click();
	}
}

$(window).on("popstate", function () {
	handleSubmissionTabs();
});

// sidebar menu accordion
(function ($) {
	$.fn.vmenuModule = function (option) {
		var obj, item;
		var options = $.extend(
			{
				Speed: 220,
				autostart: true,
				autohide: 1,
			},
			option
		);
		obj = $(this);

		item = obj.find("ul").parent("li").children("a");
		item.attr("data-option", "off");

		item.unbind("click").on("click", function () {
			var a = $(this);
			if (options.autohide) {
				a.parent()
					.parent()
					.find("a[data-option='on']")
					.parent("li")
					.children("ul")
					.slideUp(options.Speed / 1.2, function () {
						$(this).parent("li").children("a").attr("data-option", "off");
						$(this).parent("li").removeClass("show");
					});
			}
			if (a.attr("data-option") == "off") {
				a.parent("li")
					.children("ul")
					.slideDown(options.Speed, function () {
						a.attr("data-option", "on");
						a.parent("li").addClass("show");
					});
			}
			if (a.attr("data-option") == "on") {
				a.attr("data-option", "off");
				a.parent("li").children("ul").slideUp(options.Speed);
				a.parent("li").removeClass("show");
			}
		});
		if (options.autostart) {
			obj.find("a").each(function () {
				$(this)
					.parent("li")
					.parent("ul")
					.slideDown(options.Speed, function () {
						$(this).parent("li").children("a").attr("data-option", "on");
					});
			});
		} else {
			obj.find("a.active").each(function () {
				$(this)
					.parent("li")
					.parent("ul")
					.slideDown(options.Speed, function () {
						$(this).parent("li").children("a").attr("data-option", "on");
						$(this).parent("li").addClass("show");
					});
			});
		}
	};
})(window.jQuery || window.Zepto);

// copy to clipboard function
function CopyToClipboard(value, showNotification, notificationText) {
	var $temp = $("<input>");
	if (value != "") {
		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val(value).select();
		document.execCommand("copy");
		$temp.remove();
	}
	if (typeof showNotification === "undefined") {
		showNotification = true;
	}
	if (typeof notificationText === "undefined") {
		notificationText = "Copied to clipboard";
	}
	var notificationTag = $("div.copy-notification");
	if (showNotification && notificationTag.length == 0) {
		notificationTag = $("<div/>", {
			class: "copy-notification",
			text: notificationText,
		});
		$("body").append(notificationTag);

		notificationTag.fadeIn("slow", function () {
			setTimeout(function () {
				notificationTag.fadeOut("slow", function () {
					notificationTag.remove();
				});
			}, 1000);
		});
	}


}

// detectIE Browser
(function detectIE() {
	var ua = window.navigator.userAgent;

	var msie = ua.indexOf("MSIE ");
	if (msie > 0) {
		// IE 10 or older => return version number
		var ieV = parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)), 10);
		document.querySelector("body").className += " IE";
	}

	var trident = ua.indexOf("Trident/");
	if (trident > 0) {
		// IE 11 => return version number
		var rv = ua.indexOf("rv:");
		var ieV = parseInt(ua.substring(rv + 3, ua.indexOf(".", rv)), 10);
		document.querySelector("body").className += " IE";
	}

	// other browser
	return false;
})();
