<?php
   include('statusLogin.php');
   include("config.php");

    session_start();

    if((isset($_POST['new']) && $_POST['new']==1)) {
            //fetch Data
            $s_name = mysqli_real_escape_string($db,$_POST['firstname']);
            $s_surname = mysqli_real_escape_string($db,$_POST['lastname']); 
            $s_id = mysqli_real_escape_string($db,$_POST['id']);
            $s_fname = mysqli_real_escape_string($db,$_POST['fathername']);
            $s_grade = mysqli_real_escape_string($db,$_POST['grade']);
            $s_mobile = mysqli_real_escape_string($db,$_POST['mobile']);
            $s_bday = mysqli_real_escape_string($db,$_POST['birthday']);
            
            
            //Search if exists a student with the given ID
            $sql = "SELECT * FROM Students WHERE ID = '$s_id'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $active = $row['active'];
            
            $count = mysqli_num_rows($result);

            if($count==1){ //If exists refresh
                $error = "Error:ID already exists";
                header("location: AddStudent.php");
            }else{ //if not try inserting student.If successful go to Teachers page
                $sql = "INSERT INTO Students (ID, NAME, SURNAME, FATHERSNAME, GRADE, MOBILENUMBER, BIRTHDAY)values ('$s_id','$s_name','$s_surname','$s_fname','$s_grade','$s_mobile','$s_bday')";
                mysqli_query($db,$sql) or die();
                header("location: Teachers.php");
            }
        
            
    }
?>

<!DOCTYPE html>
<html lang="en">
   
   <head>
    <link rel="stylesheet" href="css/sql_queries.css">
    <meta charset="UTF-8">
    <title>TUC Teacher's|Add Student</title>
   </head>

   <body>
      <header>
         <h2>Add Student Form</h2>
      </header> 
      <!-- form of Adding a Student.All gaps must be filled -->
      <div class="container">
        <form method="post" action="AddStudent.php">
        <input type="hidden" name="new" value="1" />
            <div class="form">
                <div class="row">
                    <div class="col-20">
                        <label for="firstname">First Name</label>
                    </div>
                    <div class="col-50">
                        <input type="text" id="firstname" name="firstname" placeholder="Enter Name.." required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="lastname">Last Name</label>
                    </div>
                    <div class="col-50">
                        <input type="text" id="lastname" name="lastname" placeholder="Enter Last name.." required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="id">ID</label>
                    </div>
                    <div class="col-50">
                        <input type="text" id="id" name="id" placeholder="Enter ID Number..(10 digits)" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="fathername">Father's name</label>
                    </div>
                    <div class="col-50">
                        <input type="text" id="fathername" name="fathername" placeholder="Enter Father's name.."required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-20">
                        <label for="grade">Grade</label>
                    </div>
                    <div class="col-50">
                        <input type="text" id="grade" name="grade" placeholder="Enter Grade.."required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="mobile">Mobile Number</label>
                    </div>
                    <div class="col-50">
                        <input type="text" id="mobile" name="mobile" placeholder="Enter Mobile Number..(10 digits)"required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-20">
                        <label for="birthday">Birthday</label>
                    </div>
                    <div class="col-50">
                        <input type="text" id="birthday" name="birthday" placeholder="Enter Birthday..(YYYY-MM-DD)"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-50">
                        <button type="submit" class="action_btn" name="add_btn">Add Student</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--logout -->
      <form method="post" action="logout.php">
      <div class="input-group">
			<button type="submit" class="l_btn" name="logout_btn">Logout</button>
		</div>
      </form>
    <!--Return button -->
        <form method="post" action="Teachers.php">
        <div class="input-group">
			<button type="submit" class="r_btn" name="return_btn">Return</button>
		</div>
      </form>
<!--Log in User -->
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