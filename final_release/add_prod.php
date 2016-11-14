<!DOCTYPE html>
<html>
<?php
session_start();
?>
  <head>
    <title>Add Products</title>
    <style>
      label{
        display:inline-block;
        width:100px;
        margin-bottom:10px;
      }
      button {
        display: inline;
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
      .a span:after{
        content: '«';
        position: absolute;
        opacity: 0;
        top: 0;
        left: -150px;
        transition: 0.5s;
      }
      button:hover span {
        padding-right: 30px;
      }
      .a:hover span{
        padding-left: 55px;

      }
      button:hover span:after {
        opacity: 1;
        right: 0;
      }
      .a:hover span:after {
        opacity: 1;
        right: 0;
      }
      .log{
        margin-left: 550px;
        margin-bottom: -45px;
      }

      .form-style-6{
    font: 95% Arial, Helvetica, sans-serif;
    max-width: 400px;
    margin: 10px auto;
    padding: 16px;
    background: #CCCCCC;
}
.form-style-6 h1{
    background: #43D1AF;
    padding: 20px 0;
    font-size: 140%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
}
.form-style-6 input[type="text"],
.form-style-6 input[type="date"],
.form-style-6 input[type="datetime"],
.form-style-6 input[type="email"],
.form-style-6 input[type="number"],
.form-style-6 input[type="search"],
.form-style-6 input[type="time"],
.form-style-6 input[type="url"],
.form-style-6 textarea,
.form-style-6 select
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    background: #fff;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 3%;
    color: #555;
    font: 95% Arial, Helvetica, sans-serif;
    border-radius: 8px;
}
.form-style-6 input[type="text"]:focus,
.form-style-6 input[type="date"]:focus,
.form-style-6 input[type="datetime"]:focus,
.form-style-6 input[type="email"]:focus,
.form-style-6 input[type="number"]:focus,
.form-style-6 input[type="search"]:focus,
.form-style-6 input[type="time"]:focus,
.form-style-6 input[type="url"]:focus,
.form-style-6 textarea:focus,
.form-style-6 select:focus
{
    box-shadow: 0 0 5px #43D1AF;
    padding: 3%;
    border: 1px solid #43D1AF;
    border-radius: 8px;
}

.form-style-6 input[type="submit"],
.form-style-6 input[type="button"]{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 3%;
    background: #43D1AF;
    border-bottom: 2px solid #30C29E;
    border-top-style: none;
    border-right-style: none;
    border-left-style: none;
    color: #fff;
    border-radius: 8px;
}
.form-style-6 input[type="submit"]:hover,
.form-style-6 input[type="button"]:hover{
    background: #2EBC99;
}
.a{
  margin-left: 0px;
  width:240px;
}
.k{
  position:absolute;
  left:19px;
  top:5px;
}
body{
  background-image: url('f1.jpg');
}
    </style>
  </head>

  <body>
    <div>
      <button class="a" onclick="redirect()"><span>Go to Home</span></button>
    </div>
    <button class="k" onclick="lout()"><span>Log Out</span></button>
    <br><br><br><br><br>
    <center>
     <div class="form-style-6">
       <h1>Add Products Here Below</h1>
      <form method="post" id="myform" name="myform" action="" onsubmit="update()">
        <input type="text" id="customer_ID" name="customer_ID" placeholder="Enter Your Customer ID" required><br>
        <input type="text"  id="product_ID" name="product_ID" placeholder="Enter the Product ID" required><br>
        <input type="text"  id="price" name="price" placeholder="Enter the Price of Product"><br>
        <input type="text" id="items" name="items" placeholder="Enter the Number of Items to be Added" required><br>
        <input type="submit" value="Add">
      </form>
    </center>
  </div>

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
  function update()
  {
	   var x = new XMLHttpRequest();
	   x.open("POST","dataupdate.php",true);
	   var y=document.forms["myform"]["customer_ID"].value;
     var z=document.forms["myform"]["product_ID"].value;
     var w=document.forms["myform"]["price"].value;
     var p=document.forms["myform"]["items"].value;
     x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	   x.send("customer_ID="+y  + "&product_ID="+z  + "&price="+w  +  "&items="+p);
	   return false;
   }
   function lout()
   {
     var x = new XMLHttpRequest();
     x.open("POST","logout.php",true);
     x.send();
     window.open('register.php');
   }
   function redirect()
   {
     window.location='home.php';
   }
   </script>
 </body>
</html>
