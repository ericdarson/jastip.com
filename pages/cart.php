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
		<?php
			echo $side_bar;
			
		?>
			<div class="ui stacked segment">
				<center><h1>Keranjang Belanja</h1></center></br>
				
				<table class='table table-striped table-bordered display padding' width='100%' cellpadding="10" border="1">
					<thead>
						<tr>
							<th>No</th>
							<th>Deskripsi Barang</th>
							<th>Penjual</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$i=1;
							foreach ($query->result() as $row):
							echo "<tr>";
							echo '<form class="form-horizontal" role="form" action="index.php/Seemovie/index" method="post">
									<input type="hidden" name="cart_id" value="'.$row->id_cart.'">';
							echo "<td width='5%'>" . $i++. "</td>";
							echo "<td width='30%'></br>" .$row->name_products.'</br></br>Qty : '.$row->num_qty.
							'</br></br>Price : Rp '.$row->price.'</td>';
							echo "<td width='25%'>" . $row->nama_lengkap."</td>";
							echo "<td width='20%'>".'Rp '. $row->num_price. "</td>";
							echo '<td width="25%"><input type="submit" name="btnDelete" class="ui red button" value="Hapus" formaction ="'. base_url().'index.php/CartController/delete"/>';
							echo '<input type="submit" name="btnEdit" class="ui teal button" formaction ="'. base_url().'index.php/BayarController/index" value="Bayar"/></td>';
							echo '</form>';
							echo "<tr>";
							endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	 
</div>
</body>
<?php
      echo $footer;
?>
</html>