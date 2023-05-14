<?php
require "connect.php";
$username=$_POST['id'];
$nama=$_POST['nama'];
$tanggal=$_POST['tanggal'];
$nomor=$_POST['nomor'];
$email=$_POST['email'];
$password=$_POST['password'];
$sql=mysqli_query($con,"SELECT * FROM member where id_member='$username'");
$sqle= mysqli_query($con, "SELECT * FROM admin where username ='$username'");
if(mysqli_num_rows($sql)>0 or mysqli_num_rows($sqle)>0)
{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Username Already Exists');
    window.location.href='register.php';
    </script>");
}
else if (isset($_POST['save']))
{
    $sql="insert into member values('$username','$nama', '$tanggal', '$nomor', '$email','$password')";
    $query=mysqli_query($con,$sql);
    header ("Location: login.php?status=success");
}
?>
