
<?php include "connection.php";?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
		<style>
			body{
				background-color: #f2c982;
			}
			.container{
				margin: 100px auto;
				width: 50%;
				border: 1px solid white;
			}
			a{
				text-decoration: none;
				color: black;
			}
			a:hover{
				text-decoration: none;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<form action="insert.php" method="POST">
			  <div class="form-group">
			    <label for="Name">Name</label>
			    <input type="text" class="form-control" name="userName" placeholder="Enter Your Name ">
			  </div>
			  <div class="form-group">
			    <label for="Phone Number">Phone Number</label>
			    <input type="text" class="form-control" name="telephone" placeholder="Phone Number">
			  </div>
			  <div class="form-group">
			   	<label for="Address">Address</label>
			    <input type="text" class="form-control" name="address" placeholder="Enter Address">
			  </div>
			  <button type="submit" class="btn btn-primary" name="">Submit</button>
			</form>

			<table class="table table-bordered table-hover">
			    <thead>
			        <tr>
			            <th>Name</th>
			            <th>Telephone Number</th>
			            <th>Address</th>
			            <th>Edit</th>
			            <th>Delete</th>
			        </tr>
			    </thead>
			    <tbody>
					<?php

			    $query = "SELECT * FROM data";
        		$select_data= mysqli_query($connection, $query);

			    while($row = mysqli_fetch_assoc($select_data)){
			    	$user_id = $row['user_id'];
			    	$user_name = $row['user_name'];
			    	$telephone = $row['telephone_number'];
			    	$address = $row['address'];

			    	echo "<tr>";

			    	echo "<td>$user_name</td>";
			    	echo "<td>$telephone</td>";
			    	echo "<td>$address</td>";
			    	echo "<td><a href='edit.php?edit=$user_id'>Edit</a></td>";
        			echo "<td><a href='index.php?delete=$user_id'>Delete</a></td>";

					echo "</tr>";
			    	}

			    	if(isset($_GET['delete'])){
			    		$id=$_GET['delete'];

			    		$query = "DELETE FROM data WHERE user_id='$id'";
			    		$delete = mysqli_query($connection, $query);

			    		header("Location: index.php");
			    	}


			    	?>
			    </tbody>
			</table>
		</div>
	</body>
</html>
