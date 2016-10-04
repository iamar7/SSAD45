<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "opencart";
$conn=new mysqli($servername, $username, $password, $dbname);
if($conn)
{
	$sql="select  * from user_records";
	$cars=array();
	$result=$conn->query($sql);
	$i=0;
	while($row=$result->fetch_assoc())
	{
		array_push($cars,'');
		$cars[$i]=$row["table_name"];
		$i=$i+1;	
	}	

$p=0;
$i=$i-1;
$amount=array();
$a=1000;
while($a>0)
{
array_push($amount,0);
$a=$a-1;
}
while($i>=0)
{	
	$sup=$cars[$i];
	$sql="select * from $sup";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc())
	{
		$r=$row["product_id"];
		$amount[$r]=$amount[$r]+$row["quantity"];
		
	}
	$i=$i-1;
}
$a=999;
while($a>0)
{
	$q="update oc_product set quantity=$amount[$a] where product_id=$a";
	$conn->query($q);
	$a=$a-1;	
}
}
else

{
	
die('Not connected:' . mysqli_error());

}
?>