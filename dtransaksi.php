<?php
require 'connect.php';
include('adminverification.php');
if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$sql  = "SELECT * FROM detail_transaksi WHERE id_detail = '$id'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);

	exit();

}
if(isset($_POST['save'])){
	$id = $_POST['id'];
	$co = $_POST['co'];
	$ci = $_POST['ci'];
	$night = $_POST['night'];
	$qty = $_POST['qty'];
	$price = $_POST['price'];
	$amount = $_POST['amount'];
	$detail = $_POST['detail'];
	$room = $_POST['room'];
	$trans = $_POST['id2'];
	$bf = $_POST['bf'];
	$smk = $_POST['smk'];

	$sql = "INSERT INTO detail_transaksi VALUES('$id','$co','$ci',$night,$qty,$price,$amount,'$detail','$room','$trans',$bf,$smk)";
	$result = mysqli_query($con,$sql);
	exit();
	


}
if(isset($_POST['showtable'])){
	$sql = "SELECT * FROM detail_transaksi";
	$result = mysqli_query($con,$sql);
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark'>
			    <tr>
			      <th scope='col' class='text-center' >ID Detail Transaction</th>
			      <th scope='col' class='text-center'>Check In</th>
			      <th scope='col' class='text-center'>Check Out</th>
			      <th scope='col' class='text-center' style = 'padding-bottom:1.5rem;'>Nights</th>
			      <th scope='col' class='text-center' style = 'padding-bottom:1.5rem;'>Quantity</th>
			      <th scope='col' class='text-center' style = 'padding-bottom:1.5rem;'>Price</th>
			      <th scope='col' class='text-center' style = 'padding-bottom:1.5rem;'>Amount</th>
			      <th scope='col-md-4' class='text-center' style = 'padding-bottom:1.5rem;'>Detail</th>
			      <th scope='col' class='text-center'>Room ID</th>
			      <th scope='col' class='text-center'>Transaction ID</th>
			      <th scope='col' class='text-center' style = 'padding-bottom:1.5rem;'>Breakfast</th>
			      <th scope='col' class='text-center' style = 'padding-bottom:1.5rem;'>Smoking</th>
			      <th scope='col' class='text-center' style = 'padding-bottom:1.5rem;' >Action</th>


			      
			    </tr>
			  </thead>
			  <tbody>";
	while($row=mysqli_fetch_array($result)){
		echo "
			  	<tr>
			  		<th class='text-center' >$row[0]</th>
					<th class='text-center'>$row[1]</th>
					<th class='text-center'>$row[2]</th>
					<th class='text-center'>$row[3]</th>
					<th class='text-center'>$row[4]</th>
					<th class='text-center'>$row[5]</th>
					<th class='text-center'>$row[6]</th>
					<th >$row[7]</th>
					<th class='text-center'>$row[8]</th>
					<th class='text-center'>$row[9]</th>
					<th class='text-center'>$row[10]</th>
					<th class='text-center'>$row[11]</th>
					<td><button class = 'btn btn-dark edit' ide = '$row[0]' style = 'margin-bottom: 0.5rem'>Edit </button><button class = 'btn btn-danger delete' idd = '$row[0]'>Delete</button></td>
					
				</tr>";
			  
			  
	}
	echo "</tbody>
			</table>";
	exit();
}
if(isset($_POST['del'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM detail_transaksi WHERE id_detail = '$id'";
	$result = mysqli_query($con,$sql);
	
	exit();
}
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$ci = $_POST['ci'];
	$co = $_POST['co'];
	$night = $_POST['night'];
	$qty = $_POST['qty'];
	$price = $_POST['price'];
	$amount = $_POST['amount'];
	$detail = $_POST['detail'];
	$room = $_POST['room'];
	$trans = $_POST['id2'];
	$bf = $_POST['bf'];
	$smk = $_POST['smk'];
	

	$sql="UPDATE detail_transaksi SET in_date = '$ci',out_date = '$co',nights = $night,quantity = $qty, harga_room = $price,amount = $amount,detail = '$detail',id_room = '$room',id_transaksi = '$trans',breakfast= $bf, smoking = $smk WHERE id_detail = '$id'";
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
		<p id ="judul" style = " height : 3rem; text-align: center; margin-button: 3rem;  margin-top: 3rem;" >Transaction Details</p>
			<form>
			<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>ID Detail Transaction </label><br>
				<input type="text" class="form-control" id = "id">
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
					<label>Nights</label><br>
				<input type="text" class="form-control" id = "night">
					</div>
				</div><br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>Quantities</label><br>
				<input type="number" class="form-control quantity" min = "0" id = "qty">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>Price</label><br>
				<input type="text" class="form-control" id = "price">
					</div>
				</div><br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>Amount</label><br>
				<input type="text" class="form-control" id = "amount">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>Detail</label><br>
				<textarea class="form-control" id = "detail"></textarea>
					</div>
				</div><br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>ID Room</label><br>
				<input type="text" class="form-control" id = "room">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>Transaction ID</label><br>
				<input type="text" class="form-control" id = "id2">
					</div>
				</div><br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>Breakfast</label><br>
				<input type="number" class="form-control quantity" min = "0" id = "bf">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>Smoking</label><br>
				<input type="number" class="form-control quantity" min = "0" id = "smk">
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
				v_ci = $('#ci').val();
				v_co = $('#co').val();
				v_night = $('#night').val();
				v_qty = $('#qty').val();
				v_price = $('#price').val();
				v_amount = $('#amount').val();
				v_detail = $('#detail').val();
				v_room = $('#room').val();
				v_id2 = $('#id2').val();
				v_bf = $('#bf').val();
				v_smk = $('#smk').val();
			$.ajax({
				url : 'dtransaksi.php',
				type : 'POST',
				async : true,
				data : {
					save : 1,
					id : v_id,
					ci : v_ci,
					co : v_co,
					night : v_night,
					qty : v_qty,
					price : v_price,
					amount : v_amount,
					detail : v_detail,
					room : v_room,
					id2 : v_id2,
					bf : v_bf,
					smk : v_smk
					
				
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
						url : 'dtransaksi.php',
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
					url : 'dtransaksi.php',
					type : "POST",
					async : true,
					data  : {
						edit : 1,
						id : v_id
					
					},
					success : function(result){
						var myObject = $.parseJSON(result);
						$('#id').val(myObject.id_detail);
						$('#ci').val(myObject.in_date);
						$('#co').val(myObject.out_date);
						$('#night').val(myObject.nights);
						$('#qty').val(myObject.quantity);
						$('#price').val(myObject.harga_room);
						$('#amount').val(myObject.amount);
						$('#detail').val(myObject.detail);
						$('#room').val(myObject.id_room);
						$('#id2').val(myObject.id_transaksi);
						$('#bf').val(myObject.breakfast);
						$('#smk').val(myObject.smoking);
					

						
					}
				});
			});
		$('#update').click(function(){
				v_id = $('#id').val();
				v_ci = $('#ci').val();
				v_co = $('#co').val();
				v_night = $('#night').val();
				v_qty = $('#qty').val();
				v_price = $('#price').val();
				v_amount = $('#amount').val();
				v_detail = $('#detail').val();
				v_room = $('#room').val();
				v_id2 = $('#id2').val();
				v_bf = $('#bf').val();
				v_smk = $('#smk').val();
				
			$.ajax({
				url : 'dtransaksi.php',
				type : 'POST',
				async : true,
				data : {
					update : 1,
					id : v_id,
					ci : v_ci,
					co : v_co,
					night : v_night,
					qty : v_qty,
					price : v_price,
					amount : v_amount,
					detail : v_detail,
					room : v_room,
					id2 : v_id2,
					bf : v_bf,
					smk : v_smk
					
				
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
				url : 'dtransaksi.php',
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
