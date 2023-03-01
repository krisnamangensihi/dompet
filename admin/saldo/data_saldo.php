

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Saldo</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
                    <th >NO</th>
                    <th >Label</th>
                <th >NO ID</th>
                <th>NO Rek</th>
                <th >BANK</th>
               
               <th >NO KTP</th>
               <th >Saldo</th>
               
                        
					
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from 
			  is_users ORDER BY id_user DESC");
              while ($data= $sql->fetch_assoc()) {
			 $saldo = format_rupiah($data['saldo']); 
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['label']; ?>
						</td>
						<td>
						
							<?php echo $data['no_id']; ?>
						</td>
						<td>
                        
					<?php echo $data['no_rek']; ?>
						</td>
						<td>
                        <?php echo $data['bank']; ?>
						</td>
						<td>
                        <?php echo $data['ktp']; ?>
						</td>
						<td>
                      	<?php echo $saldo; ?>
						</td>
						
							
					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->