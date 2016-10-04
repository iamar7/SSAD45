<!DOCTYPE html>
<html>
  <head>
    <style>
      label{display:inline-block;width:100px;margin-bottom:10px;}
      h2{margin-top:-50px;}

    </style>
    <title>Add Employee</title>
  </head>
  <body>
<img src="indrakart.png" alt="hari" style="margin-top:-50px;width:200px;height:200px" />

<center>

<h2> This page is used for registering a user in our Online Store </h2>
    <form  id="myform" method="post" action="initial.php" onsubmit="update()">
      <label font-size:50px;>Customer_Name</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <input type="text"  id="final" name="customer_name" /><br />
      <label>Date of Birth</label>
    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="DOB" /><br />
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Register">

</form>
</center>
<script>
function update()
{
	var x = new XMLHttpRequest();
	x.open("POST","add.php",true);
	var y=document.forms["myform"]["final"].value;
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	x.send("customer_name="+y);
	return false;
}
</script>
</body>
</html>
