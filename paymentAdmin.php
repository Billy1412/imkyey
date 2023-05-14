<?php
require 'connect.php';
include('adminverification.php');
if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$sql  = "SELECT * FROM kartu_kredit WHERE id_kartu = '$id'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);

	exit();

}
if(isset($_POST['save'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$cvv = $_POST['cvv'];
	$exp = $_POST['exp'];

	$sql = "INSERT INTO kartu_kredit VALUES('$id','$name','$cvv','$exp')";
	$result = mysqli_query($con,$sql);
	exit();
	


}
if(isset($_POST['showtable'])){
	$sql = "SELECT * FROM kartu_kredit";
	$result = mysqli_query($con,$sql);
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark'>
			    <tr>
			      <th scope='col-md-4' class='text-center'>ID Card</th>
			      <th scope='col' class='text-center'>Name</th>
			      <th scope='col' class='text-center'>CVV</th>
			      <th scope='col' class='text-center'>Expired Date</th>
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
					<th class='text-center'>$row[3]</th>
					<td class='text-center'><button class = 'btn btn-dark edit' ide = '$row[0]'>Edit </button> <button class = 'btn btn-danger delete' idd = '$row[0]'>Delete</button></td>
					
				</tr>";
			  
			  
	}
	echo "</tbody>
			</table>";
	exit();
}
if(isset($_POST['del'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM kartu_kredit WHERE id_kartu = '$id'";
	$result = mysqli_query($con,$sql);
	
	exit();
}
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$cvv = $_POST['cvv'];
	$exp = $_POST['exp'];

	$sql="UPDATE kartu_kredit set nama = '$name',cvv= '$cvv',expired_date = '$exp' WHERE id_kartu = '$id'";
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
			<p id ="judul" style = " height : 3rem; text-align: center; margin-button: 3rem;  margin-top: 3rem;" >Credit Card </p>
			<form>
			<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>ID Card </label><br>
				<input type="text" class="form-control" id = "id">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>Name</label><br>
				<input type="text" class="form-control" id = "nama">
					</div>
				</div><br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>CVV</label><br>
				<input type="text" class="form-control" id = "cvv">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>Expired Date</label><br>
				<input type="date" class="form-control" id = "exp">
					</div>
				</div>
				<br>
				<button class = "btn btn-dark"   id="update">Update</button>
				<button class = "btn btn-dark"   id="save">Insert</button>
			</form>
			</div>

			<div id = "showdata"></div>
	</div>

			
	
	<script>
	$(document).ready(function(){
		showdata();
		$('#save').click(function(){
				v_id = $('#id').val();
				v_name = $('#nama').val();
				v_cvv = $('#cvv').val();
				v_exp = $('#exp').val();
			$.ajax({
				url : 'paymentAdmin.php',
				type : 'POST',
				async : true,
				data : {
					save : 1,
					id : v_id,
					name : v_name,
					cvv : v_cvv,
					exp : v_exp
					
				
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
						url : 'paymentAdmin.php',
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
					url : 'paymentAdmin.php',
					type : "POST",
					async : true,
					data  : {
						edit : 1,
						id : v_id
					
					},
					success : function(result){
						var myObject = $.parseJSON(result);
						$('#id').val(myObject.id_kartu);
						$('#nama').val(myObject.nama);
						$('#cvv').val(myObject.cvv);
						$('#exp').val(myObject.expired_date);
					

						
					}
				});
			});
		$('#update').click(function(){
				v_id = $('#id').val();
				v_name = $('#nama').val();
				v_cvv = $('#cvv').val();
				v_exp = $('#exp').val();
				
			$.ajax({
				url : 'paymentAdmin.php',
				type : 'POST',
				async : true,
				data : {
					update : 1,
					id : v_id,
					name : v_name,
					cvv : v_cvv,
					exp : v_exp
					
				
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
				url : 'paymentAdmin.php',
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
