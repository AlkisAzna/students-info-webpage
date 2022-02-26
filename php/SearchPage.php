<?php
   include('statusLogin.php');
   include("config.php");
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
   
   <head>
      <link rel="stylesheet" href="css/sql_queries.css">
      <meta charset="UTF-8">
      <title>TUC Teacher's|Search Student</title>
   </head>

   <body>
      <header>
         <h2>Search Student</h2>
      </header> 
       <!-- Show all students in table with scroll bar and let user decide which one he wants to update -->
      <div class="scroll">
      <table>
         <thead>
              <!-- HEADERS -->
            <tr>
               <th><strong>Student</strong></th>
               <th><strong>ID</strong></th>
               <th><strong>Name</strong></th>
               <th><strong>Surname</strong></th>
               <th><strong>Father's Name</strong></th>
               <th><strong>Grade</strong></th>
               <th><strong>Mobile Number</strong></th>
               <th><strong>Birthday</strong></th>
            </tr>
         </thead>
         <tbody>
             <!-- TABLE CONTENTS -->
            <?php
               $count=1;
               $text = $_SESSION["textParameter"];
               if($_SESSION["searchParameter"] == "NAME"){
                $sel_query="Select * from Students Where NAME = '$text' ORDER BY id desc;";
               }else if(($_SESSION["searchParameter"] == "ID")){
                $sel_query="Select * from Students Where ID = '$text' ORDER BY id desc;";
               }else{
                $sel_query="Select * from Students Where SURNAME = '$text' ORDER BY id desc;";
               }
               $result = mysqli_query($db,$sel_query);
               while($row = mysqli_fetch_assoc($result)) { ?>
               <tr><td><?php echo $count; ?></td>
                  <td><?php echo $row["ID"]; ?></td>
                  <td><?php echo $row["NAME"]; ?></td>
                  <td><?php echo $row["SURNAME"]; ?></td>
                  <td><?php echo $row["FATHERSNAME"]; ?></td>
                  <td><?php echo $row["GRADE"]; ?></td>
                  <td><?php echo $row["MOBILENUMBER"]; ?></td>
                  <td><?php echo $row["BIRTHDAY"]; ?></td>
               </tr>
            <?php $count++; } ?>
         </tbody>
      </table>
      </div>

       <!-- Logout -->
      <form method="post" action="logout.php">
         <div class="input-group">
            <button type="submit" class="l_btn" name="logout_btn">Logout</button>
         </div>
      </form>

        <!-- Return -->
      <form method="post" action="SearchStudent.php">
         <div class="input-group">
            <button type="submit" class="r_btn" name="return_btn">Return</button>
         </div>
      </form>
      
       <!-- Show user -->
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