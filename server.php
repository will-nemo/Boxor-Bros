<?php 
session_start(); 
// variable declaration
$username = "";
$email    = "";
$question1 = "";
$errors = array(); 
$_SESSION['success'] = "";
$db = mysqli_connect('dbsrv2.cs.fsu.edu', 'wlambert', '.qt,m5^d96nKFDF&', 'wlambertdb');
  
 if ($db->connect_error){
        die("Connection Failed: " . $db->connect_error);
    }

//    echo "Connected successfully";
// REGISTER USER
if (isset($_POST['register'])) {
    
	// receive all input values from the form
	$username = mysqli_real_escape_string($db, $_POST['last']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }

	
	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = $password_1;//encrypt the password before saving in the database
		$query = "INSERT INTO users (LastName, Email, Password, status) 
				  VALUES('$username', '$email', '$password', 'YES')";
		mysqli_query($db, $query);
		$makecart = "INSERT INTO cart (Email) VALUES ('$email')";
		mysqli_query($db, $makecart);
		setcookie("user", $email);
		$_SESSION['username'] = $email;
		$_SESSION['success'] = "Welcome! You are now logged into your Boxor Bros Account";
		header('location: home.php');
	}

}

if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}
	if (count($errors) == 0) {
		$password = $password;
		$query = "SELECT * FROM users WHERE Email='$email' AND Password='$password'";
		$cookie_name = "user";
		setcookie($cookie_name, $email);
        $cookie_name1 = "merch";
		setcookie($cookie_name1, "");
        $cookie_name2 = "query";
		setcookie($cookie_name2, "");
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) {
            $makestatus = "UPDATE users SET status='YES' WHERE Email='$email'";
		     mysqli_query($db, $makestatus);
			$_SESSION['username'] = $email;
			$_SESSION['success'] = "You are now logged into your Boxor Bros Account!";
			header('location: home.php');
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

if (isset($_POST['custom'])) {
    
	// receive all input values from the form
	$name = mysqli_real_escape_string($db, $_POST['merchName']);
	$desc = mysqli_real_escape_string($db, $_POST['desc']);
	$IMG = mysqli_real_escape_string($db, $_POST['IMG']);
    $type = "Custom";
    $price = 34.99;
	
if (count($errors) == 0) {
		$query = "INSERT INTO merch (name, type, description, IMG, price) 
				  VALUES('$name', '$type', '$desc', '$IMG', '$price')";
		mysqli_query($db, $query);
		
	
		header('location: home.php');
    }else{
       array_push($errors, "Wrong username/password combination");
    }
    
}

if (isset($_POST['psubmit'])) {
    
	// receive all input values from the form
	$priced = mysqli_real_escape_string($db, $_POST['priced']);
  
        header("Location: boxer_display.php?priced=$priced");
		
    
}

if (isset($_POST['create'])) {
    
	// receive all input values from the form
	$name = mysqli_real_escape_string($db, $_POST['merchName']);
	$desc = mysqli_real_escape_string($db, $_POST['desc']);
	$IMG = mysqli_real_escape_string($db, $_POST['IMG']);
    $type = mysqli_real_escape_string($db, $_POST['type']);
    $price= mysqli_real_escape_string($db, $_POST['price']);

	
if (count($errors) == 0) {
		$query = "INSERT INTO merch (name, type, description, IMG, price) 
				  VALUES('$name', '$type', '$desc', '$IMG', '$price')";
		mysqli_query($db, $query);
		
	
		header('location: home.php');
    }else{
       array_push($errors, "Wrong username/password combination");
    }
    
}
?>