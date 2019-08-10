<?php
  include 'config.php';

?>
<!DOCTYPE html>
<html>
<head>

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
  padding:  60px;
  background-color: white;
}

/* Full-width input fields */
input[type=password] {
  width: 30%;
  padding: 15px;
  margin: 15px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
input[type=text]{
  width: 30%;
  padding: 15px;
  margin: 15px 0 22px 0;
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
  margin-bottom: 25px;
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
.loginbtn .xyz {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
  opacity: 0.9;
}

.loginbtn :hover {
  opacity: 1;
}

/* Add a blue text color to links */
/*a {
  color: dodgerblue;
}
*/
</style>
</head>
<body>
<center>
<form action="register.php" method="post">
  
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required> 
    <br>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required> 
    <br>

    <label for="password"><b>Passw</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br>
  
    <label for="psw-repeat"><b>Rpass</b></label>
    <input type="password" placeholder="Repeat Password" name="c-psw" required>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn" name="register">Register</button><br>
    <button type="back" class="loginbtn" name="loginbtn"><a href="login.php" class="xyz">Back-to-Login</a> </button>
  </div>
</form>
</center>
<?php
//coding 

if(isset($_POST['register'])){
  
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['psw'];
  $cpass = $_POST['c-psw'];
  
  
  
  if($pass==$cpass){
    
    $query= "SELECT*from user where email='$email'";
    $query_run= mysqli_query($con,$query);
    
    if($query_run){
      
      if(mysqli_num_rows($query_run) >0){
        
        echo "
    <script>
    alert('User ALready Registered ');
    window.location.href='login.php';
    </script>
    ";
  
        
      }else{
        
  $insertion= "INSERT into user(name,email,password) values('$name','$email','$pass')";
  
             
        $insertion_run = mysqli_query($con,$insertion);
        
        if($insertion_run ){
          
          echo "
    <script>
    alert('Registration Successful ');
    // window.location.href='home.php';
    </script>
    ";
          
        }else{
          
            echo "
    <script>
    alert('Registration Failed  ');
    window.location.href='register.php';
    </script>
    ";
        }
        
        
      }
      
      
      
    }else{
      echo "
    <script>
    alert('Database Problem');
    window.location.href='register.php';
    </script>
    ";
      
    }
    
    
  }
  else{
    echo "
    <script>
    alert('Password & Confirm Password not match');
    window.location.href='register.php';
    </script>
    ";
  }
  
  
}
else{
  
  
}






?>




</body>
</html>






