<?php
session_start();
require 'connect.php';
if(isset($_POST['save']))
{
    $id = $_POST['id'];
    $password = $_POST['password'];
    $sql = mysqli_query($con, "SELECT * FROM member where id_member = '$id' and password = '$password'");
    $row = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["id"] = $row['id_member'];
        // $_SESSION["username"] = $row['username'];
        $_SESSION["password"] = $row['password'];
        // $_SESSION["login"] = true;
        header("Location: home.php");
        exit;
    }
    else{
		$sql = mysqli_query($con, "SELECT * FROM admin where username = '$id' and password = '$password'");
		$row = mysqli_fetch_array($sql);
		if(is_array($row)){
			$_SESSION["id"] = $row['username'];
      $_SESSION["password"] = $row['password'];
			header("Location: admindashbord.php");
			exit();
		}
		else{
			echo("<script LANGUAGE = 'JavaScript'>
			window.alert('Invalid Member Id/Password');
			window.location.href = 'login.php';
			</script>");
		}
    }
}
?>