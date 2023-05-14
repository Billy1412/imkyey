<?php
require 'connect.php';
include('adminverification.php');
if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$sql  = "SELECT * FROM features WHERE id = '$id'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);

	exit();

}
if(isset($_POST['save'])){
	$id = $_POST['id'];
	$room = $_POST['room'];
	$fac = $_POST['fac'];

	$sql = "INSERT INTO features VALUES($id,'$room','$fac')";
	$result = mysqli_query($con,$sql);
	exit();
	


}
if(isset($_POST['showtable'])){
	$sql = "SELECT * FROM features";
	$result = mysqli_query($con,$sql);
	echo "<table class='table table-bordered my-5' >
			  <thead class = 'table-dark' >
			    <tr>
			      <th scope='col-md-4' class='text-center'>ID</th>
			      <th scope='col' class='text-center'>Room ID</th>
			      <th scope='col' class='text-center'>Features Name</th>
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
	$id = $_POST['id'];
	$sql = "DELETE FROM features WHERE id = '$id'";
	$result = mysqli_query($con,$sql);
	
	exit();
}
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$room = $_POST['room'];
	$fac = $_POST['fac'];
	

	$sql="UPDATE features set id_room = '$room',nama = '$fac' WHERE id = '$id'";
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
			<p id ="judul" style = " height : 3rem; text-align: center; margin-button: 3rem;  margin-top: 3rem;" >Features </p>
			<form>
			<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>ID </label><br>
				<input type="text" class="form-control" id = "id">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>ID Room</label><br>
				<input type="text" class="form-control" id = "room">
					</div><br>
				</div><br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>Features Name</label><br>
				<input type="text" class="form-control" id = "fac">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					</div><br>
				</div>
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
				v_id = $('#id').val();
				v_room = $('#room').val();
				v_fac = $('#fac').val();
			$.ajax({
				url : 'facilities.php',
				type : 'POST',
				async : true,
				data : {
					save : 1,
					id : v_id,
					room : v_room,
					fac : v_fac,
					
				
				},
				success : function(result){
					alert('Insert Success');
					showdata();
				}
				
			})
		})
		$('body').delegate('.delete','click',function(){
				var v_id = $(this).attr('idd');
				var conf = window.confirm('Are You Sure');
				if (conf){
					$.ajax({
						url : 'facilities.php',
						type : 'POST',
						async : true,
						data : {
							id : v_id,
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
				var v_id = $(this).attr('ide');
				$.ajax({
					url : 'facilities.php',
					type : "POST",
					async : true,
					data  : {
						edit : 1,
						id : v_id
					
					},
					success : function(result){
						var myObject = $.parseJSON(result);
						$('#id').val(myObject.id);
						$('#room').val(myObject.id_room);
						$('#fac').val(myObject.nama);
					

						
					}
				});
			});
		$('#update').click(function(){
				v_id = $('#id').val();
				v_room = $('#room').val();
				v_fac = $('#fac').val();
				
			$.ajax({
				url : 'facilities.php',
				type : 'POST',
				async : true,
				data : {
					update : 1,
					id : v_id,
					room : v_room,
					fac : v_fac
					
				
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
				url : 'facilities.php',
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
