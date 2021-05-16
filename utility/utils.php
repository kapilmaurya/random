<?php
	function register($email , $uname , $pass , $cpass)
	{
		if(!$email || !$uname || !$pass || !$cpass)
		{
			$missing= !$email ? "Email":(!$uname ? "Username":(!$pass ? "Password":"Confirm-Password"));
			return '<h5 style="color: RED">'.$missing." is missing".'</h5>';
		}
		if ($pass!=$cpass) {
		 	return '<h5 style="color: RED">'."Password and Confirm-Password mismatch".'</h5>';
		 } 
		include '../includes/db.php';
		try {
			$sql='INSERT INTO user(email,username,password) VALUES(:email,:username,:password)';
			$stmnt=$conn->prepare($sql);
			$stmnt->execute([':email'=>$email,
										':username'=>$uname,
										':password'=>md5($pass)]);
			$conn=null;
			// return '<h5 style="color: GREEN">'."successfuly register".'</h5>';
			header('location: ../includes/login.php');
		} catch (Exception $e) {
			
		}
	}

	function login($email , $pass)
	{
		if(!$email || !$pass)
		{
			$missing= !$email ? "Email":"Password";
			return '<h5 style="color: RED">'.$missing." is missing".'</h5>';
		}
		include '../includes/db.php';
		if (!$conn) {
			return '<h5 style="color: RED">'.'Connection Problem'.'</h5>';
		}
		try {
			$sql='SELECT * FROM user WHERE email=?';
			$stmt=$conn->prepare($sql);
			$stmt->execute([$email]);
			$result=$stmt->fetch(PDO::FETCH_OBJ);
			// echo $result;
			if(!$result)
			{
				return '<h5 style="color: RED">'.'No User Found'.'</h5>';
			}
			if ($result->password!=md5($pass)) {
				return '<h5 style="color: RED">'.'Password Incorrect'.'</h5>';
			}
			$conn=null;
			session_start();
			$_SESSION['user']=$result;
			header("Location: http://localhost/project1/index.php");
		} catch (Exception $e) {
			
		}
	}

	function createpost($title , $body , $user)
	{
		if(!$title || !$body)
		{
			$missing= !$title ? "Title":"Body ";
			return '<h5 style="color: RED">'.$missing." is missing".'</h5>';
		}
		include './includes/db.php';
		 if(!$conn){
            return '<h5 class="mt-3" style="color: red;"> Connection Problem </h5>';
        }
		try {
			$sql='INSERT INTO post(title,body,user) VALUES(:title,:body,:user)';
			$stmnt=$conn->prepare($sql);
			$stmnt->execute([':title'=>$title,
										':body'=>$body,
										':user'=>$user]);
			$conn=null;
			return '<h5 style="color: GREEN">'."Post Created".'</h5>';
			// header('location: ../includes/login.php');
		} catch (Exception $e) {
			
		}
	}

	function updatepost($title , $body , $id)
	{
		// if(!$title || !$body)
		// {
		// 	$missing= !$title ? "Title":"Body ";
		// 	return '<h5 style="color: RED">'.$missing." is missing".'</h5>';
		// }
		include './includes/db.php';
		 if(!$conn){
            return '<h5 class="mt-3" style="color: red;"> Connection Problem </h5>';
        }
		try {
			$sql='UPDATE post SET title=:title, body=:body WHERE id=:id';
			$stmnt=$conn->prepare($sql);
			$stmnt->execute([':title'=>$title,
										':body'=>$body,
										':id'=>$id]);
			$conn=null;
			return '<h5 style="color: GREEN">'."Successfuly Updated ".$id.'</h5>';
			// header('location: ../includes/login.php');
		} catch (Exception $e) {
			
		}
	}
?>