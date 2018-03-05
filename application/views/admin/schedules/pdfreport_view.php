 		<div id="outtable">
			<table style="border:1px solid black; border-collapse: collapse;">				
				<thead>
					<tr>
						<th style="width: 7%; border:1px solid black;">#No</th>
						<th style="width: 13%; border:1px solid black;">Origin</th>
						<th style="width: 10%; border:1px solid black;">Destination</th>
						<th style="width: 15%; border:1px solid black;">Vechicle Name</th>
						<th style="width: 10%; border:1px solid black;">Departure Time</th>
						<th style="width: 15%; border:1px solid black;">Duration</th>
						<th style="width: 15%; border:1px solid black;">Local Price</th>
						<th style="width: 15%; border:1px solid black;">Foreign Price</th>
					</tr>
				</thead>
				<tbody id="list-vehicle-row">									
					<?php 
					$i=1;
					foreach ($vschedule_list as $vch) {
					?>
					<tr style="border:1px solid black;" id="row-id-<?php echo $vch['id']; ?>">
						<td style="border:1px solid black;"><?php echo $i; ?></td>
						<td style="border:1px solid black;"><?php echo $vch['origin']; ?></td>
						<td style="border:1px solid black;"><?php echo $vch['destination']; ?></td>
						<td style="border:1px solid black;"><?php echo $vch['vehicle_name']; ?></td>
						<td style="border:1px solid black;"><?php echo $vch['departure_time']; ?></td>
						<td style="border:1px solid black;"><?php echo $vch['travel_duration'];?></td>
						<td style="border:1px solid black;"><?php echo $vch['local_price'];?></td>
						<td style="border:1px solid black;"><?php echo $vch['foreigner_price'];?></td>
					</tr>
						<?php
						$i++;
					}
					?>					
				</tbody>
			</table>
		</div>