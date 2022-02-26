<?php
//PHP code and HTML inteface to handle the update of a specific student chosen by EditStudent.php
   include('statusLogin.php');
   include("config.php");

   session_start();
//Fetch the current Student
$id=$_REQUEST['id'];
$query = "SELECT * from Students where ID='".$id."'"; 
$result = mysqli_query($db, $query) or die ();
$row = mysqli_fetch_assoc($result);

if ($finish){
    header("location: Teachers.php");
}
?>

<!DOCTYPE html>
<html lang="en">
   
   <head>
      <link rel="stylesheet" href="css/sql_queries.css">
      <meta charset="UTF-8">
      <title>TUC Teacher's|Edit Student</title>
   </head>

   <body>
      <header>
         <h2>Edit Selected Student</h2>
      </header> 
    
     
<div class="form">
    <h1>Student ID: <?php echo $_REQUEST['id'];?></h1>
    <!-- If user pushed update button -->
    <?php
        $status = "";
        if(isset($_POST['new']) && $_POST['new']==1)
        {
            $id=$_REQUEST['id'];
            $name =$_REQUEST['name'];
            $sname =$_REQUEST['surname'];
            $fname =$_REQUEST['fathersname'];
            $grade =$_REQUEST['grade'];
            $mobile =$_REQUEST['mobilenumber'];
            $bday =$_REQUEST['birthday'];
            $update="update Students set NAME='".$name."',
            SURNAME='".$sname."', FATHERSNAME='".$fname."',
            GRADE='".$grade."',
            MOBILENUMBER='".$mobile."',
            BIRTHDAY='".$bday."'  where ID='".$id."'";
            $finish = mysqli_query($db, $update) or die();
            if($finish){
                $status = "Student Updated!";
                ?>
                    <h3 color=green>Status: <?php echo $status;?></h2>
                <?php  
            }else{
                $status = "ERROR Updating Student!";
                ?>
                    <h3 color=red>Status: <?php echo $status;?></h2>
                <?php 
            }
            
        }else {
    ?>
     <!-- If user hasnt pushed update button yet,show the form to insert new values (NOT FOR ID) -->
    <div class=form>
        <form name="update_form" method="post" action=""> 
            <input type="hidden" name="new" value="1" />
                Name:<input type="text" name="name" placeholder="Enter Name" 
                     required value="<?php echo $row['name'];?>" /></p>
                Surname:<input type="text" name="surname" placeholder="Enter Surname" 
                     required value="<?php echo $row['surname'];?>" /></p>
                Fathers Name:<input type="text" name="fathersname" placeholder="Enter Fathers Name" 
                     required value="<?php echo $row['fathersname'];?>" /></p>
                Grade:<input type="text" name="grade" placeholder="Enter Grade" 
                     required value="<?php echo $row['grade'];?>" /></p>
                Mobile Number:<input type="text" name="mobilenumber" placeholder="Enter Mobile Number" 
                     required value="<?php echo $row['mobilenumber'];?>" /></p>
                Birthday:<input type="text" name="birthday" placeholder="Enter Birthday(YYYY-MM-DD)" 
                     required value="<?php echo $row['birthday'];?>" /></p>
                <input name="update_b" type="submit" value="Update Student" />
        </form>
    <?php } ?>
    </div>
</div>
        <!-- Logout Button -->
      <form method="post" action="logout.php">
      <div class="input-group">
			<button type="submit" class="l_btn" name="logout_btn">Logout</button>
		</div>
      </form>

         <!-- Return button -->
        <form method="post" action="EditStudent.php">
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