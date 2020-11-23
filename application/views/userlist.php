<tr id="row-<?php echo $row['id']?>">
								<td><?php echo $row['id']?></td>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['email']?></td>
								
								
								<td class="model"><?php echo $row['created_at']?></td>
								<td><a href="javascript:void(0);" onclick="showEditForm(<?php echo $row['id']?>);" class="btn btn-primary">EDIT</a></td>
								<td><a href="javascript:void(0);" class="btn btn-danger" onclick="confirmDelete(<?php echo $row['id']?>);"  >Delete</a></td>

</tr>