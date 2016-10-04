<?php
$server="localhost";
$username="root";
$password="";
$dbname = "opencart";
$conn=new mysqli($server, $username, $password, $dbname);
if($conn)
{ 
	$var=$_POST['customer_name']; 
	$sql="select  * from user_records";
	$result=$conn->query($sql);
	$i=0;
	while($row=$result->fetch_assoc())
	{
		$i=$i+1;	
	}
	$sql="insert into user_records values($i+1,'$var')";
	$conn->query($sql);	
	$sql="create table $var  (product_id int,quantity int)";
	$conn->query($sql);
}
else
{

}



?>