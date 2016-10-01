
<?php
/* edit with your own database details */
$flag = 0;
$link = mysqli_connect("localhost", "root", "", "ecommerce");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$query = mysqli_query($link,"select * from oc_ssadaddress order by customer_id desc limit 1");

if (mysqli_num_rows($query) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($query)) {
       // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
   $tablename = $row["customer_id"]."_".$row["firstname"]."_".$row["lastname"] ;

    }
}
///$tablename = "umpaloompa";
 
$sql = mysqli_query($link,"CREATE TABLE `$tablename` LIKE `oc_ssadproduct`");
$check = mysqli_query($link,"select * from `$tablename`");
/* Create table */
if ($sql==TRUE and $flag==0) {

	$flag=1;
    printf("Table $tablename successfully created.\n");
}

 else if($check==TRUE){

printf("Table with name $tablename already exists.\n");

 }
 else {
    printf("Could not create Table $tablename.\n");
}
mysqli_close($link);

?>