<!DOCTYPE html>
<html>
 <?php
  session_start();
 ?>
<head>
  <style>
    label{display:inline-block;width:100px;margin-bottom:10px;font-size:20px;}
    form {
    border: 3px solid #f1f1f1;
    border-left: 10px;
    border-radius: 20px;
    border-color: black;
  }
input[type=text], input[type=password] {
    width:30%;
    padding: 12px 20px;
    margin: 8px 0;
    margin-left: 23px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    margin-left: 123px;
    border: none;
    cursor: pointer;
    width: 20%;
    border-radius: 10px;
    font-size: 18px;
}
.regbtn {
    width: 20%;
    padding: 14px 20px;
    background-color: #f44336;
}
.log{
  background-color: #4CAF50;
  color: white;
  padding: 14px 15px;
  margin: 6px 0;
  margin-left: 123px;
  border: none;
  cursor: pointer;
  width: 18.5%;
}
.container {
    padding: 56px;
}
.cont{

  margin-top: -65px;

}
input{
  border-radius: 10px;
}
span.psw {
    float: right;
    padding-top: 16px;
}
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
}
  </style>
  <title>Register</title>
</head>

<body background="loginbg.png">
  <img src="indrakart.png" alt="logo" /><br><br>

  <center>
  <h1>Login Form</h1>
  <form id="myform" method="post" action="home.php" onsubmit="update()">
    <div class="container" >
      <label><b>E-Mail :</b></label>
      <input type="text" placeholder="Enter Email" id="final" name="customer_name" required><br>
      <label><b>Password :</b></label>
      <input type="password" id="psw" placeholder="Enter Password" name="pswrd" required><br>
      <button class="regbtn"  type="submit">Register</button>
     </div>
  </form>
  <div class="cont" >
    <button class="log" onclick="login()" type="submit">Login</button>
  </div>

<h1 id="har"> </h1>
<h1 id="sai"> </h1>
</center>
<script>
function update()
{
	var x = new XMLHttpRequest();
	x.open("POST","add.php",true);
	var y=document.forms["myform"]["final"].value;
	var z=document.forms["myform"]["psw"].value;
  x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	x.send("customer_name="+y + "&password="+z);
  return false;
}
function login()
{
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "login.php", true);
  var y=document.forms["myform"]["final"].value;
  var z=document.forms["myform"]["psw"].value;
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("customer_name="+y + "&password="+z);
  xhttp.onreadystatechange = function()
  {
      if (this.readyState == 4 && this.status == 200)
      {
           if(this.responseText=="1")
            {
                window.location='home.php';
            }
            else
            {
              window.alert("Login Failed\nPlease register or contact your Administrator");
              document.getElementById('har').innerHTML='Login Failed';
            }
      };
  }
  return false;
}

</script>
</body>
</html>
