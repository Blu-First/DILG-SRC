$('document').ready(function(){
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
            search:"", // clear search label
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
        console.log("Header");
        submittedTblHeader.prepend('<div class="h2 my-4">Submissions</div>');
    }
    var submittedTblFilter = $('#submittedTbl_filter');

    if (submittedTblFilter.length > 0) {
        // Enclose the existing input in a new div with class "input-container"
        submittedTblFilter.find('input').wrap('<form action="" method="POST" class="input-container"></form>');
        submittedTblFilter.find('.input-container').append('<i class="icon-right"><button type="submit"><span class="icon-search"></button></span></i>');
        submittedTblFilter.find('input')
            .attr('id', 'search-submittedTbl')
            .attr('name', 'search-submittedTbl');
    }
});