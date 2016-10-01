<?php
   
$link = mysqli_connect("localhost", "root", "", "ecommerce");
$sum=0;
$var = array();
$k = 1;
while ($k<999999){

	$var[$k] = 0;
	$k = $k + 1;
}
//$var array_fill(1,9999999999,0);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = mysqli_query($link,"select * from `oc_ssadaddress`") or die(mysqli_error($link));
 if(mysqli_num_rows($query) > 0) 
    {
    // output data of each row
    while($row = mysqli_fetch_assoc($query)) 
    {
       // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
   $tablename = $row["customer_id"]."_".$row["firstname"]."_".$row["lastname"] ;
    	//$//sql = mysqli_query()
   //echo $tablename;
   $check = mysqli_query($link,"select * from `$tablename`");
   if($check==TRUE)
   {


 $sql = mysqli_query($link,"select `$tablename`.quantity, `$tablename`.product_id from `$tablename` group by `$tablename`.product_id") or die(mysqli_error($link)) ;

    if(mysqli_num_rows($sql) > 0)
    {
    	while ($temp = mysqli_fetch_assoc($sql)) 
    	{
            $var[$temp["product_id"]] = $var[$temp["product_id"]] + $temp["quantity"];   		
             $i = $temp["product_id"];
    	}
    
    }
  
    }

}
$j = 1;
while ($j<=$i)
{
$main_query = mysqli_query($link,"update oc_ssadproduct set oc_ssadproduct.quantity=$var[$j] where oc_ssadproduct.product_id=$j");
               $j = $j + 1;                     


if ($main_query==TRUE) 
{
    echo "Record updated successfully";
    echo "<br>";
} 
else 
{
    echo "Error updating record: " . mysqli_error($link);
echo "<br>";
}

}
}

else{

	printf("error accessing customer db\n");
  
}
 mysqli_close($link);

?>