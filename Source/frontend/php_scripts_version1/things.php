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

<img src="indrakart.png" alt="hari" style="margin-top:-50px;width:200px;height:200px"/>
<center>

<h2> you can alter the quantity of a product </h2>

<form method="post" name="myform" action="" onsubmit="update()">
      <label>Customer_ID</label>
      &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;<input type="text" name="customer_ID" /><br />
      <label>Product_ID</label>
        &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;<input type="text"  name="product_ID" /><br />
      <label>Items sold</label>
    &nbsp;&nbsp;&nbsp;     &nbsp;&nbsp; <input type="text" name="items" /><br />
      &nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;   <input type="submit" value="Change">
    </form>
</center>
<script>
function update()
{
	var x = new XMLHttpRequest();
	x.open("POST","datasubtract.php",true);
	var y=document.forms["myform"]["customer_ID"].value;
	var z=document.forms["myform"]["product_ID"].value;
	var p=document.forms["myform"]["items"].value;
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	x.send("customer_ID="+y  + "&product_ID="+z  +  "&items="+p);
	return false;
}
</script>
</body>
</html>
