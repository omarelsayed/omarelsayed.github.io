<?php

include "connection.php";

$user_name=$_POST["userName"];
$telphone=$_POST["telephone"];
$address=$_POST["address"];


//Preparing query Statement. 
$query="insert into data(user_name, telephone_number, address) values ('$user_name','$telphone','$address')";

$insert = mysqli_query($connection, $query);

if(!$insert){
    die("Query Failed ".mysqli_error($connection));
}

header("Location: addressBookManager.php");


?>