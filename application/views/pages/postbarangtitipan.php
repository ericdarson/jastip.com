<?php
	echo $css;
	echo $nav_menu;

$name_products = array(
	'type' => 'text',
	'name' => 'name_products',
	'autocomplete' => 'off'
);
// $kategory = array('' => "Pilih...");
// foreach ($category->result_array() as $row)
// {
// 	$kategory[$row['id_category']] = $row['category'];
// }
// $kondisi = array(
//     'new'	=> 'Baru',
//     'sec'	=> 'Bekas',
// );
$tujuan = array(
	'type' => 'text',
	'name' => 'tujuan',
	'autocomplete' => 'off'
);
$jumlah = array(
	'type' => 'text',
	'name' => 'jumlah',
	'autocomplete' => 'off'
);
$harga = array(
	'type' => 'text',
	'name' => 'harga',
	'autocomplete' => 'off'
);
$tgl_terima = array(
	'type' => 'date',
	'name' => 'tgl_terima',
	'autocomplete' => 'off'
);
$image = array(
	'type' => 'file',
	'name' => 'poster'
);
$noHp = array(
	'type' => 'text',
	'name' => 'nomorHp',
	'autocomplete' => 'off'
);
$desk = array(
	'type' => 'text',
	'name' => 'deskripsi',
	'autocomplete' => 'off'
);
$simpan = array(
  'type'  => 'submit',
  'name'  => 'simpan',
  'value' => 'Simpan',
  'class' => 'ui large teal submit button'
);
$attributes = array('class' => 'ui large form');
?>
<div class="twelve wide column except">
	<h1 class="ui dividing header"><?=$title?></h1>
<?php
// echo $this->session->flashdata("notice");

echo form_open_multipart('/PostBarangTitipanController/add', $attributes);
?>
	<div class="ui stacked segment">
    	<div class="ui error message"></div>
    	<div class="field">
	    	<label>Nama Barang</label>
			</br>
			<?php
			//echo form_error('name_products');
			echo form_input($name_products);
			?>
		</div>
		<div class="fields">
			<div class="four wide column field">
		    	<label>Negara Tempat Barang Berada</label>
				</br>
				<?php
				//echo form_error('berat');
				echo form_input($tujuan);
				?>
			</div>
			<div class="two wide column field">
		    	<label>Jumlah</label>
				</br>
				<?php
				//echo form_error('stok');
				echo form_input($jumlah);
				?>
			</div>
			<div class="two wide column field">
		    	<label>Harga + Tips</label>
				</br>
				<?php
				//echo form_error('harga');
				echo form_input($harga);
				?>
			</div>
			<div class="three wide column field">
		    	<label>Tanggal Maksimal Barang di terima</label>
		    	</br>
				<?php
				//echo form_error('stok');
				echo form_input($tgl_terima);
				?>
			</div>
		</div>
		<div class="field">
	    	<label>Gambar</label>
			<?php
			//echo form_error('userfile');
			echo form_input($image);
			?>
			<div class="ui blue left pointing label">Max: 1MB. Ekstensi jpg,jpeg,png</div>
		</div>
		<div class="ui info message">
		  <div class="content">
		    <div class="header">
		      INFO
		    </div>
		    <p>Gambar akan membuat Traveler lebih mudah mencari barang.</p>
		  </div>
		</div>
		<div class="field">
	    	<label>Deskripsi</label>
			<?php
			//echo form_error('deskripsi');
			echo form_textarea($desk);
			?>
		</div>
		<div class="four wide column field">
			<label>Nomor Handphone</label>
			<?php
			//echo form_error('berat');
			echo form_input($noHp);
			?>
		</div>
<?php
echo form_submit($simpan);
	?>
	</div>
<?php
echo form_close();
?>
</div>
      </div>
    </div>
  </div>

 <?php
 	echo $footer;
 ?> 