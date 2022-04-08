<?php
session_start();

if($_SERVER['HTTP_HOST'] == "localhost"){
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$name=$_POST['username'];
$email=$_POST['email'];
$phn_no=$_POST['phn_no'];
$address=$_POST['address'];
$pass=$_POST['password'];
$sql="select * from users where email='$email'";
$result=mysqli_query($con ,$sql);
$num=mysqli_num_rows($result);
if($num==1){
	echo "Already have an account";

}
else
{
	$reg="insert into users ( name,email,phone,address,password) values('$name' ,'$email','$phn_no','$address','$pass') ";
	mysqli_query($con,$reg);
	echo" registration complete";
	header("location: index.php");
}
?>