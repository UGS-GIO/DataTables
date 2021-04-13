<!DOCTYPE html>
<html lang="en">

<head>
	<title id='Description'>Filtered GWP Maps</title>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
	
<style>
th.dt-head-center {
    vertical-align: middle;
}	
th.dt-center {
    vertical-align: middle;
}
td.dt-center a {
    vertical-align: middle;
}
td.dt-head-center a {
    vertical-align: middle;
}
</style>	
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable( {
				ajax: {
					url: "https://geology.utah.gov/apps/publications/GWdataTest.php",
					dataSrc: ""
				},
			    columns: [
					{ data: "pub_year" },
					{ data: "pub_name" },
					{ data: "pub_author" },
					{ data: "series_id" },
					{ data: "pdf_link4AlphList" },
					{ data: "buy_link4AlphList" }
				],
				order: [[ 0, 'desc' ]],
				columnDefs: [
					{
						targets: [0, 3, 4, 5],
						className: 'dt-center'
					},
					{
						targets: [2, 1],
						className: 'dt-head-center'
					},
					{
						targets: [0, 3, 4, 5],
						width: '60px'
					},
					{
						targets: [1],
						width: '250px'
					},
					{
						targets: [2],
						width: '200px'
					},
				],
				fixedHeader: true,
				paging: false,
				scrollY: 500,
				scrollCollapse: true,
				scrollX: true,

			});
		});
	</script>


</head>

<body class='default'>


	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Date</th>
                <th>Publication Name</th>
                <th>Authors</th>
				<th>Series #</th>
                <th>PDF File</th>
                <th>Purchase</th>
			</tr>
        </thead>
    </table>

</html>
