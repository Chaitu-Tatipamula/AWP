<?php 
$PASSCHECK="";
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) 
{
    $conn= new mysqli('localhost','root','','hms') or die('connection_failed :'.mysqli_connect_error());
    if(isset($_POST['name'])&&isset($_POST['number'])&&isset($_POST['hello'])&&isset($_POST['confirm_password']))
    {
                $name=$_POST['name'];
                $number=$_POST['number'];
                $password=$_POST['hello'];
                $confirm_password=$_POST['confirm_password'];
                $a=$_POST['hello'];
                $b=$_POST['confirm_password'];
                if($a!=$b)
                {
                  $PASSCHECK="PASSWORD DOENT MATCH";
                }
                else
                {
                  $check=mysqli_query($conn,"SELECT * FROM login WHERE login_id =  $number");
                  $rows=mysqli_num_rows($check);
                  if($rows >0){
                  $PASSCHECK="USER ALREADY EXIST";
                  }
                  else{
                  $sql="INSERT INTO login(login_id,login_username,login_passsword) VALUES ('$number','$name','$password')";
                  $query= mysqli_query($conn,$sql);
                  header('Location: reg.php');
                  }
                }

    }



}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title> register page </title>
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);
header .header{
  background-color: #fff;
  height: 45px;
}
header a img{
  width: 134px;
margin-top: 4px;
}
.login-page {
  width: 360px;
  padding: 9% 0 0;
  margin: auto;
}
.login-page .form .login{
  margin-top: -31px;
margin-bottom: 26px;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background-color: #328f8a;
  background-image: linear-gradient(90deg, rgba(63,94,251,1) 0%, rgba(70,252,200,1) 100%);
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 14px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}

.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}

body {
  /* background-color: #328f8a; */
  background-image: linear-gradient(90deg, rgba(63,94,251,1) 0%, rgba(70,252,200,1) 100%);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.gali_class{
    color :inherit;
    text-decoration:none;
}
.class{
  color :red;
}


</style>
</head>
<body>
  <div>
    <div class="login-page">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>REGISTER</h3>
            <p>Please enter your credentials to login.</p>
          </div>
        </div>
        <form class="login-form" action=''  method ="post">
          <input type="text" placeholder="username" name="name" required/>
          <input type="number" placeholder="reg_number"name="number"  required/>
          <input type="password" placeholder="password" class="gali_number"  name="hello" required/>
          <input type="password" placeholder="confirm password" name='confirm_password'/>
          <p style="color:red;" ><?php echo $PASSCHECK ?></p>
           <button  type="submit" name='submit'> register </button>
          <br>
          <p  style="color:red;"class="message" >Already registered ? <a href="form.php">click here to login</a></p> 
          </form>
          <p style="color:red" ><?php echo $PASSCHECK ?></p>
<!-- <br>
          <button  href='form.php'> register</button> -->
          <?php

          ?>
       
      </div>
    </div>
    </div>
</body>
</body>
</html>

