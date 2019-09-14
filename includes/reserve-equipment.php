<form action="controller/reserve.php" method="get">
	<table>
		<tr>
			<th>ID</th>
			<th>Equipment Name</th>
			<th>Equipment Brand</th>
			<th>Equipment Count</th>
			<th>Actions</th>
		</tr>
		<?php
			$sql = "SELECT * FROM equipment";
			$result = mysqli_query($conn,$sql);
			while($data = $result->fetch_assoc()){
				echo "<tr>";
				echo "<td>" . $data['unit_id'] . "</td>";
				echo "<td>" . $data['unit_name'] . "</td>";
				echo "<td>" . $data['unit_brand'] . "</td>";
				echo "<td>" . $data['unit_count'] . "</td>";
				echo "<td><button name='reserve_id' value='" . $data['unit_id'] . "'>Reserve</button></td>";
				echo "</tr>";
			}
		?>
	</table>
</form>
