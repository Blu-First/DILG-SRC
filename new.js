
// Inside document ready script.js line 236
{

var currentPage = window.location.href;
var lastPartOfUrl = currentPage.substring(currentPage.lastIndexOf('/') + 1);

if (lastPartOfUrl === "submission.html" || lastPartOfUrl === "document-history.html") {
    jQuery('#user-sub-btn').addClass('d-none');
}

handleSubmissionTabs();

// line 246

// Unverified MOVs
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
			if (primaryVerifiedMOVOperBtn.classList.contains('btn-danger')) {
				if(countChckedUnverifiedMOV()>0){
					primaryUnvMOVOperBtn.setAttribute('data-toggle', 'modal');
					primaryUnvMOVOperBtn.setAttribute('data-target', '#delUnverifiedMOVModal');
				}else{
					primaryUnvMOVOperBtn.removeAttribute('data-toggle');
					primaryUnvMOVOperBtn.removeAttribute('data-target');
				}
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
	// const unverifiedTableForm = document.getElementById('unverifiedMOVTable');
	// const unverifiedDeleteButton = document.getElementById('delSel-unverifiedMOV');
	// unverifiedDeleteButton.addEventListener('click', function() {
	// 	unverifiedTableForm.submit();
	// })

// Unverified MOVs END


// VERIFIED MOVS Table 
	const checkAllVerifiedCheckbox = document.getElementById('verifiedMOVS-checkAll');
	const verifiedMOVsCheckboxes = document.querySelectorAll('.verifiedMOVsCheckbox');
	
	checkAllVerifiedCheckbox.addEventListener('click', function () {
		verifiedMOVsCheckboxes.forEach(checkbox => {
			checkbox.checked = checkAllVerifiedCheckbox.checked;
		});
	});

	function countChckedVerifiedMOV() {
		let checkedCount = 0;
		verifiedMOVsCheckboxes.forEach(checkbox => {
			if (checkbox.checked) {
				checkedCount++;
			}
		});
		return checkedCount;
	}

	const initDelVerifiedMOVButton = document.getElementById('verifiedMOVS-initDelete');
	const initViewVerifiedMOVBtn = document.getElementById('verifiedMOVS-initView');
	const initDownloadVerifiedMOVBtn = document.getElementById('verifiedMOVS-initDownload');

	const verifiedMOVSChckElements = document.querySelectorAll('.verifiedMOVS-initDelete');

	const verifiedMOVSActElements = document.querySelectorAll('.verifiedMOVS-Actions');

	verifiedMOVSActElements.forEach(element => {
		element.addEventListener('click', function () {
			verifiedMOVSChckElements.forEach(elements => {
				elements.classList.remove('d-none');
			});
		});
	});

	const primaryVerifiedMOVOperBtn = document.querySelector('.primary-VerifiedMOVOperation');
	initDelVerifiedMOVButton.addEventListener('click', function () {

		primaryVerifiedMOVOperBtn.classList.add('btn-danger');
		primaryVerifiedMOVOperBtn.textContent = 'Delete All Selected';
		if (primaryVerifiedMOVOperBtn.classList.contains('btn-primary')) {
			primaryVerifiedMOVOperBtn.classList.remove('btn-primary');
		}
		primaryVerifiedMOVOperBtn.addEventListener('click', function () {;
			if (primaryVerifiedMOVOperBtn.classList.contains('btn-danger')) {

				if (countChckedVerifiedMOV() > 0) {
					primaryVerifiedMOVOperBtn.setAttribute('data-toggle', 'modal');
					primaryVerifiedMOVOperBtn.setAttribute('data-target', '#delVerifiedMOVModal');
				} else {

					primaryVerifiedMOVOperBtn.removeAttribute('data-toggle');
					primaryVerifiedMOVOperBtn.removeAttribute('data-target');
				}
			}
		});
	});

	initViewVerifiedMOVBtn.addEventListener('click', function () {
		primaryVerifiedMOVOperBtn.classList.add('btn-primary');
		primaryVerifiedMOVOperBtn.textContent = 'View All Selected';
		if (primaryVerifiedMOVOperBtn.hasAttribute('data-toggle')) {
			primaryVerifiedMOVOperBtn.removeAttribute('data-toggle');
		}
		if (primaryVerifiedMOVOperBtn.hasAttribute('data-target')) {
			primaryVerifiedMOVOperBtn.removeAttribute('data-target');
		}
		if (primaryVerifiedMOVOperBtn.classList.contains('btn-danger')) {
			primaryVerifiedMOVOperBtn.classList.remove('btn-danger');
		}
	});

	initDownloadVerifiedMOVBtn.addEventListener('click', function () {

		primaryVerifiedMOVOperBtn.classList.add('btn-primary');
		primaryVerifiedMOVOperBtn.textContent = 'Download All Selected';
		if (primaryVerifiedMOVOperBtn.hasAttribute('data-toggle')) {
			primaryVerifiedMOVOperBtn.removeAttribute('data-toggle');
		}
		if (primaryVerifiedMOVOperBtn.hasAttribute('data-target')) {
			primaryVerifiedMOVOperBtn.removeAttribute('data-target');
		}
		if (primaryVerifiedMOVOperBtn.classList.contains('btn-danger')) {
			primaryVerifiedMOVOperBtn.classList.remove('btn-danger');
		}
	});

	const cancelVerifiedMOVBtn = document.getElementById('cancelVerifiedMOVOperation');
	cancelVerifiedMOVBtn.addEventListener('click', function () {

		if (primaryVerifiedMOVOperBtn.classList.contains('btn-danger')) {
			primaryVerifiedMOVOperBtn.classList.remove('btn-danger');
		}
		if (primaryVerifiedMOVOperBtn.classList.contains('btn-primary')) {
			primaryVerifiedMOVOperBtn.classList.remove('btn-primary');
		}
		if (primaryVerifiedMOVOperBtn.hasAttribute('data-toggle')) {
			primaryVerifiedMOVOperBtn.removeAttribute('data-toggle');
		}
		if (primaryVerifiedMOVOperBtn.hasAttribute('data-target')) {
			primaryVerifiedMOVOperBtn.removeAttribute('data-target');
		}
		primaryVerifiedMOVOperBtn.textContent = '';

		verifiedMOVSChckElements.forEach(checkbox => {
			checkbox.classList.add('d-none');
		});

	});
	// VERIFIED MOVS Table END

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