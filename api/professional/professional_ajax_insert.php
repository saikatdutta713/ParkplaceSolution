<?php
session_start();

if($_SERVER['HTTP_HOST'] == "localhost"){
  include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
  include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$name=mysqli_real_escape_string($conn,$_POST['name']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$ph_no=mysqli_real_escape_string($conn,$_POST['ph_no']);
$address=mysqli_real_escape_string($conn,$_POST['address']);
$profession=mysqli_real_escape_string($conn,$_POST['profession']);
$qualification=mysqli_real_escape_string($conn,$_POST['qualification']);
$gender=mysqli_real_escape_string($conn,$_POST['gender']);
$password=mysqli_real_escape_string($conn,$_POST['password']);

$sql="insert into temp_p_details ( p_name,email,phn_no,address,profession,qualification,password) values('$name','$email','$ph_no','$address','$profession','$qualification','$gender','$password')";
	
if (mysqli_query($conn, $sql))
{
  echo "your details successfully inserted";
} 
else
 {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	header("location: index.php");
