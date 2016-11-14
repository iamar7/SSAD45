<?php
session_start();

$server="localhost";
$username="root";
$password="";
$dbname = "opencart";
$conn=new mysqli($server, $username, $password, $dbname);
$var=$_POST['customer_name'];
$dec=$_POST['password'];
$_SESSION['username']=$var;
$flag=0;
$sql="select  * from user_records";
$result=$conn->query($sql);
while($row=$result->fetch_assoc())
{
	if($row['table_name']==$var && $row['password']==$dec)	
		$flag=1;
}
echo $flag;

?>