<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		  <link rel="stylesheet" href="css/style.css">
		<title>Search Results</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	</head>
	<body>

		<nav class="menu">

          <a href="index.html">Home</a> &nbsp; &nbsp; &nbsp;
          <a href="about.html">About Us</a> &nbsp; &nbsp; &nbsp;
        <a href="addPatient.html">Add Patient</a>&nbsp; &nbsp; &nbsp;
          <a href="searchindex.php">Search Patient</a>&nbsp; &nbsp; &nbsp;
          <a href="mapapi.html">Locate Us</a>&nbsp; &nbsp; &nbsp;


      </nav>

		<div class="container">
			<br />
			<br />
			<br />
			<h2 class="header" align="center">Live Search Using NID</h2><br />
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
				</div>
			</div>
			<br />
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		<br />

		<br />
		<br />
		<br />
	</body>
</html>


<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}

	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();
		}
	});
});
</script>
