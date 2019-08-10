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
input[type=text], input[type=password] {
  width: 30%;
  padding: 15px;
  margin: 15px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
input[type=text], input[type=email] {
  width: 30%;
  padding: 15px;
  margin: 15px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}


/* Full-width input fields */



/*input[type=submit]:focus,:focus {
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
.logout {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
  opacity: 0.9;
}

.logout:hover {
  opacity: 1;
}



/* Add a blue text color to links */
/*a {
  color: dodgerblue;
}*/

/* Set a grey background color and center the text of the "sign in" section */
/*.logout {
  background-color: #f1f1f1;
  text-align: center;
}*/
</style>
</head>
<body>
<center>
<form action="home.php" method="post">
  
  <div class="container">
    <h1>Welcome To Home page</h1>
    <p>You are logged in now</p>
    <hr>
    

 

    <!-- <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required> -->
    <hr>


    <button type="submit" class="logout" name="logout">LOGOUT</button><br>
   
    

  </div>
  
 
</form>
<center>
  <?php
$db = mysqli_connect('localhost','root','','responsiveform')
 or die('Error connecting to MySQL server.');

 if (isset($_POST['logout'])) {
      echo "
      <script>
      alert('you are logged out');
      window.location.href='login.php';
     


     </script>

      ";


 }
       









?>

</body>
</html>
p