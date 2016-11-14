<?php
require 'PHPmailer/PHPMailerAutoload.php';
$servername = "localhost";
echo $servername;
$username = "root";
$password = "";
$dbname = "opencart";
$conn=new mysqli($servername, $username, $password, $dbname);
$sql="select * from order_list";
$fin=array();
$result=$conn->query($sql);
array_push($fin,0);
$i=0;
while($row=$result->fetch_assoc())
{
	array_push($fin,0);
	$fin[$i]=$row["orders"];
	$i=$i+1;
}
$g=0;
$rec=$fin[$g];
$sql="select * from oc_order_product";
$result=$conn->query($sql);
$i=0;
while($row=$result->fetch_assoc())
{
	$i=$i+1;	
}
$total=$i;
$sql="update order_list set orders=$total";
$conn->query($sql);
$sql="select * from oc_order_product";
$result=$conn->query($sql);
$i=0;
$product=array();
$price=array();
$finalquantity=array();
$m=0;
while($row=$result->fetch_assoc())
{
	array_push($fin,'');
	if($i>=$rec)
	{
		
		$product[$m]=$row["product_id"];
		$price[$m]=$row["price"];
		$finalquantity[$m]=$row["quantity"];
		$m=$m+1;
		
	}

	$i=$i+1;	
}
	$product_total=$m;
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
	$final=$i;
	$i=0;
	$m=0;
	$mail = new PHPMailer;
$mail->isSMTP();
//$mail->SMTPDebug = 1;                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hh67502@gmail.com';                 // SMTP username
$mail->Password = 'bunny001!';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;  

$mail->From = 'hh67502@gmail.com';
$mail->FromName = 'Mailer';

	while($m!=$product_total)
	{
		$i=0;
		while($i!=$final)
			{
					$ssup=$cars[$i];
					$dec=$product[$m];
					$sql="select * from $ssup where product_id=$dec";
					$result=$conn->query($sql);
					while($row=$result->fetch_assoc())
					{
						if($row["quantity"]>$finalquantity[$m] && $row["price"]==$price[$m])
						{
							$email=$ssup."@gmail.com";
							$mail->addAddress($email);  
$mail->isHTML(true);                                  
$mail->Subject = 'Regarding the opencart sale';
$d=$price[$m];
$mail->Body    = 'You have an order for '.$d.' quantities of  product with id '.$dec;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else  {
    echo 'Message has been sent';
}
						}
					}
					$i=$i+1;
			}
			$m=$m+1;
	}

//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient



?>
