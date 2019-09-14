<?php
	$sql = "SELECT * FROM reserved";
	$result = mysqli_query($conn,$sql);
	$_SESSION['reserved-items'] = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<form action="controller/claim.php" method="get">
	<table>
		<tr>
			<th>ID</th>
			<th>Item Name</th>
			<th>Item Brand</th>
			<th>Student ID</th>
			<th>Status</th>
			<th>Actions</th>
		</tr>

		<?php
			$sql = "SELECT * FROM reserved INNER JOIN equipment ON reserved.equipment_id = equipment.unit_id";
			$reserved_data = mysqli_query($conn, $sql);
	 		while($data = $reserved_data->fetch_assoc()){
	 			echo "<tr>";
	 			echo "<td>" . $_SESSION['reserved-items']['reservation_id'] . "</td>";
				echo "<td>" . $data['unit_name'] . "</td>";
				echo "<td>" . $data['unit_brand'] . "</td>";
				echo "<td>" . $data['student_id'] . "</td>";
	 			echo "<td>" . $data['status'] . "</td>";
	 			if($data['status'] == 'claimed'){
	 				echo "<td><button name='id' value='" . $data['reservation_id'] . "'>Return</button></td>";
	 			}
	 			else if($data['status'] == 'reserved'){
	 				echo "<td><button name='id' value='" . $data['reservation_id'] . "'>Claim</button></td>";
	 			}
	 			else if($data['status'] == 'returned'){
	 				echo "<td><p>Returned</button></p>";
	 			}
	 			echo "</tr>";
	 		}	
		?>
	</table>
</form>


