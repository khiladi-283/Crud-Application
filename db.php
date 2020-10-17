<?php

session_start();



$edit_state = false;
$id = 0;
$name = "";
$email = "";

// connect to database

$db = mysqli_connect('localhost','root','','info');


//execute a query

if(isset($_POST["save"]))
{
	$name = $_POST['uname'];
	$email = $_POST['email'];

	$query = "insert into register
	(name , email) values
	('".$name."' , '".$email."')";

	mysqli_query($db , $query);

	$_SESSION['msg'] = "Information Saved";

	header('location: index.php');
}

// update the records

if(isset($_POST["update"]))
{
	$name = $_POST["uname"];
	$email = $_POST["email"];
	$id = $_POST["id"];

	$query = "update register set
	name='".$name."', email='".$email."'
	where id='".$id."'";

	mysqli_query($db,$query);
	
	$_SESSION['msg'] = "Information Updated";
	header('location: index.php');
}

// delete a record

if(isset($_GET['del']))
{
	$id = $_GET['del'];
	mysqli_query($db, "delete from register
	where id =$id");

	$_SESSION['msg'] = "Information Deleted";
	header('location: index.php');
}

// retrieve record
$results = mysqli_query($db,"select * from register");
?>
