<?php 

function isLoggedIn()
{
	if (isset($_SESSION['login_user'])) {
		return true;
	}else{
		return false;
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM Students WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	