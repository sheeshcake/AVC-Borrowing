<div class="table-title">
	<h3>Equipment</h3>
</div>
<table class="table-fill">
	<thead>
		<tr>
			<th class="text-left">ID</th>
			<th class="text-left">Name</th>
			<th class="text-left">Brand</th>
			<th class="text-left">Units</th>
		</tr>
	</thead>
	<tbody class="table-hover">
		<?php
			$sql = "SELECT * FROM equipment";
			$result = mysqli_query($conn,$sql);
			while($data = $result->fetch_assoc()){
				echo "<tr>";
				echo "<td>" . $data['unit_id'] . "</td>";
				echo "<td>" . $data['unit_name'] . "</td>";
				echo "<td>" . $data['unit_brand'] . "</td>";
				echo "<td>" . $data['unit_count'] . "</td>";
				echo "</tr>";
			}
		?>
	</tbody>
</table>
  