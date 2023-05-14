<?php
require 'connect.php';
include('adminverification.php');
if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$sql  = "SELECT * FROM review WHERE id_review = '$id'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);

	exit();

}
if(isset($_POST['save'])){
	$id = $_POST['id'];
	$rate = $_POST['rate'];
	$detail = $_POST['detail'];
	$trans = $_POST['trans'];
	$review = $_POST['review'];

	$sql = "INSERT INTO review VALUES($id,$rate,'$detail','$trans','$review')";
	$result = mysqli_query($con,$sql);
	exit();
	


}
if(isset($_POST['showtable'])){
	$sql = "SELECT * FROM review";
	$result = mysqli_query($con,$sql);
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark'>
			    <tr>
			      <th scope='col-md-4' class='text-center'>ID Review</th>
			      <th scope='col' class='text-center'>User Rating</th>
			      <th scope='col' class='text-center'>Detail</th>
			      <th scope='col' class='text-center'>Transaction ID</th>
			      <th scope='col' class='text-center'>Tanggal Review</th>
			      <th scope='col' class='text-center'>Action</th>


			      
			    </tr>
			  </thead>
			  <tbody>";
	while($row=mysqli_fetch_array($result)){
		echo "
			  	<tr>
			  		<th class='text-center'>$row[0]</th>
					<th class='text-center'>$row[1]</th>
					<th  style= 'width:35%'>$row[2]</th>
					<th class='text-center'>$row[3]</th>
					<th class='text-center'>$row[4]</th>
					<td class='text-center'><button class = 'btn btn-dark edit' ide = '$row[0]'>Edit </button> <button class = 'btn btn-danger delete' idd = '$row[0]'>Delete</button></td>
					
				</tr>";
			  
			  
	}
	echo "</tbody>
			</table>";
	exit();
}
if(isset($_POST['del'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM review WHERE id_review = '$id'";
	$result = mysqli_query($con,$sql);
	
	exit();
}
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$rate = $_POST['rate'];
	$detail = $_POST['detail'];
	$trans = $_POST['trans'];
	$review = $_POST['review'];


	
	$sql="UPDATE review SET user_rating = $rate ,detail = '$detail', id_transaksi = '$trans', tanggal_review = '$review' WHERE id_review = '$id'";
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
		<p id ="judul" style = " height : 3rem; text-align: center; margin-button: 3rem;  margin-top: 3rem;" >Reviews</p>
			<form>
			<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>ID Review </label><br>
				<input type="text" class="form-control" id = "id">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>User Rating</label><br>
				<input type="number" class="form-control quantity" min="0" max="5"id = "rate">
					</div>
				</div><br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>Detail</label><br>
				<textarea class="form-control" id = "detail"></textarea>
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">

					<label>Transaction ID</label><br>
				<input type="text" class="form-control" id = "trans">
					</div>
				</div><br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>Review Date</label><br>
				<input type="date" class="form-control" id = "review">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					</div>
				</div>
				<br>
				<button class = "btn btn-dark"   id="update">Update</button>
				<button class = "btn btn-dark"   id="save" >Insert</button>
			</form>

			<div id = "showdata"></div>
		</div>
	</div>

			
	
	<script>
	$(document).ready(function(){
		showdata();
		$('#save').click(function(){
				v_id = $('#id').val();
				v_rate = $('#rate').val();
				v_detail = $('#detail').val();
				v_trans = $('#trans').val();
				v_review = $('#review').val();
			$.ajax({
				url : 'reviewAdmin.php',
				type : 'POST',
				async : true,
				data : {
					save : 1,
					id : v_id,
					rate : v_rate,
					detail : v_detail,
					trans : v_trans,
					review : v_review
					
				
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
						url : 'reviewAdmin.php',
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
					url : 'reviewAdmin.php',
					type : "POST",
					async : true,
					data  : {
						edit : 1,
						id : v_id
					
					},
					success : function(result){
						var myObject = $.parseJSON(result);
						$('#id').val(myObject.id_review);
						$('#rate').val(myObject.user_rating);
						$('#detail').val(myObject.detail);
						$('#trans').val(myObject.id_transaksi);
						$('#review').val(myObject.tanggal_review);
					

						
					}
				});
			});
		$('#update').click(function(){
				v_id = $('#id').val();
				v_rate = $('#rate').val();
				v_detail = $('#detail').val();
				v_trans = $('#trans').val();
				v_review = $('#review').val();
			$.ajax({
				url : 'reviewAdmin.php',
				type : 'POST',
				async : true,
				data : {
					update : 1,
					id : v_id,
					rate : v_rate,
					detail : v_detail,
					trans : v_trans,
					review : v_review
					
					
					
				
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
				url : 'reviewAdmin.php',
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
