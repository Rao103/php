<?php
 include 'config.php';
 session_start();

?>
<!DOCTYPE html>
<html>
<head>




</head>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding:  30px;
  background-color: white;
}

/* Full-width input fields */
input[type=password] {
  width: 30%;

  padding: 15px;
  margin: 10px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
input[type=text]{
  width: 30%;
  padding: 15px;
  margin: 10px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}



/*input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
*/
/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom:48px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
  opacity: 0.9;
}
.registerbtn .xyz {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}
.loginbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
  opacity: 0.9;
}

.loginbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
/*a {
  color: dodgerblue;
}*/

</style>
</head>
<body>
<center>
<form action="login.php" method="post">
  
  <div class="container">
    <h1>Login here</h1>
    <p>Please fill in this form to Login </p>
    <hr>
    <!-- <label for="email"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required> --> 
 
    
   
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" value="<?php if (isset($_COOKIE['email'])) {echo $_COOKIE['email'];}   ?>" required /> 
    <br>

    <label for="password"><b>Passw</b></label>
    <input type="password" placeholder="Enter Password" name="psw" value="<?php if (isset($_COOKIE['psw'])) {echo $_COOKIE['psw'];}  ?>" data-toggle="password" required /><br>

    <input type="checkbox"  name="remember" style="margin-left: -210px" <?php if(isset($_COOKIE['email'])) { ?> checked <?php } ?>  />
    <label for="remember-me" style="margin-left: -130px"><b>Remember me</b></label>
    <hr>
    <button type="submit" class="loginbtn" name="login">LOGIN</button><br>
    <button type="back" class="registerbtn" name="register"><a href="register.php" class="xyz">Register</a> </button>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  </div>
</form>
</center>

<?php
    

  if (isset($_POST['login'])) {


    $email=$_POST['email'];
    $pass=$_POST['psw'];

     $query= "select*from user where email='$email' AND password='$pass' ";
     $query_run=mysqli_query($con, $query);
     $isValidLogin = mysqli_num_rows($query_run);
     if ($isValidLogin){  
          
          if(!empty($_POST["remember"])) {
             setcookie ("email", $email, time()+ (24 * 60 * 60));  
             setcookie ("psw", $pass,  time()+ ( 24 * 60 * 60));
         } else {
             setcookie ("email",""); 
             setcookie ("psw","");
        }
            $userDetails = mysqli_fetch_assoc($query_run);
           
            echo "
            <script>
             alert('you are logged in ');
             window.location.href='home.php';
            </script>
            ";
    
  } else{
       echo "
            <script>
             alert('incorrect email or password  ');
             window.location.href='register.php';
            </script>
            ";
  }
  


}


 ?>  







</body>
</html>





