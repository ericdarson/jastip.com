<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<div class="ui fixed stackable menu">
  <div href="#" class="header item">
    <?php //echo img('assets/img/web/logo.png', TRUE, 'class="logo"'); ?>
    JasTip.com&nbsp;&nbsp;<a href="<?php echo base_url();?>index.php/HomeController/index"class="ui teal tag label">&nbsp;&nbsp;Titip aja</a>
  </div>
  <div class="right menu">
    <?php
    if ($sessid == ""):?>
      <div class="item">
        <div class="ui buttons">
          <a href="<?php echo base_url();?>index.php/Login/index" class="ui positive button">Login</a>
        <div class="or"></div>
          <a href="<?php echo base_url();?>index.php/register/index" class="ui button active">Register</a>
        </div>
      </div>
    <?php
    else:
    ?>
      <div class="ui inline dropdown item" tabindex="0">
        <div class="text">
          <?php //echo img('assets/img/web/stevie.jpg', TRUE, 'class="ui avatar image"'); ?>
          JasTip.com
        </div>
        <i class="dropdown icon"></i>
        <div class="menu" tabindex="-1">
          <div class="ui divider"></div>
          <div class="item">
            <?php echo $username?></br>
			<h5><i class="material-icons" style="font-size:14px; margin-top:5px;">account_balance_wallet</i> <?php echo " Rp. ".$dana;?></h5>
		  </div>
          <div class="ui divider"></div>
          <div class="item"><?php echo anchor(base_url().'index.php/TravelerController/index', 'Post Berangkat');?></div>
          <div class="item"><?php echo anchor(base_url().'index.php/TravelEtalaseController/index', 'Etalase');?></div>
          <div class="item"><?php echo anchor(base_url().'index.php/TravelerOrderController/index', 'Order');?></div>
          <div class="item"><?php echo anchor(base_url().'index.php/PostBarangTitipanController/index', 'Titip Barang');?></div>
          <div class="item"><?php echo anchor(base_url().'index.php/CartController/index', 'Keranjang Titipan');?></div>
          <div class="item"><?php echo anchor(base_url().'index.php/StatusPembelianController/index', 'Status Barang Titipan');?></div>
          <div class="item"><?php echo anchor(base_url().'index.php/Login/logout', 'Logout');?></div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

</html>