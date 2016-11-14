<!DOCTYPE html>
<html>
<?php
session_start();
?>
  <head>
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:700" rel="stylesheet">
    <style>
    button {
      display: inline-block;
      border-radius: 5px;
      background-color: #f4511e;
      border: none;
      color: #FFFFFF;
      text-align: center;
      font-size: 25px;
      padding: 10px;
      width: 150px;
      transition: all 0.5s;
      cursor: pointer;
      margin: 5px;
      margin-left: 1180px;
    }
    .k{
      position:absolute;
      left:25px;
      top:5px;
    }

    button span {
      cursor: pointer;
      display: inline-block;
      position: relative;
      transition: 0.5s;
    }

    button span:after {
      content: '»';
      position: absolute;
      opacity: 0;
      top: 0;
      right: -20px;
      transition: 0.5s;
    }
    button:hover span {
      padding-right: 30px;
    }

    button:hover span:after {
      opacity: 1;
      right: 0;
    }
    .child{
      margin-left:auto;
      padding:20px;
      width:300px;
    }
    .child span:after{
      content: '+';
      position: absolute;
      opacity: 0;
      top: 0;
      right: -20px;
      transition: 0.5s;
    }
    .child:hover span{
      padding-right: 40px;
    }
    .log{
      text-align: center;
    }
    p{
      margin-top: -70px;
      font-size: 30px;
    }
    i{
      font-size:45px;
    }
    h2{
      text-align: center;
    }
    label{
      display:inline-block;
      width:200px;
      margin-bottom:10px;
      font-size: 20px;
    }
    input[type=text] {
      width: 40%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 3px solid #ccc;
      -webkit-transition: 0.5s;
      transition: 0.5s;
      outline: none;
      border-radius: 10px;
    }

    input[type=text]:focus {
      border: 3px solid #555;
    }
    input[type=submit]
    {
      display: inline-block;
      width:20%;
      padding:10px;
      background-color: #f4511e;
      border-radius: 5px;
      text-align: center;
      font-size:25px;
      color:#FFFFFF;
      border: none;
    }
    input[type=submit]:hover {
      background-color:#aa3815;
    }
    h1{
      font-family: 'Dancing Script', cursive;
      font-size: 50px;
    }
    body{
      background-image: url('f.jpg');
    }
    </style>
  </head>

  <body>
    <div class="log">
    <h1><b>Home Sweet Home</b><h1>
    </div>
    <button class="k" style="vertical-align:middle" onclick="lout()"><span>Log Out</span></button>
    <button  class="child" onclick="redirect()"><span>Add Products</span></button>
    <center>
      <?php
      $var=$_SESSION['username'];
      echo "<p><b>You Are Logged in as &nbsp;<i>$var</i></b></p>"
      ?>
    </center>
    <h2>Update the values below here</h2>
    <center>
      <form method="post" id="myform" name="myform" action="" onsubmit="update()">
        <label><b>Customer ID :</b></label>&nbsp;
        <input type="text" id="customer_ID" name="customer_ID" required><br />
        <label><b>Product_ID :</b></label>&nbsp;
        <input type="text"  id= "product_ID" name="product_ID" required><br />
        <label><b>Items Sold :</b></label>&nbsp;
        <input type="text" name="items" id="items" required><br />
        <input type="submit" value="Update">
      </form>
    </center>
    <script>
      var xhttp = new XMLHttpRequest();
      xhttp.open("POST", "autofill.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send();
      xhttp.onreadystatechange = function()
      {
          if (this.readyState == 4 && this.status == 200)
          {
              document.forms["myform"]["customer_ID"].value=this.responseText;
          };
      }
      function redirect()
      {
        window.location='add_prod.php';
      }
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
      function lout()
      {
        var x = new XMLHttpRequest();
        x.open("POST","logout.php",true);
        x.send();
        window.open('register.php');
      }
      function adjust_textarea(h) {
        h.style.height = "20px";
        h.style.height = (h.scrollHeight)+"px";
      }
    </script>


  </body>
</html>
