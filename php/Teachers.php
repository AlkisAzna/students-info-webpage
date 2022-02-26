<?php
   include('statusLogin.php');
   include("config.php");
   //Main Page
?>

<!DOCTYPE html>
<html lang="en">
   
   <head>
   <link rel="stylesheet" href="css/teachers.css">
   <meta charset="UTF-8">
   <title>TUC Teacher's|Main Page</title>
   </head>
   
   <body>
      <header>
         <h2>Welcome to TUC Teacher's Program</h2>
      </header> 
      
      <nav>
         <h2>Press to make a choice..</h2>
         <input id="toggle" type="checkbox" checked>
      <ul>
         <li><a href="AddStudent.php">Add Student</a></li>
         <li><a href="EditStudent.php">Edit Student</a></li>
         <li><a href="DeleteStudent.php">Delete Student</a></li>
         <li><a href="SearchStudent.php">Search Student</a></li>
      </ul>
      </nav>

      <form method="post" action="logout.php">
      <div class="input-group">
			<button type="submit" class="btn" name="logout_btn">Logout</button>
		</div>
      </form>
      
      <div>
         <user>User:<?php
                     $query = "SELECT * FROM Teachers WHERE USERNAME = '$_SESSION[login_user]'";
                     $result = mysqli_query($db,$query);
                     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                     $active = $row['active'];
                     $name = $row['NAME'];
                     $surname = $row['SURNAME'];
                     echo $name;
                     echo " ",$surname;?>
      </div>

   </body>
   
</html>