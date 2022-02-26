<?php
//Initial Page of our Web Application
//User gives username and password and through php code server checks if credentials are correct
   include("config.php");
   session_start();

   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      //Make the sql query and submit to db
      $sql = "SELECT * FROM Teachers WHERE USERNAME = '$myusername' and PASSWORD = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         //Go to teachers start page
         header("location: Teachers.php");
      }else {
         $_SESSION['Error'] = "Your Login Name or Password is invalid";
      }
   }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/main.css">
  <meta charset="UTF-8">
  <title>TUC Teacher's|Sign in</title>
</head>

<body>
  <div class="body"></div>
  <div class="grad"></div>

  <div class="header"><text>Welcome to TUC Teacher Web App</text>
    <div>TUC<span> Teacher</span></div>
    <br>
    <div>Sign <span>in</span> Form</div>
    </br>
  </div>
  <br>
  <form action="" method="post">
    <div class="login">
      <input type="text" placeholder="Enter Username" name="username"><br>
      <input type="password" placeholder="********"     name="password"><br>
      <input type="submit" class="btn" name="login_btn" value="Login">
    </div>
    </body>
</html>