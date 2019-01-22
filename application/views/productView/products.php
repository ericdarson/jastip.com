<div class="ui main container" style="margin-top: 7em;padding-top: 0rem;">
<div class="ui stackable grid container">
    <div class="row">
    <div class="ten wide column except">
    <small><?=anchor('', 'Home')?> > <?php echo anchor('c/'.$slug_category, $name_category);?> > <?php echo $name_products;?></small>
    <?php
    echo $this->session->flashdata("result");
    echo heading($name_products, 2);
    ?>
      <table width="100%">
        <tr>
          <td width="20%">Nama Produk</td>
          <td><?php echo ": ".$name_products;?></td>
        </tr>
        <tr>
          <td width="10%">Stok</td>
          <td>: <?php
          if ($qty_products === '' OR $qty_products === '0'):
            echo '<mark>Stok Habis</mark>';
          else:
            echo $qty_products;
          endif;
          ?></td>
        </tr>
        <tr>
          <td width="10%">Harga</td>
          <td><?php echo ": ".$this->lib->format_rupiah($price);?></td>
        </tr>
        <tr>
          <td width="10%">Penjual</td>
          <td><?php echo ": ".$nama_lengkap;?></td>
        </tr>
        <tr>
          <td colspan="2"><?php echo heading('Deskripsi', 3).$description_products;?></td>
        </tr>
      </table>
    <?php
    if ($qty_products === '' OR $qty_products ==='0'):
      echo "";
    else:
      echo form_open($this->uri->uri_string.'/order');
      $id = array(
        'type' => 'hidden',
        'name' => '_id',
        'style' => 'display:none;',
        'value' => $id_products
      );
      echo form_input($id);

      $url = array(
        'type' => 'hidden',
        'name' => '_url',
        'style' => 'display:none;',
        'value' => $this->uri->uri_string
      );
      echo form_input($url);

      $seller = array(
        'type' => 'hidden',
        'name' => '_seller',
        'style' => 'display:none;',
        'value' => $id_seller
      );
      echo form_input($seller);

      $prc = array(
        'type' => 'hidden',
        'name' => '_price',
        'style' => 'display:none;',
        'value' => $price
      );
      echo form_input($prc);

      echo "Beli : ";
      echo "<select name=\"_qty\" class=\"ui dropdown\">";
      for ($i = 1; $i <= $qty_products; $i++) {
        echo "<option value=\"$i\">$i</option>";
      }
      echo "</select>";
      echo " dari ".$qty_products." stok barang ";
      $submit = array(
        'type'  => 'submit',
        'name'  => '_beli',
        'value' => 'Beli',
        'class' => 'ui teal submit button'
      );
      echo form_submit($submit);
      echo form_close();
    endif;

    echo Modules::run('cart/_count_cart_user');

  ?>
    </div>
    <div class="four wide column except">
      <div class="image"><?php
        $image_properties = array(
          'src' => $image_products,
          'width' => 400
        );
        echo img($image_properties); ?>
      </div>
    </div>
    
  </div>
  </div>

</div>