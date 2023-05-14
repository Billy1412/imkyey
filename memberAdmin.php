<?php
require 'connect.php';
include('adminverification.php');
if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$sql  = "SELECT * FROM member WHERE id_member = '$id'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);

	exit();

}
if(isset($_POST['save'])){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$birth = $_POST['birth'];
	$telp = $_POST['telp'];
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];

	$sql = "INSERT INTO member VALUES('$id','$nama','$birth','$telp','$mail','$pass')";
	$result = mysqli_query($con,$sql);
	exit();
	


}
if(isset($_POST['showtable'])){
	$sql = "SELECT * FROM member";
	$result = mysqli_query($con,$sql);
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark' style = 'text-align:center';>
			    <tr>
			      <th scope='col' class='text-center'>ID Member</th>
			      <th scope='col' class='text-center'>Nama</th>
			      <th scope='col' class='text-center'>Tanggal Lahir</th>
			      <th scope='col' class='text-center'>No telp</th>
			      <th scope='col' class='text-center'>Email</th>
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
					<th class='text-center'>$row[3]</th>
					<th class='text-center'>$row[4]</th>
					<th class='text-center'>$row[5]</th>
					<td class='text-center'><button class = 'btn btn-dark edit' ide = '$row[0]'>Edit </button> <button class = 'btn btn-danger delete' idd = '$row[0]'>Delete</button></td>
					
				</tr>";
			  
			  
	}
	echo "</tbody>
			</table>";
	exit();
}
if(isset($_POST['del'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM member WHERE id_member = '$id'";
	$result = mysqli_query($con,$sql);
	
	exit();
}
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$birth = $_POST['birth'];
	$telp = $_POST['telp'];
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	

	$sql="UPDATE member set nama = '$nama',tanggal_lahir = '$birth',no_telp = '$telp',email = '$mail',password = '$pass' WHERE id_member = '$id'";
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
		<p id ="judul" style = " height : 3rem; text-align: center; margin-button: 3rem;  margin-top: 3rem;" >Members </p>
			<form>
			<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>ID Member</label><br>
				<input type="text" class="form-control" id = "id">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">

					<label>Nama</label><br>
				<input type="text" class="form-control" id = "nama">
					</div><br>
				</div><br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">

					<label>Tanggal lahir</label><br>
				<input type="date" class="form-control" id = "birth">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">

					<label>Nomor Telepon</label><br>
				<input type="text" class="form-control" id = "telp">
					</div><br>
				</div><br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>Email</label><br>
				<input type="text" class="form-control" id = "mail">
				</div><br>
					<div class="col-4" style = " margin-left:-9rem;">

					<label>Password</label><br>
				<input type="password" class="form-control" id = "pass">
				</div><br>				</div>
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
				v_nama = $('#nama').val();
				v_birth = $('#birth').val();
				v_telp = $('#telp').val();
				v_mail = $('#mail').val();
				v_pass = $('#pass').val();
			$.ajax({
				url : 'memberAdmin.php',
				type : 'POST',
				async : true,
				data : {
					save : 1,
					id : v_id,
					nama : v_nama,
					birth : v_birth,
					telp : v_telp,
					mail : v_mail,
					pass : v_pass
					
				
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
						url : 'memberAdmin.php',
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
					url : 'memberAdmin.php',
					type : "POST",
					async : true,
					data  : {
						edit : 1,
						id : v_id
					
					},
					success : function(result){
						var myObject = $.parseJSON(result);
						$('#id').val(myObject.id_member);
						$('#nama').val(myObject.nama);
						$('#birth').val(myObject.tanggal_lahir);
						$('#telp').val(myObject.no_telp);
						$('#mail').val(myObject.email);
						$('#pass').val(myObject.password);
					

						
					}
				});
			});
		$('#update').click(function(){
				v_id = $('#id').val();
				v_nama = $('#nama').val();
				v_birth = $('#birth').val();
				v_telp = $('#telp').val();
				v_mail = $('#mail').val();
				v_pass = $('#pass').val();
				
			$.ajax({
				url : 'memberAdmin.php',
				type : 'POST',
				async : true,
				data : {
					update : 1,
					id : v_id,
					nama : v_nama,
					birth : v_birth,
					telp : v_telp,
					mail : v_mail,
					pass : v_pass
					
				
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
				url : 'memberAdmin.php',
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
