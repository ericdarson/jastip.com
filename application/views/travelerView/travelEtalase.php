<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		//echo $script;
		echo $nav_menu;
		echo $css;
		echo $style;
		
	?>
</head>
<body>
	 <div class="ui main container center aligned header">
	 <div class="ui stacked segment" style="margin-bottom: 50px">
		<div class="col-md-12">
		</div>
			<div class="ui stacked segment">
				<center><h1>Etalase</h1></center></br>
				
				<table class='table table-striped table-bordered display padding' width='100%' cellpadding="10" border="1">
					<thead>
						<tr>
							<th>No</th>
							<th>Deskripsi Barang</th>
							<th>Tujuan</th>
							<th>Tanggal Pulang</th>
							<th>Harga</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$i=1;
							foreach ($query->result() as $row):
							if($row->id_category == 3){
								echo "<tr>";
								echo '<form class="form-horizontal" role="form" action="index.php/Seemovie/index" method="post">
										<input type="hidden" name="id_products" value="'.$row->id_products.'">';
								echo "<td width='5%'>" . $i++. "</td>";
								echo "<td width='35%'></br>" .$row->name_products.'</br></br>Qty : '.$row->qty.'</td>';
								echo "<td width='15%'>" . $row->tujuan."</td>";
								echo "<td width='15%'>" . $row->tgl_pulang."</td>";
								echo "<td width='15%'>".'Rp '. $row->price. "</td>";
								echo '<td width="15%"><input type="submit" name="btnDelete" class="ui red button" value="Hapus" formaction ="'. base_url().'index.php/TravelEtalaseController/delete"/>';
								//echo '<input type="submit" name="btnEdit" class="ui teal button" formaction ="'. base_url().'index.php/BayarController/index" value="Bayar"/></td>';
								echo '</form>';
								echo "<tr>";
							}
							endforeach;
						?>
					</tbody>
				</table>
			</div>
		
	</div>
	 
</div>
</body>
<?php
      echo $footer;
?>
</html>