<?php
require "connect.php";

if(isset($_POST['showgambar1'])){
	$id1 = $_POST['id1'];
	$sql = "SELECT * FROM room WHERE id_room = '$id1'";

	$result = mysqli_query($con,$sql);

	while($row=mysqli_fetch_array($result)){
		echo "<div>
					<img src = '$row[5]'>
				</div>

				<div class = 'col-md-12'>
					<table class = 'table text-center'>
						<tr>
							<th style = 'text-align: left'>Room Type</th>
							<td class = 'text-center'>$row[1]</td>
						</tr>
						<tr>
							<th style = 'text-align: left'>Price</th>
							<td class = 'text-center'>Rp. $row[2] / night</td>

						</tr>
						<tr>
							<th style = 'text-align: left'>Room Size</th>
							<td class = 'text-center'>$row[4] m<sup>2</td>

						</tr>
						<tr>
							<th style = 'text-align: left'>Description</th>
							<td class = 'text-center'>$row[6]</td>
						</tr>
						<tr>
							<th style = 'text-align: left'>Features</th>
							<td class = 'text-center' id = 'features1'>
								
							<ul>";
	}
	

	$sql2 = "SELECT * FROM features WHERE id_room='$id1'";
	$result2 = mysqli_query($con,$sql2);

	while($row=mysqli_fetch_array($result2))
	{
		echo "<li>$row[2]</li>";

	}
	echo "</ul>
			</td>
						</tr>


					</table>
				</div>";
	

	exit();

}
if(isset($_POST['showgambar2'])){
	$id2 = $_POST['id2'];
	$sql = "SELECT * FROM room WHERE id_room = '$id2'";
	$result = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($result)){
		echo "<div>
					<img src = '$row[5]'>
				</div>

				<div class = 'col-md-12'>
					<table class = 'table text-center'>
						<tr>
							<th style = 'text-align: left'>Room Type</th>
							<td class = 'text-center'>$row[1]</td>
						</tr>
						<tr>
							<th style = 'text-align: left'>Price</th>
							<td class = 'text-center'>Rp. $row[2] / night</td>

						</tr>
						<tr>
							<th style = 'text-align: left'>Room Size</th>
							<td class = 'text-center'>$row[4] m<sup>2</td>

						</tr>
						<tr>
							<th style = 'text-align: left'>Description</th>
							<td class = 'text-center'>$row[6]</td>
						</tr>
						<tr>
							<th style = 'text-align: left'>Features</th>
							<td class = 'text-center' id = 'features1'>
						<ul>";
	}
	$sql2 = "SELECT * FROM features WHERE id_room='$id2'";
	$result2 = mysqli_query($con,$sql2);

	while($row=mysqli_fetch_array($result2))
	{
		echo "<li>$row[2]</li>";

	}
	echo "</ul>
			</td>
						</tr>


					</table>
				</div>";
	

	exit();
	
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src = "jquery-3.6.1.js" type= "text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.2.0/css/bootstrap.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    
    <!-- buat date picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <title>Compare Meeting Rooms</title>
</head>
<style>
     body{
        box-sizing : border-box;
        overflow-x: hidden;
        width: 100%;
        height : 100%;
        margin : 0;
        padding : 0;
        background-color:#f7f8fa;


    }

    #judulCompare{
      text-align : center;
      color: white;
      font-weight : bold;
      font-size : 1.5rem;
    }

    #room::before{
      content: "";
      border-top: 1px solid #404041;
    }
    

a:link { 
  text-decoration: none; 
  color : black;
}


a:visited { 
  text-decoration: none;
  color : black;
}


a:hover { 
  text-decoration: none;
  color : black;
}


a:active { 
  text-decoration: none; 
  color : black;
}
#compare1 img{
			width: 440px;
			height: 250px;
		}
#compare2 img{
	width: 440px;
	height: 250px;
}
td {
	margin-left: 60px;
}
.socmed{
  margin-right :2%;
}

.socmed:hover{
  color : white;
}
</style>
<body>
<?php
    include('header.php');
?>
<body>
	<div class="container">
	<p id ="judulCompare" style = "background-color :rgb(143, 124, 112); height : 3rem; text-align: center; margin-bottom: 1rem;  margin-top: 1rem; padding-top: 0.2rem;" >Compare Meeting Room</p>
	<div class = "container">
		<div class = "row">
			<div class = "col-5 text-center">
				<select class = "form-control" id = "select1">
					<option value = "0" class = "text-center">-- Select Room To Compare --</option>

					<option value= "R004" class = "text-center">Rafflesia</option>

					<option value= "R005" class = "text-center">Fussia</option>

					<option value= "R006" class = "text-center">Cruss</option>
				</select>

				<!-- Untuk tempat hasil compare 1 -->
				<div id = "compare1" class = "text-center" style="margin-top: 2rem;">
				
				</div>
			</div>

			

			<div class = "col-2 text-center" style = " margin-top: -0.5rem;"> <h1>VS</h1> </div>

			<div class = "col-5">
				<select class = "form-control" id = "select2">
					<option value = "0" class = "text-center">-- Select Room To Compare --</option>

					<option value= "R004" class = "text-center">Rafflesia</option>

					<option value= "R005" class = "text-center">Fussia</option>

					<option value= "R006" class = "text-center">Cruss</option>
				</select>

				<!-- Untuk tempat hasil compare 2 -->
				<div id = "compare2" class = "text-center" style="margin-top: 2rem;">
				
				</div>
			</div>
		</div>
	</div>
	</div>
	<script>
		$(document).ready(function(){
			$('#select1').change(function(){
				v_id1 = $("#select1").val();
				$.ajax({
					url : "compareMeetingRooms.php",
					type : "POST",
					async : true,
					data : {
						showgambar1 : 1,
						id1 : v_id1
					},
				success : function(result){
					$("#compare1").html(result);
				
				}
				})
			})

			$('#select2').change(function(){
				v_id2 = $("#select2").val();
				$.ajax({
					url : "compareMeetingRooms.php",
					type : "POST",
					async : true,
					data : {
						showgambar2 : 1,
						id2 : v_id2
					},
				success : function(result){
					$("#compare2").html(result);
					
				}
				})
			})


			
		});

		
	</script>

</body>
</html>