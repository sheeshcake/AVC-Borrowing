<?php
	$sql = "SELECT * FROM reserved WHERE student_id='" . $_SESSION['row']['id_number'] . "'";
	$result = mysqli_query($conn, $sql);
	$_SESSION['transactions'] = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<table>
	<tr>
		<td>ID</td>
		<td>Equipment Name</td>
		<td>Equipment Brand</td>
		<td>Status</td>
	</tr>
	<?php
		$sql = "SELECT * FROM equipment WHERE unit_id=" . $_SESSION['transactions']['equipment_id'];
		$result1 = mysqli_query($conn, $sql);
		$out = mysqli_fetch_array($result1,MYSQLI_ASSOC);
		for($i = 0; $i < sizeof($_SESSION['transactions']); $i++){
			echo "<tr>";
			echo "<td>" . $_SESSION['transactions']['reservation_id'] . "</td>";
			echo "<td>" . $out['unit_name'] . "</td>";
			echo "<td>" . $out['unit_brand'] . "</td>";
			echo "<td>" . $_SESSION['transactions']['status'] . "</td>";
			echo "</tr>";
		}
	?>
</table>