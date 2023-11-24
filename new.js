
// Inside document ready script.js line 236
{

var currentPage = window.location.href;
var lastPartOfUrl = currentPage.substring(currentPage.lastIndexOf('/') + 1);

if (lastPartOfUrl === "submission.html" || lastPartOfUrl === "document-history.html") {
    jQuery('#user-sub-btn').addClass('d-none');
}

handleSubmissionTabs();

// line 246

// Get the initDelete-overview button
const initDeleteOverviewButton = document.getElementById('initDelete-overview');
const initViewOverviewButton = document.getElementById('initView-overview');
const initDownloadOverviewButton = document.getElementById('initDownload-overview');

// Get all checkboxes with the overview-checkbox class
const overviewCheckboxes = document.querySelectorAll('.ovwOperation');

// Get all elements with the class 'ovw-Actions'
const ovwActionsElements = document.querySelectorAll('.ovw-Actions');

// Add a click event listener to each element
ovwActionsElements.forEach(element => {
	element.addEventListener('click', function () {
		// Loop through each checkbox and remove the d-none class
		overviewCheckboxes.forEach(checkbox => {
			checkbox.classList.remove('d-none');
		});
	});
});


// Add click event listener to the initDelete-overview button
initDeleteOverviewButton.addEventListener('click', function () {

	const primaryOperationButton = document.querySelector('.primary-Operation');
	primaryOperationButton.classList.add('btn-danger');
	primaryOperationButton.textContent = 'Delete All Selected';
});

initViewOverviewButton.addEventListener('click', function () {

	const primaryOperationButton = document.querySelector('.primary-Operation');
	primaryOperationButton.classList.add('btn-primary');
	primaryOperationButton.textContent = 'View All Selected';
});

initDownloadOverviewButton.addEventListener('click', function () {

	const primaryOperationButton = document.querySelector('.primary-Operation');
	primaryOperationButton.classList.add('btn-primary');
	primaryOperationButton.textContent = 'Download All Selected';
});

const cancelOvwOperationButton = document.getElementById('cancelOvwOperation');
cancelOvwOperationButton.addEventListener('click', function () {
	const primaryOperationButton = document.querySelector('.primary-Operation');

	if (primaryOperationButton.classList.contains('btn-danger')) {
		primaryOperationButton.classList.remove('btn-danger');
	}
	if (primaryOperationButton.classList.contains('btn-primary')) {
		primaryOperationButton.classList.remove('btn-primary');
	}

	primaryOperationButton.textContent = '';

	overviewCheckboxes.forEach(checkbox => {
		checkbox.classList.add('d-none');
	});
});

}

// functions

function handleSubmissionTabs(){
	$("#completed-tab").on("click", function() {
		window.location.hash = "completed";
	  });
	  $("#submission-tab").on("click", function() {
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

$(window).on("popstate", function() {
    handleSubmissionTabs();
});