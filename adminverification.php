<?php
session_start();
$sql = mysqli_query($con, "SELECT * FROM admin where username = '".$_SESSION['id']."' and password = '".$_SESSION['password']."'");
		$row = mysqli_fetch_array($sql);
		if(!is_array($row)){
			header("Location: login.php");
		}
?>