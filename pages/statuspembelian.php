<div class="ui main container">

<?php
echo $css;
echo $nav_menu;
echo $style;
//echo var_dump($result->result());
?>
<body>
<?php if($result=='kosong') echo "<h1>Maaf Kamu Belum Nitip Barang Apa-Apa :(</h1>";
		else{ 
		echo "<div class=\"ui stacked segment\">
				<center><h1>Data Status Pemesanan</h1></center></br>
				
				<table class='table table-striped table-bordered display padding' width='100%' cellpadding=\"10\" border=\"1\">
					<thead>
						<tr>
							<th>No</th>
							<th>Deskripsi Barang</th>
							<th>Penjual</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>";
							$i=1;
							foreach ($result->result() as $row):
							echo "<tr>";
							echo '<form class="form-horizontal" role="form" method="post">
									<input type="hidden" name="id_checkout" value="'.$row->id_checkout.'">';
							echo "<td align ='center' width='5%'>" . $i++. "</td>";
							echo "<td align ='center' width='30%'></br>" .$row->name_products.'</br></br>Qty : '.$row->qty_beli.
							'</br></br>Price : Rp '.$row->price.'</td>';
							echo "<td align ='center' width='25%'></br>" . $row->nama_lengkap."</td>";
							echo "<td align ='center' width='20%'></br>".'Rp '. $row->price_beli. "</td>";
							if($row->status==1){
								echo '<td align ="center" width="25%"><h3>Barang Belum Di Bayar</h3>
								<input type="submit" name="btnBayar" class="ui teal button" formaction ="'. base_url().'index.php/KonfirmasiController/status_ubah_pembelian" value="Konfirmasi Pembayaran"/></td>';
							}
							else if($row->status==2){
								echo '<td align ="center" width="25%"><h3>Pembayaran Sedang di Cek....</h3></td>';
							}
							else if($row->status==3){
								echo '<td align ="center" width="25%"><h3>Pemesanan Sedang Dikonfirmasi Traveller</h3></td>';
							}
							else if($row->status==4){
								echo '<td align ="center" width="25%"><h3>Barang Sedang Dibelikan Traveler</h3></td>';
							}
							else if($row->status==5){
								echo '<td align ="center" width="25%"><h3>Barang Sedang dikirim oleh Traveler</h3></td>';
							}
							else if($row->status==99){
								echo '<td align ="center" width="25%"><h3>Maaf Traveler Sedang Tidak Bisa Menerima Pesanan Kamu</h3></td>';
							}
							echo '</form>';
							echo "<tr>";
							endforeach;
					echo
					"</tbody>
				</table>
			</div>"; }
		?>
</body>
</div>
<?php
echo $footer;
?>