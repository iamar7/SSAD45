<?php
$servername = "localhost";

$username = "root";

$password = "";

$dbname = "opencart";
$conn=new mysqli($servername, $username, $password, $dbname);
if($conn)
{
	$var=$_POST['customer_ID'];
	$fin=$_POST['product_ID'];
	$dec=$_POST['items'];
	$sql="select  table_name from user_records where customer_id=$var";
	$result=$conn->query($sql);	
	$row=$result->fetch_assoc();
	$table=$row['table_name'];
	$sql="select * from $table where product_id=$fin";
	$result=$conn->query($sql);
	$i=0;	
	while($row=$result->fetch_assoc())
	{
		$i=$i+1;	
	}
	if($i==0)
	{
		$sql="insert  into  $table  values($fin,$dec)";
		$result=$conn->query($sql);	
	}
	else 
	{	
	 	$sql="update $table set quantity=$dec where  product_id=$fin";
		$result=$conn->query($sql);
	}
					
}
else
{
	echo "Not connected";
}

?>