<?php
    include('statusLogin.php');
    include("config.php");

    $id=$_REQUEST['id'];
    $query = "DELETE FROM Students WHERE ID=$id"; 
    $result = mysqli_query($db,$query) or die ();
    header("Location: DeleteStudent.php"); 
?>
