<?php
require "connect.php";
$idWishlist=$_GET['id'];
mysqli_query($con,"delete from wishlist where id_wishlist='$idWishlist'");
header("location: wishlist.php");
?>