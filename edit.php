<?php

include "connection.php";

global $id;

if(isset($_GET['edit'])){
	$id=$_GET['edit'];

	$query = "SELECT * FROM data WHERE user_id = {$id}";
    $select_data= mysqli_query($connection, $query);

    while($row =mysqli_fetch_assoc($select_data)){

        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $telephone = $row['telephone_number'];
        $address = $row['address'];

    }
}

if(isset($_POST['update'])){


	$update_user_name=$_POST['userName'];
	$update_telephone=$_POST['telephone'];
	$update_address=$_POST['address'];

	$query = "UPDATE data SET ";
	$query .= "user_name = '{$update_user_name}',";
	$query .= "telephone_number = '{$update_telephone}',";
	$query .= "address = '{$update_address}'";
	$query .= " WHERE user_id = $id";

	$edit = mysqli_query($connection, $query);
	if(!$edit){
	    die("Query Failed ".mysqli_error($connection));
	}

	header("Location: index.php");
}


?>


<?php include "connection.php";?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
		<style>
			body{
				background-color: #d1d6d4;
			}
			.container{
				margin: 100px auto;
				width: 50%;
				border: 1px solid white;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<form action="" method="POST">
			  <div class="form-group">
			    <label for="Name">Name</label>
			    <input type="text" class="form-control" name="userName" placeholder="Enter Your Name " value="<?php echo $user_name ; ?>">
			  </div>
			  <div class="form-group">
			    <label for="Phone Number">Phone Number</label>
			    <input type="text" class="form-control" name="telephone" placeholder="Phone Number" value="<?php echo $telephone ; ?>">
			  </div>
			  <div class="form-group">
			   	<label for="Address">Address</label>
			    <input type="text" class="form-control" name="address" placeholder="Enter Address" value="<?php echo $address ;?>">
			  </div>
			  <button type="submit" class="btn btn-primary" name="update" value="update">Update</button>
			</form>
		</div>
	</body>
</html>
