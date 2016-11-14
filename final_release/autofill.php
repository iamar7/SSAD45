<?php
session_start();
$servername = "localhost";

$username = "root";

$password = "";

$dbname = "opencart";
$conn=new mysqli($servername, $username, $password, $dbname);
$sql="select  * from user_records";
	$result=$conn->query($sql);
	$var=$_SESSION['username'];
	$i=0;
	while($row=$result->fetch_assoc())
	{
			if($row["table_name"]==$var)
			{
				$id=$row["customer_id"];
			}
	}
	echo $id;


?>