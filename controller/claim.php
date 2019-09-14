<?php
	include "connect.php";

	echo $_GET['id'];
	$sql = "SELECT * FROM reserved WHERE reservation_id = " . $_GET['id'];
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	if($row['status'] == 'claimed'){
		$sql = "UPDATE reserved SET status='returned' WHERE reserved.reservation_id = " . $_GET['id'];
		$result = mysqli_query($conn, $sql);
		$sql = "SELECT * FROM equipment WHERE unit_id=" . $row['equipment_id'];
		$result = mysqli_query($conn, $sql);
		$row_data = mysqli_fetch_array($result , MYSQLI_ASSOC);
		$count = (int)$row_data['unit_count'];
		$returned_count =  $count + 1;
		$sql = "UPDATE equipment SET unit_count = " . $returned_count . " WHERE equipment.unit_id=" . $row_data['unit_id'];
		$result = mysqli_query($conn, $sql);
	}else if($row['status'] == 'reserved'){
		$sql = "UPDATE reserved SET status='claimed' WHERE reserved.reservation_id = " . $_GET['id'];
		$result = mysqli_query($conn, $sql);
	}

	if($result){
		header("location: ../borrowing.php?open=reservations");
	}