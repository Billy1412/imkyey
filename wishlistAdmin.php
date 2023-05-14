<?php
require 'connect.php';
include('adminverification.php');
if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$sql  = "SELECT * FROM wishlist WHERE id_wishlist = '$id'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);

	exit();

}
if(isset($_POST['save'])){
	$id = $_POST['id'];
	$mid = $_POST['mid'];
	$detail = $_POST['detail'];
	$ci = $_POST['ci'];
	$rid = $_POST['rid'];
	$co = $_POST['co'];
	$bf = $_POST['bf'];
	$smk = $_POST['smk'];
	$qty = $_POST['qty'];

	
	$sql = "INSERT INTO wishlist VALUES('$id','$mid','$detail','$ci','$rid','$co',$bf,$smk,$qty)";
	$result = mysqli_query($con,$sql);
	exit();
	


}
if(isset($_POST['showtable'])){
	$sql = "SELECT * FROM wishlist";
	$result = mysqli_query($con,$sql);
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark'>
			    <tr>
			      <th scope='col-md-4' class='text-center'>Wishlist ID</th>
			      <th scope='col' class='text-center'>Member ID</th>
			      <th scope='col-md-4' class='text-center'>Detail</th>
			      <th scope='col' class='text-center'>Check In</th>
			      <th scope='col' class='text-center'>Room ID</th>
			      <th scope='col-md-4' class='text-center'>Check Out</th>
			      <th scope='col' class='text-center'>Breakfast</th>
			      <th scope='col' class='text-center'>Smoking</th>
			      <th scope='col' class='text-center'>Quantity</th>
			      <th scope = 'col' class='text-center'>Action</th>
			      
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
					<th class='text-center'>$row[4]</th>
					<th class='text-center'>$row[5]</th>
					<th class='text-center'>$row[6]</th>
					<th class='text-center'>$row[7]</th>
					<th class='text-center'>$row[8]</th>
					<td class='text-center'><button class = 'btn btn-dark edit' ide = '$row[0]'>Edit </button> <button class = 'btn btn-danger delete' idd = '$row[0]'>Delete</button></td>
					
				</tr>";
			  
			  
	}
	echo "</tbody>
			</table>";
	exit();
}
if(isset($_POST['del'])){
	$id = $_POST['id'];
	$sql3 = "DELETE FROM wishlist WHERE id_wishlist='$id'";
	$result3 = mysqli_query($con,$sql3);
	exit();
}
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$mid = $_POST['mid'];
	$detail = $_POST['detail'];
	$ci = $_POST['ci'];
	$rid = $_POST['rid'];
	$co = $_POST['co'];
	$bf = $_POST['bf'];
	$smk = $_POST['smk'];
	$qty = $_POST['qty'];

	$sql="UPDATE wishlist set id_member='$mid', detail = '$detail', in_date = '$ci', id_room = '$rid', out_date = '$co',breakfast = $bf, smoking = $smk, quantity = $qty WHERE id_wishlist = '$id'";
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
			<p id ="judul" style = " height : 3rem; text-align: center; margin-button: 3rem;  margin-top: 3rem;" >Wishlist</p>
			<form>
			<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>Wishlist ID</label><br>
				<input type="text" class="form-control" id = "id">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>Member ID</label><br>
				<input type="text" class="form-control" id = "mid">
					</div>
				</div><br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>Details</label><br>
				<textarea class="form-control" id = "detail"></textarea>
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>Check In</label><br>
				<input type="date" class="form-control" id = "ci">
					</div>
				</div><br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>Check Out</label><br>
				<input type="date" class="form-control" id = "co">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>Room ID</label><br>
				<input type="text" class="form-control" id = "rid">
					</div>
				</div><br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>Breakfast</label><br>
				<input type="number" class="form-control quantity"min ="0" id = "bf">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>Smoking</label><br>
				<input type="number" class="form-control quantity" min = "0" id = "smk">
					</div>
				</div><br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>Quantity</label><br>
				<input type="number" class="form-control quantity" min = "0" id = "qty">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">

					</div>
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
				v_mid = $('#mid').val();
				v_detail = $('#detail').val();
				v_ci = $('#ci').val();
				v_rid = $('#rid').val();
				v_co = $('#co').val();
				v_bf = $('#bf').val();
				v_smk = $('#smk').val();
				v_qty = $('#qty').val();
			$.ajax({
				url : 'wishlistAdmin.php',
				type : 'POST',
				async : true,
				data : {
					save : 1,
					id : v_id,
					mid : v_mid,
					detail : v_detail,
					ci : v_ci,
					rid : v_rid,
					co : v_co,
					bf : v_bf,
					smk : v_smk,
					qty : v_qty
				
				},
				success : function(result){
					alert('Insert Success');
				}
				
			})
		})
		$('body').delegate('.delete','click',function(){
				var v_id = $(this).attr('idd');
				var conf = window.confirm('Are You Sure');
				if (conf){
					$.ajax({
						url : 'wishlistAdmin.php',
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
					url : 'wishlistAdmin.php',
					type : "POST",
					async : true,
					data  : {
						edit : 1,
						id : v_id
					
					},
					success : function(result){
						var myObject = $.parseJSON(result);
						$('#id').val(myObject.id_wishlist);
						$('#mid').val(myObject.id_member);
						$('#detail').val(myObject.detail);
						$('#ci').val(myObject.in_date);
						$('#rid').val(myObject.id_room);
						$('#co').val(myObject.out_date);
						$('#bf').val(myObject.breakfast);
						$('#smk').val(myObject.smoking);
						$('#qty').val(myObject.quantity);

						
					}
				});
			});
		$('#update').click(function(){
				v_id = $('#id').val();
				v_mid = $('#mid').val();
				v_detail = $('#detail').val();
				v_ci = $('#ci').val();
				v_rid = $('#rid').val();
				v_co = $('#co').val();
				v_bf = $('#bf').val();
				v_smk = $('#smk').val();
				v_qty = $('#qty').val();
			$.ajax({
				url : 'wishlistAdmin.php',
				type : 'POST',
				async : true,
				data : {
					update : 1,
					id : v_id,
					mid : v_mid,
					detail : v_detail,
					ci : v_ci,
					rid : v_rid,
					co : v_co,
					bf : v_bf,
					smk : v_smk,
					qty : v_qty
				
				
				},
				success : function(result){
					alert('Update Berhasil');
					
				}
				
			})
		})
	});
	function showdata(){
			$.ajax({
				url : 'wishlistAdmin.php',
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
