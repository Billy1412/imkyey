<?php
require 'connect.php';
include('adminverification.php');
if(isset($_POST['edit'])){
	$username = $_POST['username'];
	$sql  = "SELECT * FROM admin WHERE username = '$username'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);

	exit();

}
if(isset($_POST['save'])){
	$username = $_POST['username'];
	$name = $_POST['name'];
	$password = $_POST['password'];

	$sql = "INSERT INTO admin VALUES('$username','$name','$password')";
	$result = mysqli_query($con,$sql);
	exit();
	


}
if(isset($_POST['showtable'])){
	$sql = "SELECT * FROM admin";
	$result = mysqli_query($con,$sql);
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark'>
			    <tr>
			      <th scope='col-md-4' class='text-center'>Username</th>
			      <th scope='col' class='text-center'>Name</th>
			      <th scope='col' class='text-center'>Password</th>
			      <th scope='col' class='text-center'>Action</th>


			      
			    </tr>
			  </thead>
			  <tbody>";
	while($row=mysqli_fetch_array($result)){
		echo "
			  	<tr>
			  		<th class='text-center'>$row[0]</th>
					<th class='text-center'>$row[1]</th>
					<th class='text-center'>$row[2]</th>
					<td class='text-center'><button class = 'btn btn-dark edit' ide = '$row[0]'>Edit </button> <button class = 'btn btn-danger delete' idd = '$row[0]'>Delete</button></td>
					
				</tr>";
			  
			  
	}
	echo "</tbody>
			</table>";
	exit();
}
if(isset($_POST['del'])){
	$username = $_POST['username'];
	$sql = "DELETE FROM admin WHERE username = '$username'";
	$result = mysqli_query($con,$sql);
	
	exit();
}
if(isset($_POST['update'])){
	$username = $_POST['username'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	

	$sql="UPDATE admin set nama = '$name',password = '$password' WHERE username = '$username'";
	$result = mysqli_query($con,$sql);
	exit();
}
?>
<style>
    #judul{
      text-align : center;
      color: white;
      font-weight : bold;
      font-size : 1.5rem;
      padding-top: 0.2rem;
	  background-color :black;
    }


</style>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="jquery-3.6.1.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-5.2.0/css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
	    <div class="container-fluid">
	        <a class="navbar-brand" href="action.php">Back</a>
	        <button class="navbar-toggler" id= "navbartoggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon" ></span>
	        </button>
	        <div class="collapse navbar-collapse justify-content-between" id="navbarNav" >
	     
	    </div>
	</div>
</nav>
	<div class = "container">
		<div class = "content-web my-5">
			<p id ="judul" style = " height : 3rem; text-align: center; margin-button: 3rem;  margin-top: 3rem;" >Admin</p>
			<form>
				<label>Username </label><br>
				<input type="text" class="form-control" id = "username"><br>
				<label>Name</label><br>
				<input type="text" class="form-control" id = "name"><br>
				<label>Password</label><br>
				<input type="password" class="form-control" id = "pass"><br>
				<br>
				<button class = "btn btn-dark"   id="update">Update</button>
				<button class = "btn btn-dark"   id="save">Insert</button>
			</form>

			<div id = "showdata"></div>
		</div>
	</div>

			
	
	<script>
	$(document).ready(function(){
		showdata();
		$('#save').click(function(){
				v_username = $('#username').val();
				v_name = $('#name').val();
				v_pass = $('#pass').val();
			$.ajax({
				url : 'admin.php',
				type : 'POST',
				async : true,
				data : {
					save : 1,
					username : v_username,
					name : v_name,
					password : v_pass
					
				
				},
				success : function(result){
					alert('Insert Success');
					showdata();
				}
				
			})
		})
		$('body').delegate('.delete','click',function(){
				var v_username = $(this).attr('idd');
				var conf = window.confirm('Are You Sure');
				if (conf){
					$.ajax({
						url : 'admin.php',
						type : 'POST',
						async : true,
						data : {
							username : v_username,
							del : 1
						},
					success : function(result){
						alert('Delete Success');
						showdata();
						
					}
					})
				}
			})
		$('body').delegate('.edit','click',function(){
				var v_username = $(this).attr('ide');
				$.ajax({
					url : 'admin.php',
					type : "POST",
					async : true,
					data  : {
						edit : 1,
						username : v_username
					
					},
					success : function(result){
						var myObject = $.parseJSON(result);
						$('#username').val(myObject.username);
						$('#name').val(myObject.nama);
						$('#pass').val(myObject.password);
					

						
					}
				});
			});
		$('#update').click(function(){
				v_username = $('#username').val();
				v_name = $('#name').val();
				v_pass = $('#pass').val();
				
			$.ajax({
				url : 'admin.php',
				type : 'POST',
				async : true,
				data : {
					update : 1,
					username : v_username,
					name : v_name,
					password : v_pass
					
				
				},
				success : function(result){
					alert('Update Berhasil');
					showdata();
				}
				
			})
		})
	});
	function showdata(){
			$.ajax({
				url : 'admin.php',
				type : "POST",
				async : true,
				data : {
					showtable : 1
				},
			success : function(result){
				$("#showdata").html(result);
			}
			});
		}

			
	</script>
</body>
</html>
