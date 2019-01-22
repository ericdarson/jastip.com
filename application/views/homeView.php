<!DOCTYPE html>
<html>
<head>
<?php 
  echo $css;
?>
  <title>Titipin Aja</title>
   <meta charset="utf-8">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>

  <?php
    echo $nav_menu;
  ?>
	</br></br><h1 style="text-align : center;">Jastip.Com</h1>
   <div style="width:80%; margin:auto;" id="myCarouselCustom" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
   <li data-target="#myCarouselCustom" data-slide-to="0" class="active"></li>
   <li data-target="#myCarouselCustom" data-slide-to="1"></li>
   <li data-target="#myCarouselCustom" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
   <?php
   foreach ($querySlider->result() as $row):?>
   
   <div class="item <?php echo ($row->id_slider == 1) ? "active" : "";?> ">
    <img style="width: 100%;" src="<?php echo base_url().$row->gambar?>" alt="">
    <div class="carousel-caption">
    <form method="post">
    <input type="hidden" name="keterangan" value="<?php echo $row->keterangan; ?>"/>
    <input type="submit" name="btnEdit" class="ui teal button" formaction ="<?php echo base_url();?>index.php/TitipanHomeController/traveler" value="<?php echo $row->keterangan;?>"/>
     <p></br><?php echo $row->about; ?></p>
    </form>
    </div>
   </div>
   
   <?php endforeach;
   ?>
   
   <!--<div class="item">
    <img src="<?php //echo base_url();?>assets/img/negara/brazil.jpg" alt="">
    <div class="carousel-caption">
     <h3>Third Slide</h3>
     <p>This is the third image slide</p>
    </div>
   </div>-->
  </div>

  <!-- Controls -->
  
 </div>
 <script type="text/javascript">
  // Call carousel manually
  //$('#myCarouselCustom').carousel();
  $('#myCarouselCustom').carousel({
     interval: 5000,
     pause:true,
     wrap:true
  });
  // Go to the previous item
  $("#prevBtn").click(function(){
   $("#myCarouselCustom").carousel("prev");
  });
  // Go to the previous item
  $("#nextBtn").click(function(){
   $("#myCarouselCustom").carousel("next");
  });
 </script>
    <div class="ui huge message grid container center aligned">
      <div class="ui basic buttons">
        <button class="ui button"> 
          <?php echo anchor(base_url().'index.php/TitipanHomeController/show', "Titipan");?>
           </button> 
        <button class="ui button"> 
          <?php echo anchor(base_url().'index.php/TravelHomeController/show', "Travel");?>
           </button> 
      </div>
  </div>

  <?php
      echo $footer;
  ?>
</body>
</html>

