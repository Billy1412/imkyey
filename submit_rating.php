<?php
session_start();
$connect = new PDO("mysql:host=localhost;dbname=project", "root", "");
if(isset($_POST["rating_data"]))
{

	$data = array(
		':t_id'				=>	$_POST["t_id"],
		':user_rating'		=>	$_POST["rating_data"],
		':user_review'		=>	$_POST["user_review"],
		':date' 			=> 	date("Y-m-d",time()),
	);

	$query = "
	INSERT INTO review
	(`id_review`, `user_rating`, `detail`, `id_transaksi`, `tanggal_review`) VALUES (NULL, :user_rating, :user_review, :t_id,:date)
	";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	echo "Your Review & Rating Successfully Submitted";

}

if(isset($_POST["action"])){
	$tipe = $_POST["tipe_kamar"];
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "SELECT nama, r.detail, r.user_rating, tanggal_review FROM review r LEFT JOIN transaksi t ON r.id_transaksi = t.id_transaksi LEFT JOIN member m on t.id_member = m.id_member LEFT JOIN detail_transaksi d ON r.id_transaksi = d.id_transaksi WHERE id_room = '".$tipe."';";

	$result = $connect->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row){
		$review_content[] = array(
			'user_name'		=>	$row["nama"],
			'user_review'	=>	$row["detail"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	$row["tanggal_review"]
		);

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}

?>