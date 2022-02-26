<?php
//Check if a user is logged in so that he cannot redirect with bypass to another page
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user']; //Set login user
   
   $ses_sql = mysqli_query($db,"select USERNAME from Teachers where USERNAME = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){ //If not logged in go to first page
      header("location:index.php");
      die();
   }
?>