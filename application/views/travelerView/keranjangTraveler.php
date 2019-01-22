<div class="ui main container">
<?php
echo heading('Keranjang Belanja', 2);
echo br();
echo anchor('', 'Home');
echo br();
echo $this->session->flashdata("success_delete");
echo "ada ".$num." barang";
if ($num > 0):
foreach ($query->result() as $row):?>
	<hr>
	Barang-barang dari <b><?php echo $row->nama_lengkap;?></b><br />
	<table width="100%">
		<?php
		echo "<tr>";
		echo "<td width=\"20%\">".$row->name_products."</td>";
		echo "<td width=\"10%\">";

		/*echo form_open('cart/update/'.$row->id_cart);
		echo "<select name=\"_qty\">";
		for ($i = 1; $i <= $row->qty; $i++;) {
			if ($i == $row->num_qty)
			{
				$sel = 'selected="selected"';
			}
			else
			{
				echo "";
			}
			echo "<option value=\"$i\" $sel>$i</option>";
		}
	  	echo "</select> barang";
		echo form_close();
		*/
		echo "</td>";
		echo "<td width=\"15%\">Total kuantitas barang</td>";
		echo "<td>".$row->num_qty."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>".$this->lib->format_rupiah($row->price)."</td>";
		echo "<td></td>";
		echo "<td width=\"15%\">Total harga barang</td>";
		echo "<td>".$this->lib->format_rupiah($row->num_price)."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td colspan=\"2\">".anchor('cart/delete/'.$row->id_cart, 'Hapus', 'class="ui red button"')."</td>";
		echo "<td>".anchor('cart/checkout/form/'.$row->id_cart, 'Bayar', 'class="ui teal button"')."</td>";
		// echo "<td colspan=\"2\"><button data-toggle=\"modal\" data-modal=\"modal1\" id=\"call-modals\" data-cartid=\"".$row->id_cart."\" class=\"ui green button\">Bayar</button></td>";
		echo "</tr>";
		?>
	</table>
<?php
endforeach;
else:
	echo heading('Keranjang Barang kosong.', 5);
endif;
?>
</div>