<?php

	echo $css;
	

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
$kondisi = array(
    'new'	=> 'Baru',
    'sec'	=> 'Bekas',
);
$berat = array(
	'type' => 'text',
	'name' => 'berat',
	'autocomplete' => 'off'
);
$stok = array(
	'type' => 'text',
	'name' => 'stok',
	'autocomplete' => 'off'
);
$harga = array(
	'type' => 'text',
	'name' => 'harga',
	'autocomplete' => 'off'
);
$image = array(
	'type' => 'file',
	'name' => 'userfile'
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

echo form_open('/products/anyar/add', $attributes);
?>
	<div class="ui stacked segment">
    	<div class="ui error message"></div>
    	<div class="field">
	    	<label>Nama Barang</label>
			<?php
			//echo form_error('name_products');
			echo form_input($name_products);
			?>
		</div>
		<div class="fields">
			<div class="six wide column field">
				<label>Kategori</label>
				<?php
				//echo form_error('category');
				// echo form_dropdown('category', $kategory, '', 'class="ui fluid dropdown"');
				?>
			</div>
			<div class="six wide column field">
				<label>Kondisi</label>
				<?php
				//echo form_error('kondisi');
				echo form_dropdown('kondisi', $kondisi, 'new', 'class="ui fluid dropdown"');
				?>
			</div>
		</div>
		<div class="fields">
			<div class="four wide column field">
		    	<label>Perkiraan Berat (gram)</label>
				<?php
				//echo form_error('berat');
				echo form_input($berat);
				?>
			</div>
			<div class="two wide column field">
		    	<label>Stok</label>
				<?php
				//echo form_error('stok');
				echo form_input($stok);
				?>
			</div>
			<div class="eight wide column field">
		    	<label>Harga</label>
				<?php
				//echo form_error('harga');
				echo form_input($harga);
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
		    <p>Gambar akan mencerminkan barang yang Anda jual. Semakin bagus akan menarik minat konsumen.</p>
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
	    	<label>Jasa Pengiriman</label>
			<?php
			$kurir = array(
			''	=> 'Pilih...', 
			'jne'	=> 'JNE',
			'tiki'	=> 'TIKI',
			'pos'	=> 'POS'
			);

			echo form_dropdown('kurir', $kurir, '', 'class="ui fluid dropdown"');
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