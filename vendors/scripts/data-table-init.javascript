$.fn.DataTable.ext.pager.numbers_length = 5; //Limit the number of pages displayed in pagination

$(function () {
    $('#submittedTbl').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        searching: true,
        bLengthChange: true,
        bPaginate: true,
        pagingType: "simple",
        bInfo: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        ordering: false, //disable sorting per column
        //f = search dom
        // t = table dom
        // l = length menu (rows per page) dom
        // p = pagination dom
        dom: '<".container-fluid my-3"<".card-box"<"#submittedTblHeader.row align-items-center ml-3 mr-1 px-4"<".table-util ml-auto"f>>>><".container-fluid my-3"<".card-box"<".mx-3 pb-4 pt-5 px-3"t<"#submittedTblFooter.d-flex justify-content-end align-items-center"lp>>>> ',
        lengthMenu: [[5, 10, 25, -1], [5, 10, 25, "All"]],
        language: {
            // info: '<div class="small note"><i class="small">Note: If marked as invalid, click on the \'Invalid\' to see the remarks.</i></div>',
            lengthMenu: '<label class="d-inline-block">Rows per page</label>' +
                '<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" ' +
                'class="width-fit custom-select custom-select-sm form-control form-control-sm mx-3">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="25">25</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">All</option>' +
                '</select>',
            searchPlaceholder: "Search",
            search: "", // clear search label
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>'
            }
        },
        // "serverSide": true,
        // "ajax": "xhr.php"
    });
    let submittedTblFooter = $('#submittedTblFooter');
    let submittedTblHeader = $('#submittedTblHeader');

    if (submittedTblFooter.length > 0) {
        submittedTblFooter.prepend('<div class="small note mr-auto"><i class="small">Note: If marked as invalid, click on the \'Invalid\' to see the remarks.</i></div>');
    }
    if (submittedTblHeader.length > 0) {
        submittedTblHeader.prepend('<div class="h2 my-4">Submitted Documents</div>');
    }
    let submittedTblFilter = $('#submittedTbl_filter');

    if (submittedTblFilter.length > 0) {
        // Enclose the existing input in a new div with class "input-container"
        submittedTblFilter.find('input').wrap('<form action="" method="POST" class="input-container"></form>');
        submittedTblFilter.find('.input-container').append('<i class="icon-right"><button type="submit"><span class="icon-search"></button></span></i>');
        submittedTblFilter.find('input')
            .attr('id', 'search-submittedTbl')
            .attr('name', 'search-submittedTbl');
    }

    //MOVS Overview Table
    // Get all checkboxes with the unverifiedMOVsCheckbox class

    const unverifiedMOVsCheckboxes = document.querySelectorAll('.unverifiedMOVsCheckbox');
    const unverifiedMOVsCheckboxesElements = document.querySelectorAll('.unverifiedMOVsCheckboxtd');


    $('#movsOverviewTbl').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        searching: true,
        bLengthChange: true,
        bPaginate: true,
        pagingType: "simple",
        bInfo: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        ordering: false, //disable sorting per column
        //f = search dom
        // t = table dom
        // l = length menu (rows per page) dom
        // p = pagination dom
        dom: '<".pb-20"<".d-flex align-items-center my-3 mx-4"<"#movOvwSelect.row"><"#movOvwActions.table-util flex-shrink-0 ml-auto"f>>t><"#movsOverviewFooter.d-flex justify-content-end"lp> ',
        lengthMenu: [[5, 10, 25, -1], [5, 10, 25, "All"]],
        language: {
            // info: '<div class="small note"><i class="small">Note: If marked as invalid, click on the \'Invalid\' to see the remarks.</i></div>',
            lengthMenu: '<label class="d-inline-block ml-auto">Rows per page</label>' +
                '<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" ' +
                'class="width-fit custom-select custom-select-sm form-control form-control-sm mx-3">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="25">25</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">All</option>' +
                '</select>',
            searchPlaceholder: "Search",
            search: "", // clear search label
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>'
            }
        },
        "initComplete": function (settings, json) {
            if ($('#movOvwSelect').length > 0) {
                // Append the provided HTML to the 'movOvwSelect' element
                $('#movOvwSelect').append(`   
                     
                    <select name="brgySelectMOVOvw" id="brgySelectMOVOvw" onchange="this.form.submit()"
                        class="brgySelect col-md-4 col-sm-8 my-2 selectpicker dropup"
                        data-dropup-auto="false" title="Select Barangay"
                        data-style="btn-outline-primary">
                        <option value="">Select Barangay</option>
                        <option value="Aplaya">Aplaya</option>
                        <option value="Balibago">Balibago</option>
                        <option value="Caingin">Caingin</option>
                        <option value="Dila">Dila</option>
                        <option value="Dita">Dita</option>
                        <option value="Don Jose">Don Jose</option>
                        <option value="Ibaba">Ibaba</option>
                        <option value="Kanluran">Kanluran</option>
                        <option value="Labas">Labas</option>
                        <option value="Macabling">Macabling</option>
                        <option value="Malitlit">Malitlit</option>
                        <option value="Malusak">Malusak</option>
                        <option value="Market Area">Market Area</option>
                        <option value="Pooc">Pooc</option>
                        <option value="Pulong Santa Cruz">Pulong Santa Cruz</option>
                        <option value="Santo Domingo">Santo Domingo</option>
                        <option value="Sinalhan">Sinalhan</option>
                        <option value="Tagapo">Tagapo</option>
                    </select>
                
            <select id="criteriaSelectMOVOvw" name="criteriaSelectMOVOvw[]" onchange="this.form.submit()"
                class="criteriaSelect selectpicker dropup col-md-4 col-sm-8 my-2"
                data-dropup-auto="false" data-style="btn-outline-primary" data-size="6"
                data-width="175px" multiple data-actions-box="true"
                data-selected-text-format="count" title="Select Area/s">
                <optgroup label="Core Governance Area">
                    <option value="Financial Administration and Sustainability">Financial Administration and Sustainability</option>
                    <option value="Disaster Preparedness">Disaster Preparedness</option>
                    <option value="Safety, Peace and Order">Safety, Peace, and Order</option>
                </optgroup>
                <optgroup label="Essential Governance Area">
                    <option value="Social Protection and Sensitivity">Social Protection and Sensitivity</option>
                    <option value="Business-Friendliness and Competitiveness">Business Friendliness and Competitiveness</option>
                    <option value="Environmental Management">Environmental Management</option>
                </optgroup>
            </select>
    
            <select name="docStatusSelectMOVOvw" id="docStatusSelectMOVOvw" onchange="this.form.submit()"
                class="submStatusSelect selectpicker col-md-4 col-sm-8 my-2"
                title="Select Status" data-style="btn-outline-primary">
                <option value="">Select Status</option>
                <option value="all">All</option>
                <option value="Pending">Pending</option>
                <option value="For Verification">For Verification</option>
                <option value="Verified">Verified</option>
                <option value="Invalid">Invalid</option>
                <option value="To Resubmit">To Resubmit</option>
            </select>
                `);
            }
            const criteriaSelect = document.getElementById('criteriaSelectMOVOvw');

            if (criteriaSelect) {
                criteriaSelect.addEventListener('blur', function () {
                    let selectedValues = $('#criteriaSelectMOVOvw').val();
                    console.log(selectedValues);

                    // Trigger form submission
                    this.form.submit();
                });
            }

            if ($('#movOvwActions').length > 0) {
                // Append the provided HTML to the 'movOvwSelect' element
                $('#movOvwActions').prepend(`
                <div class="btn-group  dropright">
                <button type="button" id="edit-MOV" class="dropdown-toggle mb-2" data-toggle="dropdown"
                    aria-expanded="false"><img class="" src="vendors/images/icon-edit.svg"
                        alt=""></button>
                <div class="card-box p-4 dropdown-menu">
                    <button type="button" id="unverifiedMOVS-initView"
                        class="unverifiedMOVS-Actions py-1 mb-1"><img class="mr-2"
                            src="vendors/images/icon-view.svg" alt="" srcset="">View
                        Files</button>
                    <button type="button" id="unverifiedMOVS-initDelete"
                        class="unverifiedMOVS-Actions py-1 " style="color: var(--red);">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="9"
                            height="10" viewBox="0 0 9 10" fill="none">
                            <path
                                d="M1.69576 8.82628C1.69576 9.06843 1.79195 9.30067 1.96318 9.4719C2.13441 9.64313 2.36665 9.73932 2.6088 9.73932H7.17402C7.41617 9.73932 7.64841 9.64313 7.81964 9.4719C7.99087 9.30067 8.08706 9.06843 8.08706 8.82628V3.34802H9.00011V2.43497H7.17402V1.52193C7.17402 1.27978 7.07782 1.04754 6.90659 0.876311C6.73537 0.705082 6.50313 0.608887 6.26098 0.608887H3.52185C3.27969 0.608887 3.04745 0.705082 2.87623 0.876311C2.705 1.04754 2.6088 1.27978 2.6088 1.52193V2.43497H0.782715V3.34802H1.69576V8.82628ZM3.52185 1.52193H6.26098V2.43497H3.52185V1.52193ZM3.06532 3.34802H7.17402V8.82628H2.6088V3.34802H3.06532Z"
                                fill="currentColor" />
                            <path
                                d="M3.52148 4.26074H4.43453V7.91292H3.52148V4.26074ZM5.34757 4.26074H6.26061V7.91292H5.34757V4.26074Z"
                                fill="currentColor" />
                        </svg>
                        Delete Files
                    </button>
                </div>
            </div>
            <button type="button" id="unverifiedMOVS-initDownload"
                class="mx-2 unverifiedMOVS-Actions"><img class=""
                    src="vendors/images/icon-download.svg" alt=""></button>
                `);
            }

            if ($('#movsOverviewTbl_filter').length > 0) {
                $('#movsOverviewTbl_filter').addClass('d-inline-block pr-0');
            }

            if ($('#movsOverviewFooter').length > 0) {
                // Append the provided HTML to the 'movOvwSelect' element
                $('#movsOverviewFooter').prepend(`
                    <div class="mr-auto">
                    <button type="button"
                        class="d-none unverifiedMOVS-operation primary-UnverifiedMOVOperation btn btn-sm mr-3 "></button>
                    <button type="button" class="d-none unverifiedMOVS-operation btn btn-sm btn-secondary weight-500"
                        id="cancelUnverifiedMOVOperation">Cancel</button>
                    </div>
                `);
            }

            let movsOverviewTblFilter = $('#movsOverviewTbl_filter');
            if (movsOverviewTblFilter.length > 0) {

                // Enclose the existing input in a new div with class "input-container"
                movsOverviewTblFilter.find('input').wrap('<form action="" method="POST" class="input-container"></form>');
                movsOverviewTblFilter.find('.input-container').append('<i class="icon-right"><button type="submit"><span class="icon-search"></button></span></i>');
                movsOverviewTblFilter.find('input')
                    .attr('id', 'search-movOvwTbl')
                    .attr('name', 'search-movOvwTbl');
            }

            // TABLE ACTIONS HANDLER
            const checkAllCheckbox = document.getElementById('unverifiedMOVS-checkAll');
            const unverifiedMOVSChckElements = document.querySelectorAll('.unverifiedMOVS-operation');


            // Add a click event listener to the "Check All" checkbox
            if (checkAllCheckbox) {
                // The checkAllCheckbox element is present, so attach the event listener
                checkAllCheckbox.addEventListener('click', function () {
                    // Loop through each checkbox and set its checked property
                    let currentCheckbox = document.querySelectorAll('.unverifiedMOVsCheckbox');
                    currentCheckbox.forEach((checkbox, index) => {

                        checkbox.checked = checkAllCheckbox.checked;
                    });
                    setTimeout(function () {
                        let itemsSelected = countChckedUnverifiedMOV();
                        itemsSelected > 0 && alert(itemsSelected + " items selected.");
                    }, 0);
                });
            }

            function uncheckAllUnverified() {
                unverifiedMOVsCheckboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
                checkAllCheckbox.checked = false;
            }

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



            // Get all elements with the class 'unverifiedMOVS-Actions'
            const unverifiedMOVSActElements = document.querySelectorAll('.unverifiedMOVS-Actions');

            // Add a click event listener to each element
            unverifiedMOVSActElements.forEach(element => {
                element.addEventListener('click', function () {
                    // Loop through each checkbox and remove the d-none class
                    unverifiedMOVSChckElements.forEach(elements => {
                        elements.classList.remove('d-none');
                    });
                    unverifiedMOVsCheckboxesElements.forEach(elements => {
                        elements.classList.remove('d-none');
                    });
                });
            });


            // Add click event listener to the unverifiedMOVS-initDelete button
            if (initDelUnverifiedMOVButton) {
                // The initDelUnverifiedMOVButton element is present, so add the event listener
                initDelUnverifiedMOVButton.addEventListener('click', function () {
                    uncheckAllUnverified();
                    const primaryUnvMOVOperBtn = document.querySelector('.primary-UnverifiedMOVOperation')

                    primaryUnvMOVOperBtn.classList.add('btn-danger');
                    primaryUnvMOVOperBtn.textContent = 'Delete All Selected';
                    if (primaryUnvMOVOperBtn.classList.contains('btn-primary')) {
                        primaryUnvMOVOperBtn.classList.remove('btn-primary');
                        primaryUnvMOVOperBtn.removeAttribute('name');
                        primaryUnvMOVOperBtn.type = (primaryUnvMOVOperBtn.type !== 'button') ? 'button' : primaryUnvMOVOperBtn.type;
                    }
                    // Add click event listener to the unverifiedMOVS-initDelete button
                    primaryUnvMOVOperBtn.addEventListener('click', function () {
                        if (primaryUnvMOVOperBtn.classList.contains('btn-danger')) {
                            if (countChckedUnverifiedMOV() > 0) {
                                primaryUnvMOVOperBtn.setAttribute('data-toggle', 'modal');
                                primaryUnvMOVOperBtn.setAttribute('data-target', '#delUnverifiedMOVModal');
                            } else {
                                primaryUnvMOVOperBtn.removeAttribute('data-toggle');
                                primaryUnvMOVOperBtn.removeAttribute('data-target');
                            }
                        }
                    });
                });
            }

            if (initViewUnverifiedMOVBtn) {
                // The initViewUnverifiedMOVBtn element is present, so add the event listener
                initViewUnverifiedMOVBtn.addEventListener('click', function () {
                    uncheckAllUnverified();
                    const primaryUnvMOVOperBtn = document.querySelector('.primary-UnverifiedMOVOperation');
                    primaryUnvMOVOperBtn.classList.add('btn-primary');
                    primaryUnvMOVOperBtn.textContent = 'View All Selected';
                    primaryUnvMOVOperBtn.setAttribute('name', 'view');


                    primaryUnvMOVOperBtn.type = (primaryUnvMOVOperBtn.type !== 'submit') ? 'submit' : primaryUnvMOVOperBtn.type;

                    // Check if the 'data-toggle' attribute is present before attempting to remove it
                    primaryUnvMOVOperBtn.hasAttribute('data-toggle') ? primaryUnvMOVOperBtn.removeAttribute('data-toggle') : null;

                    // Remove 'data-target' attribute
                    primaryUnvMOVOperBtn.hasAttribute('data-target') ? primaryUnvMOVOperBtn.removeAttribute('data-target') : null;

                    // Remove 'btn-danger' class
                    primaryUnvMOVOperBtn.classList.contains('btn-danger') ? primaryUnvMOVOperBtn.classList.remove('btn-danger') : null;

                });
            }

            if (initDownloadUnverifiedMOVBtn) {
                // The initDownloadUnverifiedMOVBtn element is present, so add the event listener
                initDownloadUnverifiedMOVBtn.addEventListener('click', function () {
                    uncheckAllUnverified();
                    const primaryUnvMOVOperBtn = document.querySelector('.primary-UnverifiedMOVOperation');
                    primaryUnvMOVOperBtn.classList.add('btn-primary');
                    primaryUnvMOVOperBtn.textContent = 'Download All Selected';
                    primaryUnvMOVOperBtn.setAttribute('name', 'download');
                    primaryUnvMOVOperBtn.type = (primaryUnvMOVOperBtn.type !== 'submit') ? 'submit' : primaryUnvMOVOperBtn.type;

                    // Check if the 'data-toggle' attribute is present before attempting to remove it
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
            }

            const cancelUnverifiedMOVBtn = document.getElementById('cancelUnverifiedMOVOperation');
            if (cancelUnverifiedMOVBtn) {
                // The cancelUnverifiedMOVBtn element is present, so add the event listener
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
                    uncheckAllUnverified();
                    primaryUnvMOVOperBtn.textContent = '';

                    unverifiedMOVSChckElements.forEach(checkbox => {
                        checkbox.classList.add('d-none');
                    });
                    unverifiedMOVsCheckboxesElements.forEach(elements => {
                        elements.classList.add('d-none');
                    });
                });
            }

            const cancelSelUnverifiedMOV = document.getElementById('cancelSel-unverifiedMOV');
            if (cancelSelUnverifiedMOV) {
                // The cancelSelUnverifiedMOV element is present, so add the event listener
                cancelSelUnverifiedMOV.addEventListener('click', function () {
                    // Check if the cancelUnverifiedMOVBtn element is present before triggering its click event
                    if (cancelUnverifiedMOVBtn) {
                        cancelUnverifiedMOVBtn.click();
                    }
                });
            }
            let dlbtn = document.querySelector('.primary-UnverifiedMOVOperation');
            console.log(dlbtn);
            dlbtn.addEventListener('click', function () {
                if (dlbtn.name === 'download') {
                    // Serialize form data or prepare your data as needed
                    const formData = new FormData();
                    formData.append('download', 'true');
                    formData.append('movsOvw[]'); // Add your file IDs dynamically

                    // Perform AJAX request
                    fetch('admin-mov-tbl-action.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.blob();
                        })
                        .then(blob => {
                            // Create a temporary link and trigger a click to download the file
                            const downloadLink = document.createElement('a');
                            downloadLink.href = URL.createObjectURL(blob);
                            downloadLink.download = 'downloaded_file_' + fileId + '.zip'; // You can set a default name or customize it
                            document.body.appendChild(downloadLink);
                            downloadLink.click();
                            document.body.removeChild(downloadLink);
                        })
                        .catch(error => {
                            console.error('Error during fetch operation:', error);
                        });
                }

            });

        }
    });
    //END MOVS Overview Table



    // Movs Verified Table
    const verifiedMOVsCheckboxtd = document.querySelectorAll('.verifiedMOVsCheckboxtd'); // td class
    const verifiedMOVsCheckboxes = document.querySelectorAll('.verifiedMOVsCheckbox'); //input td
    $('#movsVerifiedTbl').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        searching: true,
        bLengthChange: true,
        bPaginate: true,
        pagingType: "simple",
        bInfo: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        ordering: false,
        dom: '<".pb-20"<".d-flex align-items-center my-3 mx-4"<"#movsVerifiedSelect.row"><"#movsVerifiedActions.table-util flex-shrink-0 ml-auto"f>>t><"#movsVerifiedFooter.d-flex justify-content-end"lp> ',
        lengthMenu: [[5, 10, 25, -1], [5, 10, 25, "All"]],
        language: {
            lengthMenu: '<label class="d-inline-block ml-auto">Rows per page</label>' +
                '<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" ' +
                'class="width-fit custom-select custom-select-sm form-control form-control-sm mx-3">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="25">25</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">All</option>' +
                '</select>',
            searchPlaceholder: "Search",
            search: "",
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>'
            }
        },
        "initComplete": function (settings, json) {
            if ($('#movsVerifiedSelect').length > 0) {
                $('#movsVerifiedSelect').append(`
                <select name="brgySelectMOVVerified" id="brgySelectMOVVerified" onchange="this.form.submit()"
                class="brgySelect col-md-6 col-sm-8 my-2 selectpicker dropup"
                data-dropup-auto="false" title="Select Barangay"
                data-style="btn-outline-primary">
                    <option value="">Select Barangay</option>
                    <option value="Aplaya">Aplaya</option>
                    <option value="Balibago">Balibago</option>
                    <option value="Caingin">Caingin</option>
                    <option value="Dila">Dila</option>
                    <option value="Dita">Dita</option>
                    <option value="Don Jose">Don Jose</option>
                    <option value="Ibaba">Ibaba</option>
                    <option value="Kanluran">Kanluran</option>
                    <option value="Labas">Labas</option>
                    <option value="Macabling">Macabling</option>
                    <option value="Malitlit">Malitlit</option>
                    <option value="Malusak">Malusak</option>
                    <option value="Market Area">Market Area</option>
                    <option value="Pooc">Pooc</option>
                    <option value="Pulong Santa Cruz">Pulong Santa Cruz</option>
                    <option value="Santo Domingo">Santo Domingo</option>
                    <option value="Sinalhan">Sinalhan</option>
                    <option value="Tagapo">Tagapo</option>
                </select>
                <select name="criteriaSelectMOVVerified[]" id="criteriaSelectMOVVerified" onchange="this.form.submit()"
                    class="selectpicker criteriaSelect dropup col-md-6 col-sm-8 my-2"
                    data-dropup-auto="false" data-style="btn-outline-primary" data-size="6"
                    data-width="175px" multiple data-actions-box="true"
                    data-selected-text-format="count" title="Select Area/s">
                    <optgroup label="Core Governance Area">
                        <option value="Financial Administration and Sustainability">Financial Administration and Sustainability</option>
                        <option value="Disaster Preparedness">Disaster Preparedness</option>
                        <option value="Safety, Peace and Order">Safety, Peace, and Order</option>
                    </optgroup>
                    <optgroup label="Essential Governance Area">
                        <option value="Social Protection and Sensitivity">Social Protection and Sensitivity</option>
                        <option value="Business-Friendliness and Competitiveness">Business Friendliness and Competitiveness</option>
                        <option value="Environmental Management">Environmental Management</option>
                    </optgroup>
                </select>
                `);
            }
            if ($('#movsVerifiedActions').length > 0) {
                $('#movsVerifiedActions').prepend(`
                    <div class="btn-group  dropright">
                        <button type="button" id="edit-verifiedMOV" class="dropdown-toggle mb-2"
                            data-toggle="dropdown" aria-expanded="false"><img class=""
                                src="vendors/images/icon-edit.svg" alt=""></button>
                        <div class="card-box p-4 dropdown-menu">
                            <button type="button" id="verifiedMOVS-initView"
                                class="verifiedMOVS-Actions py-1 mb-1"><img class="mr-2"
                                    src="vendors/images/icon-view.svg" alt="" srcset="">View
                                Files</button>
                            <button type="button" id="verifiedMOVS-initDelete" class="verifiedMOVS-Actions py-1 "
                                style="color: var(--red);">
                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="9"
                                    height="10" viewBox="0 0 9 10" fill="none">
                                    <path
                                        d="M1.69576 8.82628C1.69576 9.06843 1.79195 9.30067 1.96318 9.4719C2.13441 9.64313 2.36665 9.73932 2.6088 9.73932H7.17402C7.41617 9.73932 7.64841 9.64313 7.81964 9.4719C7.99087 9.30067 8.08706 9.06843 8.08706 8.82628V3.34802H9.00011V2.43497H7.17402V1.52193C7.17402 1.27978 7.07782 1.04754 6.90659 0.876311C6.73537 0.705082 6.50313 0.608887 6.26098 0.608887H3.52185C3.27969 0.608887 3.04745 0.705082 2.87623 0.876311C2.705 1.04754 2.6088 1.27978 2.6088 1.52193V2.43497H0.782715V3.34802H1.69576V8.82628ZM3.52185 1.52193H6.26098V2.43497H3.52185V1.52193ZM3.06532 3.34802H7.17402V8.82628H2.6088V3.34802H3.06532Z"
                                        fill="currentColor" />
                                    <path
                                        d="M3.52148 4.26074H4.43453V7.91292H3.52148V4.26074ZM5.34757 4.26074H6.26061V7.91292H5.34757V4.26074Z"
                                        fill="currentColor" />
                                </svg>
                                Delete Files
                            </button>
                        </div>
                    </div>
                    <button type="button" id="verifiedMOVS-initDownload" class="mx-2 verifiedMOVS-Actions"><img
                            class="" src="vendors/images/icon-download.svg" alt=""></button>
                `);
            }

            let movsVerifiedTbl_filter = $('#movsVerifiedTbl_filter');

            if (movsVerifiedTbl_filter.length > 0) {
                movsVerifiedTbl_filter.addClass('d-inline-block pr-0');
                // Enclose the existing input in a new div with class "input-container"
                movsVerifiedTbl_filter.find('input').wrap('<form action="" method="POST" class="input-container"></form>');
                movsVerifiedTbl_filter.find('.input-container').append('<i class="icon-right"><button type="submit"><span class="icon-search"></span></button></i>');
                movsVerifiedTbl_filter.find('input')
                    .attr('id', 'search-movVerifiedTbl')
                    .attr('name', 'search-movVerifiedTbl');
            }

            if ($('#movsVerifiedFooter').length > 0) {
                $('#movsVerifiedFooter').prepend(`
                    <div class="mr-auto">
                        <button type="button"
                            class="d-none verifiedMOVS-operation primary-VerifiedMOVOperation btn btn-sm mr-3 "></button>
                        <button  type="button" class="d-none verifiedMOVS-operation btn btn-sm btn-secondary weight-500"
                            id="cancelVerifiedMOVOperation">Cancel</button>
                    </div>
                `);
            }

            // TABLE ACTIONS HANDLER

            // VERIFIED MOVS Table 
            const checkAllVerifiedCheckbox = document.getElementById('verifiedMOVS-checkAll');
            const verifiedMOVSChckElements = document.querySelectorAll('.verifiedMOVS-operation');


            if (checkAllVerifiedCheckbox) {
                // The checkAllVerifiedCheckbox element is present, so add the event listener
                checkAllVerifiedCheckbox.addEventListener('click', function () {
                    let currentCheckbox = document.querySelectorAll('.verifiedMOVsCheckbox');
                    currentCheckbox.forEach((checkbox, index) => {

                        checkbox.checked = checkAllVerifiedCheckbox.checked;
                    });

                    setTimeout(function () {
                        let itemsSelected = countChckedVerifiedMOV();
                        itemsSelected > 0 && alert(itemsSelected + " items selected.");
                    }, 0);
                });
            }

            function uncheckAllVerified() {
                verifiedMOVsCheckboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
                checkAllVerifiedCheckbox.checked = false;
            }

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



            const verifiedMOVSActElements = document.querySelectorAll('.verifiedMOVS-Actions');

            verifiedMOVSActElements.forEach(element => {
                element.addEventListener('click', function () {
                    verifiedMOVSChckElements.forEach(elements => {
                        elements.classList.remove('d-none');
                    });
                    verifiedMOVsCheckboxtd.forEach(elements => {
                        elements.classList.remove('d-none');
                    });
                });
            });

            const primaryVerifiedMOVOperBtn = document.querySelector('.primary-VerifiedMOVOperation');
            if (initDelVerifiedMOVButton) {
                // The initDelVerifiedMOVButton element is present, so add the event listener
                initDelVerifiedMOVButton.addEventListener('click', function () {
                    uncheckAllVerified();
                    primaryVerifiedMOVOperBtn.classList.add('btn-danger');
                    primaryVerifiedMOVOperBtn.textContent = 'Delete All Selected';

                    if (primaryVerifiedMOVOperBtn.classList.contains('btn-primary')) {
                        primaryVerifiedMOVOperBtn.classList.remove('btn-primary');
                        primaryVerifiedMOVOperBtn.removeAttribute('name');
                        primaryVerifiedMOVOperBtn.type = (primaryVerifiedMOVOperBtn.type !== 'button') ? 'button' : primaryVerifiedMOVOperBtn.type;
                    }

                    primaryVerifiedMOVOperBtn.addEventListener('click', function () {
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
            }

            if (initViewVerifiedMOVBtn) {
                // The initViewVerifiedMOVBtn element is present, so add the event listener
                initViewVerifiedMOVBtn.addEventListener('click', function () {
                    uncheckAllVerified();
                    primaryVerifiedMOVOperBtn.classList.add('btn-primary');
                    primaryVerifiedMOVOperBtn.textContent = 'View All Selected';
                    primaryVerifiedMOVOperBtn.type = (primaryVerifiedMOVOperBtn.type !== 'submit') ? 'submit' : primaryVerifiedMOVOperBtn.type;
                    primaryVerifiedMOVOperBtn.setAttribute('name', 'view');


                    // Check if the 'data-toggle' attribute is present before attempting to remove it
                    if (primaryVerifiedMOVOperBtn.hasAttribute('data-toggle')) {
                        primaryVerifiedMOVOperBtn.removeAttribute('data-toggle');
                    }

                    // Check if the 'data-target' attribute is present before attempting to remove it
                    if (primaryVerifiedMOVOperBtn.hasAttribute('data-target')) {
                        primaryVerifiedMOVOperBtn.removeAttribute('data-target');
                    }

                    if (primaryVerifiedMOVOperBtn.classList.contains('btn-danger')) {
                        primaryVerifiedMOVOperBtn.classList.remove('btn-danger');
                    }
                });
            }

            if (initDownloadVerifiedMOVBtn) {
                // The initDownloadVerifiedMOVBtn element is present, so add the event listener
                initDownloadVerifiedMOVBtn.addEventListener('click', function () {
                    uncheckAllVerified();
                    primaryVerifiedMOVOperBtn.classList.add('btn-primary');
                    primaryVerifiedMOVOperBtn.textContent = 'Download All Selected';
                    primaryVerifiedMOVOperBtn.setAttribute('name', 'download');
                    primaryVerifiedMOVOperBtn.type = (primaryVerifiedMOVOperBtn.type !== 'submit') ? 'submit' : primaryVerifiedMOVOperBtn.type;

                    // Check if the 'data-toggle' attribute is present before attempting to remove it
                    if (primaryVerifiedMOVOperBtn.hasAttribute('data-toggle')) {
                        primaryVerifiedMOVOperBtn.removeAttribute('data-toggle');
                    }

                    // Check if the 'data-target' attribute is present before attempting to remove it
                    if (primaryVerifiedMOVOperBtn.hasAttribute('data-target')) {
                        primaryVerifiedMOVOperBtn.removeAttribute('data-target');
                    }

                    if (primaryVerifiedMOVOperBtn.classList.contains('btn-danger')) {
                        primaryVerifiedMOVOperBtn.classList.remove('btn-danger');
                    }
                });
            }

            const cancelVerifiedMOVBtn = document.getElementById('cancelVerifiedMOVOperation');
            if (cancelVerifiedMOVBtn) {
                // The cancelVerifiedMOVBtn element is present, so add the event listener
                cancelVerifiedMOVBtn.addEventListener('click', function () {
                    const primaryVerifiedMOVOperBtn = document.querySelector('.primary-VerifiedMOVOperation');

                    if (primaryVerifiedMOVOperBtn) {
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
                        uncheckAllVerified();
                        primaryVerifiedMOVOperBtn.textContent = '';

                        verifiedMOVSChckElements.forEach(checkbox => {
                            checkbox.classList.add('d-none');
                        });
                        verifiedMOVsCheckboxtd.forEach(elements => {
                            elements.classList.add('d-none');
                        });
                    } else {
                        console.error('primaryVerifiedMOVOperBtn element not found');
                    }
                });
            }

            const cancelSelVerifiedMOV = document.getElementById('cancelSel-verifiedMOV');

            if (cancelSelVerifiedMOV) {
                // The cancelSelVerifiedMOV element is present, so add the event listener
                cancelSelVerifiedMOV.addEventListener('click', function () {
                    // Trigger the click event on cancelVerifiedMOVBtn
                    if (cancelVerifiedMOVBtn) {
                        cancelVerifiedMOVBtn.click();
                    }
                });
            }

            let dlbtn = document.querySelector('.primary-VerifiedMOVOperation');
            console.log(dlbtn);
            dlbtn.addEventListener('click', function () {
                if (dlbtn.name === 'download') {
                    // Serialize form data or prepare your data as needed
                    const formData = new FormData();
                    formData.append('download', 'true');
                    formData.append('movVerified[]'); // Add your file IDs dynamically

                    // Perform AJAX request
                    fetch('admin-mov-tbl-action.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.blob();
                        })
                        .then(blob => {
                            // Create a temporary link and trigger a click to download the file
                            const downloadLink = document.createElement('a');
                            downloadLink.href = URL.createObjectURL(blob);
                            downloadLink.download = 'downloaded_file_' + fileId + '.zip'; // You can set a default name or customize it
                            document.body.appendChild(downloadLink);
                            downloadLink.click();
                            document.body.removeChild(downloadLink);
                        })
                        .catch(error => {
                            console.error('Error during fetch operation:', error);
                        });
                }

            });
            
        }
    });

    const brgySelectOptions = [
        { value: 'all', label: 'All' },
        { value: 'Aplaya', label: 'Aplaya' },
        { value: 'Balibago', label: 'Balibago' },
        { value: 'Caingin', label: 'Caingin' },
        { value: 'Dila', label: 'Dila' },
        { value: 'Dita', label: 'Dita' },
        { value: 'Don Jose', label: 'Don Jose' },
        { value: 'Ibaba', label: 'Ibaba' },
        { value: 'Kanluran', label: 'Kanluran' },
        { value: 'Labas', label: 'Labas' },
        { value: 'Macabling', label: 'Macabling' },
        { value: 'Malitlit', label: 'Malitlit' },
        { value: 'Malusak', label: 'Malusak' },
        { value: 'Market Area', label: 'Market Area' },
        { value: 'Pooc', label: 'Pooc' },
        { value: 'Pulong Santa Cruz', label: 'Pulong Santa Cruz' },
        { value: 'Santo Domingo', label: 'Santo Domingo' },
        { value: 'Sinalhan', label: 'Sinalhan' },
        { value: 'Tagapo', label: 'Tagapo' }
    ];

    class brgySelect {
        constructor(containerId, selectName, selectId, options, selectClasses) {
            this.containerId = containerId;
            this.selectName = selectName;
            this.selectId = selectId;
            this.options = options;
            this.selectClasses = selectClasses;

            this.init();
        }

        init() {
            if (this.containerId && this.selectName && this.selectId) {
                // Create a new select element
                const selectElement = document.createElement('select');
                selectElement.name = this.selectName;
                selectElement.id = this.selectId;

                // Add specified classes to the select element
                if (this.selectClasses && Array.isArray(this.selectClasses)) {
                    selectElement.className = this.selectClasses.join(' ');
                }

                selectElement.setAttribute('data-dropup-auto', 'false');
                selectElement.setAttribute('title', 'Select Barangay');
                selectElement.setAttribute('data-style', 'btn-outline-primary');

                // Add options to the select element
                this.options.forEach(option => {
                    const optionElement = document.createElement('option');
                    optionElement.value = option.value;
                    optionElement.textContent = option.label;
                    selectElement.appendChild(optionElement);
                });

                // Add the onchange attribute to submit the form
                selectElement.addEventListener('change', function () {
                    this.form.submit();
                });

                // Append the select element to the specified container
                const container = document.getElementById(this.containerId);
                if (container) {
                    container.appendChild(selectElement);
                }
            } else {
                console.error('Missing required parameters for brgySelect');
            }
        }
    }


    // Request Overview Table
    const unverifiedReqCheckbox = document.querySelectorAll('.unverifiedReqCheckbox');
    const unverifiedReqCheckboxTd = document.querySelectorAll('.unverifiedReqCheckboxTd');


    $('#reqOverviewTbl').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        searching: true,
        bLengthChange: true,
        bPaginate: true,
        pagingType: "simple",
        bInfo: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        ordering: false, //disable sorting per column
        // sa dom ipapass ung structure depende sa pangangailangan ng table like ung 'f' at 't'
        // ung pagkaksunod sunod ng letters ay arrangment nila sa datatables
        // <> is equal to div so tas dyan ipapass ung id at class di pede child element
        // so structure lng pede sa dom like nesting lng ng div
        // so after mainitialize table saka ko nilalagay ung ibang elements via initComplete parameter
        //f = search dom
        // t = table dom
        // l = length menu (rows per page) dom
        // p = pagination dom
        dom: '<".pb-20 px-3"<".d-flex align-items-center my-3 mx-4"<"#reqOvwSelect.row"><"#reqOvwActions.table-util flex-shrink-0 ml-auto"f>>t><"#reqsOverviewFooter.d-flex justify-content-end px-3"lp> ',
        lengthMenu: [[5, 10, 25, -1], [5, 10, 25, "All"]],
        language: {
            // inovverride ko dto ung datatable element na l 
            lengthMenu: '<label class="d-inline-block ml-auto">Rows per page</label>' +
                '<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" ' +
                'class="width-fit custom-select custom-select-sm form-control form-control-sm mx-3">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="25">25</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">All</option>' +
                '</select>',
            searchPlaceholder: "Search",
            search: "", // clear search label
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>'
            }
        },
        "initComplete": function (settings, json) {

            // Example usage with classes parameter                       
            const reqTblClasses = ['col-md-12', 'col-sm-12', 'my-2', 'selectpicker', 'dropup'];

            const reqTblbrgySelect = new brgySelect('reqOvwSelect', 'brgySelectreqOvw', 'brgySelectreqOvw', brgySelectOptions, reqTblClasses);

            if ($('#reqOvwActions').length > 0) {
                // Append the provided HTML to the 'movOvwSelect' element
                $('#reqOvwActions').prepend(`
                <div class="btn-group  dropright">
                <button type="button" id="editOvwreq" class="dropdown-toggle mb-2" data-toggle="dropdown"
                    aria-expanded="false"><img class="" src="vendors/images/icon-edit.svg"
                        alt=""></button>
                <div class="card-box p-4 dropdown-menu">
                    <button type="button" id="reqOverview-initView"
                        class="reqOverview-Actions py-1 mb-1"><img class="mr-2"
                            src="vendors/images/icon-view.svg" alt="" srcset="">View
                        Files</button>
                    <button type="button" id="reqOverview-initDelete"
                        class="reqOverview-Actions py-1 " style="color: var(--red);">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="9"
                            height="10" viewBox="0 0 9 10" fill="none">
                            <path
                                d="M1.69576 8.82628C1.69576 9.06843 1.79195 9.30067 1.96318 9.4719C2.13441 9.64313 2.36665 9.73932 2.6088 9.73932H7.17402C7.41617 9.73932 7.64841 9.64313 7.81964 9.4719C7.99087 9.30067 8.08706 9.06843 8.08706 8.82628V3.34802H9.00011V2.43497H7.17402V1.52193C7.17402 1.27978 7.07782 1.04754 6.90659 0.876311C6.73537 0.705082 6.50313 0.608887 6.26098 0.608887H3.52185C3.27969 0.608887 3.04745 0.705082 2.87623 0.876311C2.705 1.04754 2.6088 1.27978 2.6088 1.52193V2.43497H0.782715V3.34802H1.69576V8.82628ZM3.52185 1.52193H6.26098V2.43497H3.52185V1.52193ZM3.06532 3.34802H7.17402V8.82628H2.6088V3.34802H3.06532Z"
                                fill="currentColor" />
                            <path
                                d="M3.52148 4.26074H4.43453V7.91292H3.52148V4.26074ZM5.34757 4.26074H6.26061V7.91292H5.34757V4.26074Z"
                                fill="currentColor" />
                        </svg>
                        Delete Files
                    </button>
                </div>
            </div>
            
                `);
            }


            if ($('#reqOverviewTbl_filter').length > 0) {
                $('#reqOverviewTbl_filter').addClass('d-inline-block pr-0');
            }

            let reqOverviewTbl_filter = $('#reqOverviewTbl_filter');
            if (reqOverviewTbl_filter.length > 0) {

                // Enclose the existing input in a new div with class "input-container"
                reqOverviewTbl_filter.find('input').wrap('<form action="" method="POST" class="input-container"></form>');
                reqOverviewTbl_filter.find('.input-container').append('<i class="icon-right"><button type="submit"><span class="icon-search"></button></span></i>');
                reqOverviewTbl_filter.find('input')
                    .attr('id', 'search-reqOvwTbl')
                    .attr('name', 'search-reqOvwTbl');
            }

            if ($('#reqsOverviewFooter').length > 0) {
                // Append the provided HTML to the 'movOvwSelect' element
                $('#reqsOverviewFooter').prepend(`
                    <div class="mr-auto">
                    <button type="button"
                        class="d-none reqOverviewOperation primary-reqOverviewOperation btn btn-sm mr-3 "></button>
                    <button type="button" class="d-none reqOverviewOperation btn btn-sm btn-secondary weight-500"
                        id="cancelreqOverviewOperation">Cancel</button>
                    </div>
                `);
            }

            // TABLE ACTIONS HANDLER
            const checkAllCheckbox = document.getElementById('reqOverviewSelectAll');
            const unverifiedMOVSChckElements = document.querySelectorAll('.reqOverviewOperation');
            // Assuming you want to check the first 5 checkboxes initially

            // Function to check checkboxes in the specified range
            function checkCheckboxes(start, end) {

                unverifiedReqCheckbox.forEach((checkbox, index) => {
                    checkbox.checked = index >= start && index <= end;
                });
            }

            // Add a click event listener to the "Check All" checkbox
            if (checkAllCheckbox) {
                checkAllCheckbox.addEventListener('click', function () {
                    let currentCheckbox = document.querySelectorAll('.unverifiedReqCheckbox');
                    currentCheckbox.forEach((checkbox, index) => {
                        checkbox.checked = checkAllCheckbox.checked;
                    });
                    setTimeout(function () {
                        let itemsSelected = countChckedUnverifiedMOV();
                        itemsSelected > 0 && alert(itemsSelected + " items selected.");
                    }, 0);
                });
            }

            function uncheckAllUnverified() {
                unverifiedReqCheckbox.forEach(checkbox => {
                    checkbox.checked = false;
                });
                checkAllCheckbox.checked = false;
            }

            function countChckedUnverifiedMOV() {
                let checkedCount = 0;
                unverifiedReqCheckbox.forEach(checkbox => {
                    if (checkbox.checked) {
                        checkedCount++;
                    }
                });
                return checkedCount;
            }

            // Get the unverifiedMOVS-initDelete button
            const initDelUnverifiedMOVButton = document.getElementById('reqOverview-initDelete');
            const initViewUnverifiedMOVBtn = document.getElementById('reqOverview-initView');
            const initDownloadUnverifiedMOVBtn = document.getElementById('reqOverview-initDownload');



            // Get all elements with the class 'unverifiedMOVS-Actions'
            const unverifiedMOVSActElements = document.querySelectorAll('.reqOverview-Actions');

            // Add a click event listener to each element
            unverifiedMOVSActElements.forEach(element => {
                element.addEventListener('click', function () {
                    // Loop through each checkbox and remove the d-none class
                    unverifiedMOVSChckElements.forEach(elements => {
                        elements.classList.remove('d-none');
                    });
                    unverifiedReqCheckboxTd.forEach(elements => {
                        elements.classList.remove('d-none');
                    });
                });
            });


            // Add click event listener to the unverifiedMOVS-initDelete button
            if (initDelUnverifiedMOVButton) {
                // The initDelUnverifiedMOVButton element is present, so add the event listener
                initDelUnverifiedMOVButton.addEventListener('click', function () {
                    uncheckAllUnverified();
                    const primaryUnvMOVOperBtn = document.querySelector('.primary-reqOverviewOperation')

                    primaryUnvMOVOperBtn.classList.add('btn-danger');
                    primaryUnvMOVOperBtn.textContent = 'Delete All Selected';
                    if (primaryUnvMOVOperBtn.classList.contains('btn-primary')) {
                        primaryUnvMOVOperBtn.classList.remove('btn-primary');
                        primaryUnvMOVOperBtn.removeAttribute('name');
                        primaryUnvMOVOperBtn.type = (primaryUnvMOVOperBtn.type !== 'button') ? 'button' : primaryUnvMOVOperBtn.type;
                    }
                    // Add click event listener to the unverifiedMOVS-initDelete button
                    primaryUnvMOVOperBtn.addEventListener('click', function () {
                        if (primaryUnvMOVOperBtn.classList.contains('btn-danger')) {
                            if (countChckedUnverifiedMOV() > 0) {
                                primaryUnvMOVOperBtn.setAttribute('data-toggle', 'modal');
                                primaryUnvMOVOperBtn.setAttribute('data-target', '#delreqOverviewModal');
                            } else {
                                primaryUnvMOVOperBtn.removeAttribute('data-toggle');
                                primaryUnvMOVOperBtn.removeAttribute('data-target');
                            }
                        }
                    });
                });
            }

            if (initViewUnverifiedMOVBtn) {
                // The initViewUnverifiedMOVBtn element is present, so add the event listener
                initViewUnverifiedMOVBtn.addEventListener('click', function () {
                    uncheckAllUnverified();
                    const primaryUnvMOVOperBtn = document.querySelector('.primary-reqOverviewOperation');
                    primaryUnvMOVOperBtn.classList.add('btn-primary');
                    primaryUnvMOVOperBtn.textContent = 'View All Selected';
                    primaryUnvMOVOperBtn.setAttribute('name', 'view');


                    primaryUnvMOVOperBtn.type = (primaryUnvMOVOperBtn.type !== 'submit') ? 'submit' : primaryUnvMOVOperBtn.type;
                    // Check if the 'data-toggle' attribute is present before attempting to remove it
                    primaryUnvMOVOperBtn.hasAttribute('data-toggle') ? primaryUnvMOVOperBtn.removeAttribute('data-toggle') : null;

                    // Remove 'data-target' attribute
                    primaryUnvMOVOperBtn.hasAttribute('data-target') ? primaryUnvMOVOperBtn.removeAttribute('data-target') : null;

                    // Remove 'btn-danger' class
                    primaryUnvMOVOperBtn.classList.contains('btn-danger') ? primaryUnvMOVOperBtn.classList.remove('btn-danger') : null;

                });
            }

            const cancelUnverifiedMOVBtn = document.getElementById('cancelreqOverviewOperation');
            if (cancelUnverifiedMOVBtn) {
                // The cancelUnverifiedMOVBtn element is present, so add the event listener
                cancelUnverifiedMOVBtn.addEventListener('click', function () {
                    const primaryUnvMOVOperBtn = document.querySelector('.primary-reqOverviewOperation');

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
                    uncheckAllUnverified();
                    primaryUnvMOVOperBtn.textContent = '';

                    unverifiedMOVSChckElements.forEach(checkbox => {
                        checkbox.classList.add('d-none');
                    });
                    unverifiedReqCheckboxTd.forEach(elements => {
                        elements.classList.add('d-none');
                    });
                });
            }

            const cancelSelUnverifiedMOV = document.getElementById('cancelreqOverviewModal');
            if (cancelSelUnverifiedMOV) {
                // The cancelSelUnverifiedMOV element is present, so add the event listener
                cancelSelUnverifiedMOV.addEventListener('click', function () {
                    // Check if the cancelUnverifiedMOVBtn element is present before triggering its click event
                    if (cancelUnverifiedMOVBtn) {
                        cancelUnverifiedMOVBtn.click();
                    }
                });
            }
        },

    });

    // Request Verified Table

    const verifiedReqCheckbox = document.querySelectorAll('.verifiedReqCheckbox');
    const verifiedReqCheckboxTd = document.querySelectorAll('.verifiedReqCheckboxTd');


    $('#reqVerifiedTbl').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        searching: true,
        bLengthChange: true,
        bPaginate: true,
        pagingType: "simple",
        bInfo: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        ordering: false, //disable sorting per column
        // sa dom ipapass ung structure depende sa pangangailangan ng table like ung 'f' at 't'
        // ung pagkaksunod sunod ng letters ay arrangment nila sa datatables
        // <> is equal to div so tas dyan ipapass ung id at class di pede child element
        // so structure lng pede sa dom like nesting lng ng div
        // so after mainitialize table saka ko nilalagay ung ibang elements via initComplete parameter
        //f = search dom
        // t = table dom
        // l = length menu (rows per page) dom
        // p = pagination dom
        dom: '<".pb-20 px-3"<".d-flex align-items-center my-3 mx-4"<"#reqVerifiedSelect.row"><"#reqVerifiedActions.table-util flex-shrink-0 ml-auto"f>>t><"#reqsVerifiedFooter.d-flex justify-content-end px-3"lp> ',
        lengthMenu: [[5, 10, 25, -1], [5, 10, 25, "All"]],
        language: {
            // inovverride ko dto ung datatable element na l 
            lengthMenu: '<label class="d-inline-block ml-auto">Rows per page</label>' +
                '<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" ' +
                'class="width-fit custom-select custom-select-sm form-control form-control-sm mx-3">' +
                '<option value="5">5</option>' +
                '<option value="10">10</option>' +
                '<option value="25">25</option>' +
                '<option value="50">50</option>' +
                '<option value="-1">All</option>' +
                '</select>',
            searchPlaceholder: "Search",
            search: "", // clear search label
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>'
            }
        },
        "initComplete": function (settings, json) {

            // Example usage with classes parameter                       
            const reqTblClasses = ['col-md-12', 'col-sm-12', 'my-2', 'selectpicker', 'dropup'];

            const reqTblbrgySelect = new brgySelect('reqVerifiedSelect', 'brgySelectreqVerified', 'brgySelectreqVerified', brgySelectOptions, reqTblClasses);

            if ($('#reqVerifiedActions').length > 0) {
                // Append the provided HTML to the 'movOvwSelect' element
                $('#reqVerifiedActions').prepend(`
                <div class="btn-group  dropright">
                <button type="button" id="editVerifiedreq" class="dropdown-toggle mb-2" data-toggle="dropdown"
                    aria-expanded="false"><img class="" src="vendors/images/icon-edit.svg"
                        alt=""></button>
                <div class="card-box p-4 dropdown-menu">
                    <button type="button" id="reqVerified-initView"
                        class="reqVerified-Actions py-1 mb-1"><img class="mr-2"
                            src="vendors/images/icon-view.svg" alt="" srcset="">View
                        Files</button>
                    <button type="button" id="reqVerified-initDelete"
                        class="reqVerified-Actions py-1 " style="color: var(--red);">
                        <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="9"
                            height="10" viewBox="0 0 9 10" fill="none">
                            <path
                                d="M1.69576 8.82628C1.69576 9.06843 1.79195 9.30067 1.96318 9.4719C2.13441 9.64313 2.36665 9.73932 2.6088 9.73932H7.17402C7.41617 9.73932 7.64841 9.64313 7.81964 9.4719C7.99087 9.30067 8.08706 9.06843 8.08706 8.82628V3.34802H9.00011V2.43497H7.17402V1.52193C7.17402 1.27978 7.07782 1.04754 6.90659 0.876311C6.73537 0.705082 6.50313 0.608887 6.26098 0.608887H3.52185C3.27969 0.608887 3.04745 0.705082 2.87623 0.876311C2.705 1.04754 2.6088 1.27978 2.6088 1.52193V2.43497H0.782715V3.34802H1.69576V8.82628ZM3.52185 1.52193H6.26098V2.43497H3.52185V1.52193ZM3.06532 3.34802H7.17402V8.82628H2.6088V3.34802H3.06532Z"
                                fill="currentColor" />
                            <path
                                d="M3.52148 4.26074H4.43453V7.91292H3.52148V4.26074ZM5.34757 4.26074H6.26061V7.91292H5.34757V4.26074Z"
                                fill="currentColor" />
                        </svg>
                        Delete Files
                    </button>
                </div>
            </div>
            
                `);
            }


            if ($('#reqVerifiedTbl_filter').length > 0) {
                $('#reqVerifiedTbl_filter').addClass('d-inline-block pr-0');
            }

            let reqVerifiedTbl_filter = $('#reqVerifiedTbl_filter');
            if (reqVerifiedTbl_filter.length > 0) {

                // Enclose the existing input in a new div with class "input-container"
                reqVerifiedTbl_filter.find('input').wrap('<form action="" method="POST" class="input-container"></form>');
                reqVerifiedTbl_filter.find('.input-container').append('<i class="icon-right"><button type="submit"><span class="icon-search"></button></span></i>');
                reqVerifiedTbl_filter.find('input')
                    .attr('id', 'search-reqVerifiedTbl')
                    .attr('name', 'search-reqVerifiedTbl');
            }

            if ($('#reqsVerifiedFooter').length > 0) {
                // Append the provided HTML to the 'movOvwSelect' element
                $('#reqsVerifiedFooter').prepend(`
                    <div class="mr-auto">
                    <button type="button"
                        class="d-none reqVerifiedOperation primary-reqVerifiedOperation btn btn-sm mr-3 "></button>
                    <button type="button" class="d-none reqVerifiedOperation btn btn-sm btn-secondary weight-500"
                        id="cancelreqVerifiedOperation">Cancel</button>
                    </div>
                `);
            }

            // TABLE ACTIONS HANDLER
            const checkAllCheckbox = document.getElementById('reqVerifiedSelectAll');
            const unverifiedMOVSChckElements = document.querySelectorAll('.reqVerifiedOperation');

            // Add a click event listener to the "Check All" checkbox
            if (checkAllCheckbox) {
                checkAllCheckbox.addEventListener('click', function () {

                    let currentCheckbox = document.querySelectorAll('.verifiedReqCheckbox');
                    currentCheckbox.forEach((checkbox, index) => {

                        checkbox.checked = checkAllCheckbox.checked;
                    });
                    setTimeout(function () {
                        let itemsSelected = countChckedUnverifiedMOV();
                        console.log(itemsSelected);
                        itemsSelected > 0 && alert(itemsSelected + " items selected.");
                    }, 0);
                });
            }

            function uncheckAllUnverified() {
                verifiedReqCheckbox.forEach(checkbox => {
                    checkbox.checked = false;
                });
                checkAllCheckbox.checked = false;
            }

            function countChckedUnverifiedMOV() {
                let checkedCount = 0;
                verifiedReqCheckbox.forEach(checkbox => {
                    if (checkbox.checked) {
                        checkedCount++;
                    }
                });
                return checkedCount;
            }

            // Get the unverifiedMOVS-initDelete button
            const initDelUnverifiedMOVButton = document.getElementById('reqVerified-initDelete');
            const initViewUnverifiedMOVBtn = document.getElementById('reqVerified-initView');



            // Get all elements with the class 'unverifiedMOVS-Actions'
            const unverifiedMOVSActElements = document.querySelectorAll('.reqVerified-Actions');

            // Add a click event listener to each element
            unverifiedMOVSActElements.forEach(element => {
                element.addEventListener('click', function () {
                    // Loop through each checkbox and remove the d-none class
                    unverifiedMOVSChckElements.forEach(elements => {
                        elements.classList.remove('d-none');
                    });
                    verifiedReqCheckboxTd.forEach(elements => {
                        elements.classList.remove('d-none');
                    });
                });
            });


            // Add click event listener to the unverifiedMOVS-initDelete button
            if (initDelUnverifiedMOVButton) {
                // The initDelUnverifiedMOVButton element is present, so add the event listener
                initDelUnverifiedMOVButton.addEventListener('click', function () {
                    uncheckAllUnverified();
                    const primaryUnvMOVOperBtn = document.querySelector('.primary-reqVerifiedOperation')

                    primaryUnvMOVOperBtn.classList.add('btn-danger');
                    primaryUnvMOVOperBtn.textContent = 'Delete All Selected';
                    if (primaryUnvMOVOperBtn.classList.contains('btn-primary')) {
                        primaryUnvMOVOperBtn.classList.remove('btn-primary');
                        primaryUnvMOVOperBtn.removeAttribute('name');
                        primaryUnvMOVOperBtn.type = (primaryUnvMOVOperBtn.type !== 'button') ? 'button' : primaryUnvMOVOperBtn.type;
                    }
                    // Add click event listener to the unverifiedMOVS-initDelete button
                    primaryUnvMOVOperBtn.addEventListener('click', function () {
                        if (primaryUnvMOVOperBtn.classList.contains('btn-danger')) {
                            console.log(countChckedUnverifiedMOV());
                            if (countChckedUnverifiedMOV() > 0) {
                                primaryUnvMOVOperBtn.setAttribute('data-toggle', 'modal');
                                primaryUnvMOVOperBtn.setAttribute('data-target', '#delreqVerifiedModal');
                            } else {
                                primaryUnvMOVOperBtn.removeAttribute('data-toggle');
                                primaryUnvMOVOperBtn.removeAttribute('data-target');
                            }
                        }
                    });
                });
            }

            if (initViewUnverifiedMOVBtn) {
                // The initViewUnverifiedMOVBtn element is present, so add the event listener
                initViewUnverifiedMOVBtn.addEventListener('click', function () {
                    uncheckAllUnverified();
                    const primaryUnvMOVOperBtn = document.querySelector('.primary-reqVerifiedOperation');
                    primaryUnvMOVOperBtn.classList.add('btn-primary');
                    primaryUnvMOVOperBtn.textContent = 'View All Selected';
                    primaryUnvMOVOperBtn.setAttribute('name', 'view');


                    primaryUnvMOVOperBtn.type = (primaryUnvMOVOperBtn.type !== 'submit') ? 'submit' : primaryUnvMOVOperBtn.type;
                    // Check if the 'data-toggle' attribute is present before attempting to remove it
                    primaryUnvMOVOperBtn.hasAttribute('data-toggle') ? primaryUnvMOVOperBtn.removeAttribute('data-toggle') : null;

                    // Remove 'data-target' attribute
                    primaryUnvMOVOperBtn.hasAttribute('data-target') ? primaryUnvMOVOperBtn.removeAttribute('data-target') : null;

                    // Remove 'btn-danger' class
                    primaryUnvMOVOperBtn.classList.contains('btn-danger') ? primaryUnvMOVOperBtn.classList.remove('btn-danger') : null;

                });
            }

            const cancelUnverifiedMOVBtn = document.getElementById('cancelreqVerifiedOperation');
            if (cancelUnverifiedMOVBtn) {
                // The cancelUnverifiedMOVBtn element is present, so add the event listener
                cancelUnverifiedMOVBtn.addEventListener('click', function () {
                    const primaryUnvMOVOperBtn = document.querySelector('.primary-reqVerifiedOperation');

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
                    uncheckAllUnverified();
                    primaryUnvMOVOperBtn.textContent = '';

                    unverifiedMOVSChckElements.forEach(checkbox => {
                        checkbox.classList.add('d-none');
                    });
                    verifiedReqCheckboxTd.forEach(elements => {
                        elements.classList.add('d-none');
                    });
                });
            }

            const cancelSelUnverifiedMOV = document.getElementById('cancelreqVerifiedModal');
            if (cancelSelUnverifiedMOV) {
                // The cancelSelUnverifiedMOV element is present, so add the event listener
                cancelSelUnverifiedMOV.addEventListener('click', function () {
                    // Check if the cancelUnverifiedMOVBtn element is present before triggering its click event
                    if (cancelUnverifiedMOVBtn) {
                        cancelUnverifiedMOVBtn.click();
                    }
                });
            }
        },

    });

    $('#financialSubmissionTbl').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        searching: false,
        bLengthChange: true,
        bPaginate: true,
        pagingType: "full_numbers", // with first and last paging button
        bInfo: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        ordering: false, //disable sorting per column
        //f = search dom
        // t = table dom
        // l = length menu (rows per page) dom
        // p = pagination dom
        // inthis case only table and pagination so t and p are added
        dom: '<"pl-5 pr-4 mt-5 mb-4" t><".ml-auto mb-4" p>',
        lengthMenu: [[5, 10, 25, -1], [5, 10, 25, "All"]],
        language: {
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>',
            }
        },
    });

    $('#disasterSubmissionTbl').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        searching: false,
        bLengthChange: true,
        bPaginate: true,
        pagingType: "full_numbers", // with first and last paging button
        bInfo: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        ordering: false, //disable sorting per column
        //f = search dom
        // t = table dom
        // l = length menu (rows per page) dom
        // p = pagination dom
        // inthis case only table and pagination so t and p are added
        dom: '<"pl-5 pr-4 mt-5 mb-4" t><".ml-auto mb-4" p>',
        lengthMenu: [[5, 10, 25, -1], [5, 10, 25, "All"]],
        language: {
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>',
                last: '<i class="ion-chevron-right"></i><i class="ion-chevron-right"></i>',
                first: '<i class="ion-chevron-left"></i><i class="ion-chevron-left"></i>',
            }
        },
    });

    $('#SafePOSubmissionTbl').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        searching: false,
        bLengthChange: true,
        bPaginate: true,
        pagingType: "full_numbers", // with first and last paging button
        bInfo: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        ordering: false, //disable sorting per column
        //f = search dom
        // t = table dom
        // l = length menu (rows per page) dom
        // p = pagination dom
        // inthis case only table and pagination so t and p are added
        dom: '<"pl-5 pr-4 mt-5 mb-4" t><".ml-auto mb-4" p>',
        lengthMenu: [[5, 10, 25, -1], [5, 10, 25, "All"]],
        language: {
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>',
            }
        },
    });

    $('#SocPSSubmissionTbl').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        searching: false,
        bLengthChange: true,
        bPaginate: true,
        pagingType: "full_numbers", // with first and last paging button
        bInfo: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        ordering: false, //disable sorting per column
        //f = search dom
        // t = table dom
        // l = length menu (rows per page) dom
        // p = pagination dom
        // inthis case only table and pagination so t and p are added
        dom: '<"pl-5 pr-4 mt-5 mb-4" t><".ml-auto mb-4" p>',
        lengthMenu: [[5, 10, 25, -1], [5, 10, 25, "All"]],
        language: {
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>',
            }
        },
    });

    $('#BusnFCSubmissionTbl').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        searching: false,
        bLengthChange: true,
        bPaginate: true,
        pagingType: "full_numbers", // with first and last paging button
        bInfo: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        ordering: false, //disable sorting per column
        //f = search dom
        // t = table dom
        // l = length menu (rows per page) dom
        // p = pagination dom
        // inthis case only table and pagination so t and p are added
        dom: '<"pl-5 pr-4 mt-5 mb-4" t><".ml-auto mb-4" p>',
        lengthMenu: [[5, 10, 25, -1], [5, 10, 25, "All"]],
        language: {
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>',
            }
        },
    });

    $('#EnvMSubmissionTbl').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        searching: false,
        bLengthChange: true,
        bPaginate: true,
        pagingType: "full_numbers", // with first and last paging button
        bInfo: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        ordering: false, //disable sorting per column
        //f = search dom
        // t = table dom
        // l = length menu (rows per page) dom
        // p = pagination dom
        // inthis case only table and pagination so t and p are added
        dom: '<"pl-5 pr-4 mt-5 mb-4" t><".ml-auto mb-4" p>',
        lengthMenu: [[5, 10, 25, -1], [5, 10, 25, "All"]],
        language: {
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>',
            }
        },
    });

    $('#request_table').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        searching: false,
        bLengthChange: true,
        bPaginate: true,
        pagingType: "full_numbers", // with first and last paging button
        bInfo: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        ordering: false, //disable sorting per column
        //f = search dom
        // t = table dom
        // l = length menu (rows per page) dom
        // p = pagination dom
        // inthis case only table and pagination so t and p are added
        dom: '<"pl-5 pr-4 mt-5 mb-4" t><".ml-auto mb-4" p>',
        lengthMenu: [[5, 10, 25, -1], [5, 10, 25, "All"]],
        language: {
            paginate: {
                next: '<i class="ion-chevron-right"></i>',
                previous: '<i class="ion-chevron-left"></i>',
            }
        },
    });


});

