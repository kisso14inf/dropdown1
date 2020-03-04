<!DOCTYPE html>
<html>

<head>
	<style>
		table {
			width: 100%;
			border-collapse: collapse;
		}

		table,
		td,
		th {
			border: 1px solid black;
			padding: 5px;
		}

		th {
			text-align: left;
		}
	</style>
</head>

<body>

	<?php
	$q = $_GET['q'];

	$con = mysqli_connect("localhost", "dropdown", "dropdown", "dropdown");
	if (!$con) {
		die('Could not connect: ' . mysqli_error($con));
	}
	
	mysqli_select_db($con, "dropdown");
$sql = "SELECT moti.megnevezes
FROM auto_tipusok auti
inner join kapocs k on k.auto_id = auti.id
inner join model_tipusok moti on moti.id = k.model_id WHERE auti.megnevezes = '" . $q . "'";
	$result = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($result)) {
		
		echo "<option value='" . $row["megnevezes"] . "'>" . $row["megnevezes"] . "</td>";
		
	}
	mysqli_close($con);
	?>
</body>

</html>