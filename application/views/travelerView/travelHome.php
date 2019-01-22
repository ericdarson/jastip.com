<?php
  echo $css;
  echo $nav_menu;
?>

<div class="ui vertical segment" style="margin-top: 7em;padding-top: 0rem;">
  <div class="ui main grid container">
    <h3> Traveler </h3>
  </div>
  <div class="ui center aligned stackable grid container">
    <div class="row">
    </br>
      <?php
      // echo heading('Kategori <b>"'.$name_category.'"</b>', 3, 'class="ui dividing header"');
      if(count($query_products->result()) > 0){
        foreach ($query_products->result() as $item):
        if($item->qty > 0  && $item->id_user != $sessid ) {
        $uri = "p/".$slug_category."/".$item->slug;
        $image_properties = array(
          'src'   => $item->image1,
          'alt'   => $item->name_products,
          'title' => $item->name_products,
          'class' => 'products',
          'style' => 'height: 216px;'
        );
        ?>
        <div class="four wide column except">
          <div class="ui card">
            <div class="image" style="height:150px; width:150px; margin-left: auto;
    margin-right: auto;"><img style="height:150px; width:150px; margin-left: auto;
    margin-right: auto;" src="../.<?php echo $image_properties['src'] ?>"></div>
            <div class="content">
              <?php echo anchor($uri, $item->name_products);?>
              <div class="description">
                <?php echo $item->price; ?>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
        <?php endforeach;
      }
      else
      {
        echo "Belum ada barang di kategori ".$name_category."<br />";
      }
      ?>
    </div>
  </div>
</div>

<?php
  echo $footer;
?>  