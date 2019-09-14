<?php

	include "connect.php";

	echo $_GET['reserve_id'];
	session_start();
	$sql = "INSERT INTO reserved(student_id, equipment_id, status) VALUES('" . $_SESSION['row']['id_number'] . "'," . $_GET['reserve_id'] . ", 'reserved')";
	$result = mysqli_query($conn,$sql);
	$units = (int)$_SESSION['equipments']['unit_count'];
	$unit_count = $units - 1;
	$sql = "UPDATE equipment SET unit_count=" . $unit_count . " WHERE equipment.unit_id = " . $_GET['reserve_id'];
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "SUCCESS!!";
	}
?>