<?php
    include 'session.php';
    include 'dbconnect.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $phone_number= $_POST['phone_number'];
        $password= $_POST['password'];

        $sql = "SELECT * FROM account where phone_number = '$phone_number' and password = '$password'";
		$query = $conn->query($sql);

        if($query->num_rows > 0){
            $_SESSION['error'] = '';
            $row = $query->fetch_assoc();
			$_SESSION['account'] = $row['phone_number'];
			header('location: profile.php');
        } 
        else{
            $_SESSION['error'] = 'Account not found!';
			header('location: login-register.php');
        }
    }
	else{
		header('location: login-register.php');
    }
?>