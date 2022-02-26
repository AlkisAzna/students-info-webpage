<?php
//Delete Student Main Page
   include('statusLogin.php');
   include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
   
   <head>
      <link rel="stylesheet" href="css/sql_queries.css">
      <meta charset="UTF-8">
      <title>TUC Teacher's|Delete Student</title>
   </head>

   <body>
      <header>
         <h2>Delete Student Form</h2>
      </header> 
      <!-- Table of Student -->
      <div class="scroll">
      <table>
         <thead>
            <tr>
               <th><strong>Student</strong></th>
               <th><strong>ID</strong></th>
               <th><strong>Name</strong></th>
               <th><strong>Surname</strong></th>
               <th><strong>Father's Name</strong></th>
               <th><strong>Grade</strong></th>
               <th><strong>Mobile Number</strong></th>
               <th><strong>Birthday</strong></th>
               <th><strong>Option</strong></th>
            </tr>
         </thead>
         <tbody>
            <?php
               $count=1;
               $sel_query="Select * from Students ORDER BY id desc;";
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
                  <td>
                     <a href="DeletePage.php?id=<?php echo $row["ID"]; ?>">Delete</a>
                  </td>
               </tr>
            <?php $count++; } ?>
         </tbody>
      </table>
      </div>

      <form method="post" action="logout.php">
      <div class="input-group">
			<button type="submit" class="l_btn" name="logout_btn">Logout</button>
		</div>
      </form>

        <form method="post" action="Teachers.php">
        <div class="input-group">
			<button type="submit" class="r_btn" name="return_btn">Return</button>
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