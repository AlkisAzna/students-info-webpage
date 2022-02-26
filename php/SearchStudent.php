<?php
   include('statusLogin.php');
   include('config.php');
    //Search Student Main Page
    session_start();
    //Check if user gave an ID search
    if((isset($_POST['id_n']) && $_POST['id_n']==1)) {
        $s_id = mysqli_real_escape_string($db,$_POST['id']);
        $sql = "SELECT * FROM Students WHERE ID='$s_id'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];
        
        $count = mysqli_num_rows($result);
        
         //If found initialize session variables to be used by next page
        if($count >= 1) {
            $_SESSION['searchParameter'] = "ID";
            $_SESSION['textParameter'] = $row["ID"];
            header("location: SearchPage.php");
            
        }else{
            header("location: SearchStudent.php");
        }
    }
    //Check if user gave a Name search
    if ((isset($_POST['fname']) && $_POST['fname']==1)){
        $s_name = mysqli_real_escape_string($db,$_POST['name']);
        $sql = "SELECT * FROM Students WHERE NAME='$s_name'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];
        
        $count = mysqli_num_rows($result);
        
        //If found initialize session variables to be used by next page
        if($count >= 1) {
            $_SESSION['searchParameter'] = "NAME";
            $_SESSION['textParameter'] = $row["NAME"];
            header("location: SearchPage.php");
        }else{
            header("location: SearchStudent.php");
        }
    }
    //Check if user gave a Username search
    if((isset($_POST['sname']) && $_POST['sname']==1)){
        $s_surname = mysqli_real_escape_string($db,$_POST['surname']);
        $sql = "SELECT * FROM Students WHERE SURNAME='$s_surname'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];
        
        $count = mysqli_num_rows($result);
        
         //If found initialize session variables to be used by next page
        if($count >= 1) {
            $_SESSION['searchParameter'] = "SURNAME";
            $_SESSION['textParameter'] = $row["SURNAME"];
            header("location: SearchPage.php");
        }else{
            header("location: SearchStudent.php");
        }
    }
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
         <h2>Search Student Form</h2>
      </header> 
      <!-- ID FORM -->
        <div class=form>
            <form name="search_id" method="post" action=""> 
                <input type="hidden" name="id_n" value="1" />
                    Search ID:<input type="text" name="id" placeholder="Search ID" 
                        required value="<?php echo $row['id'];?>" /></p>
                        <input name="search_id" type="submit" value="Search by ID" />
            </form>
        </div>
        <!-- NAME FORM -->
        <div class=form>
            <form name="search_name" method="post" action=""> 
                <input type="hidden" name="fname" value="1" />
                    Search Name:<input type="text" name="name" placeholder="Search Name" 
                        required value="<?php echo $row['name'];?>" /></p>
                        <input name="search_name" type="submit" value="Search by Name" />
            </form>
        </div>
        <!-- SURNAME FORM -->
        <div class=form>
            <form name="search_surname" method="post" action=""> 
                <input type="hidden" name="sname" value="1" />
                    Search Surname:<input type="text" name="surname" placeholder="Search Surname" 
                        required value="<?php echo $row['surname'];?>" /></p>
                        <input name="search_surname" type="submit" value="Search by Surname" />
            </form>
        </div>
        <!-- logout -->
      <form method="post" action="logout.php">
      <div class="input-group">
			<button type="submit" class="l_btn" name="logout_btn">Logout</button>
		</div>
      </form>
        <!-- return -->
        <form method="post" action="Teachers.php">
        <div class="input-group">
			<button type="submit" class="r_btn" name="return_btn">Return</button>
		</div>
      </form>
        <!-- login user -->
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