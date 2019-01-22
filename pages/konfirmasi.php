<div class="ui main container">

<?php
echo $css;
echo $nav_menu;
echo $style;
$attributes = array('class' => 'ui large form');
$conf = array(
  'type'  => 'submit',
  'name'  => 'simpan',
  'value' => 'Konfirmasi Pembayaran',
  'class' => 'ui large teal submit button'
);

echo form_open_multipart(base_url().'index.php/KonfirmasiController/status_ubah', $attributes);
echo form_hidden('no_invoice', $no_invoice);
	
?>

<h1>Silahkan Transfer ke rekening Dibawah ini sebesar Rp <?php echo $price; ?></h1>

<?php echo form_submit($conf); ?>
<a href="<?php echo base_url()."CartController/index"; ?>" class="ui large red button">Batal</a>
</div>
<?php
echo form_close();
echo $footer;
?>