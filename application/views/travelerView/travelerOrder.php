<div class="ui main container">

<?php
echo $css;
echo $nav_menu;
echo $style;
//echo var_dump($result->result());
?>
<body>
<?php if($result=='kosong') echo "<h1>Maaf Belum Ada yang Menitip :(</h1>";
		else{ 
		echo "<div class=\"ui stacked segment\">
				<center><h1>Data Status Order</h1></center></br>
				
				<table class='table table-striped table-bordered display padding' width='100%' cellpadding=\"10\" border=\"1\">
					<thead>
						<tr>
							<th>No</th>
							<th>Deskripsi Barang</th>
							<th>Informasi Pembeli</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>";
							$i=1;
							foreach ($result->result() as $row):
							if($row->status == 8 || $row->status == 9 || $row->status == 11 ||  $row->status == 2) {
							}
							else {
								echo "<tr>";
								echo '<form class="form-horizontal" role="form" method="post">
										<input type="hidden" name="id_checkout" value="'.$row->id_checkout.'">';
								echo "<td align ='center' width='5%'>" . $i++. "</td>";
								echo "<td align ='center' width='30%'></br>" .$row->name_products.'</br></br>Qty : '.$row->qty_beli.
								'</br></br>Price : Rp '.$row->price.'</td>';
								echo "<td align ='center' width='25%'>" . $row->nama_penerima."</br> Alamat :".
								$row->alamat_penerima."</br> Provinsi: ".
								$row->province."</br> Kota : ".
								$row->city."</br> No Telepon : ".
								$row->telepon."</td>";
								echo "<td align ='center' width='20%'>".'Rp '. $row->price_beli. "</td>";
								if($row->status==3){
									echo '<td align ="center" width="25%"><h3>Terima Orderan atau Tidak</h3>
									<input type="hidden" name="id_products" value="'.$row->id_products.'">
									<input type="hidden" name="qty_beli" value="'.$row->qty_beli.'">
									<input type="submit" name="btnTerima" class="ui teal button" formaction ="'. base_url().'index.php/KonfirmasiController/status_terima_orderan" value="Terima"/>
									<input type="submit" name="btnTolak" class="ui teal button" formaction ="'. base_url().'index.php/KonfirmasiController/status_tolak_orderan" value="Tolak"/>
									</td>';
								}
								else if($row->status==4){
									echo '<td align ="center" width="25%"><h3>Apakah Barang sudah dikirim?</h3>
									<input type="submit" name="btnKirim" class="ui teal button" formaction ="'. base_url().'index.php/KonfirmasiController/status_kirim_barang" value="Sudah"/>
									</td>'
									;
								}
								else if($row->status==5){
									echo '<td align ="center" width="25%"><h3>Menunggu Barang diterima Pembeli</h3></td>';
								}
								else if($row->status==6){
									echo '<td align ="center" width="25%"><h3>Barang telah diterima, silahkan ambil uang</h3>
									<input type="submit" name="btnKirim" class="ui teal button" formaction ="'. base_url().'index.php/KonfirmasiController/status_ubah_pembelian8" value="Sudah Terima Uang"/>
									</td>';
								}
								else if($row->status==7){
									echo '<td align ="center" width="25%"><h3>Barang telah diterima, silahkan ambil uang</h3>
									<input type="submit" name="btnKirim" class="ui teal button" formaction ="'. base_url().'index.php/KonfirmasiController/delete_permanen_traveler" value="Sudah Terima Uang"/></td>';
								}
								else if($row->status==99){
									echo '<td align ="center" width="25%"><h3>Barang telah ditolak</h3>
									<input type="submit" name="btnKirim" class="ui teal button" formaction ="'. base_url().'index.php/KonfirmasiController/status_ubah_pembelian11" value="Hapus"/>
									</td>';
								}
								else if($row->status==10){
									echo '<td align ="center" width="25%"><h3>Barang telah ditolak</h3>
									<input type="submit" name="btnKirim" class="ui teal button" formaction ="'. base_url().'index.php/KonfirmasiController/delete_permanen_traveler" value="Hapus"/>
									</td>';
								}
								// else if(){
									
								// }
								echo '</form>';
								echo "<tr>";
							}
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