<?php


$connect = mysqli_connect("localhost", "root", '', "patientinfo");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM information
	WHERE NID LIKE '%".$search."%'
	OR FirstName LIKE '%".$search."%'

	";
}
else
{
	$query = "
	SELECT * FROM information ORDER BY NID";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
	<style>
	table {
	  border-collapse: collapse;
	  width: 100%;
	}

	th, td {
	  text-align: left;
	  padding: 8px;
	}

	tr:nth-child(even){background-color: #f2f2f2}

	th {
	  background-color: #3973ac;
	  color: white;
	}
	</style>
					<table class="table">
						<tr>
							<th>NID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Sex</th>
                            <th>Blood Group</th>
                            <th>Occupation</th>
                            <th>DOB</th>
                            <th>Phone Number</th>
                            <th>Emergency Contact</th>
                            <th>Diseases</th>
                            <th>Allergies</th>
                            <th>Condition</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["NID"].'</td>
				<td>'.$row["FirstName"].'</td>
				<td>'.$row["LastName"].'</td>
				<td>'.$row["sex"].'</td>
				<td>'.$row["BLOODGROUP"].'</td>
				<td>'.$row["Occupation"].'</td>
				<td>'.$row["DOB"].'</td>
				<td>'.$row["Phone_No"].'</td>
				<td>'.$row["Emergency_No"].'</td>
				<td>'.$row["Diseases"].'</td>
				<td>'.$row["Allergies"].'</td>
				<td>'.$row["PCondition"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>
