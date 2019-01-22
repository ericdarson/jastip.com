<html>
<?php
	$nav_menu;
	$css;
	$footer;
?>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php
	if($admin){
		echo '
		<form>
			<input type="submit" name="btnlogout" class="ui teal button" formaction ="'.base_url().'index.php/AdminController/index" value="LogOut"/>
		</form>';
	}
	else{
		echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#myModal').modal({
				 keyboard: false,
				 show: true,
				backdrop: 'static'
				});
				});
		</script>";
	}
?>	
	<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Sign In</h4>
        </div>
        <div class="modal-body">
 			<form id="signin_form" action="<?php echo base_url();?>index.php/AdminController/auth_admin" method="post">
  				  <div class="form-group">
    				<label for="username">Username:</label>
    				<input type="name" class="form-control" id="username" placeholder="Enter Username" name="user">
				  </div>
    			  <div class="form-group">
   				   <label for="pwd">Password:</label>
   				   <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
  				  </div>
  				  <button type="submit" name="sbmt_button" class="ui teal button">Submit</button>
 		 	</form>
        </div>
      </div>
    </div>
  </div>
  
 <body>
	
	<?php if($admin == true){
		echo "<div class=\"ui stacked segment\">
				<center><h1>Data Status Pemesanan - Admin</h1></center>
				</br>
				
				<table class='table table-striped table-bordered display padding' width='100%' cellpadding=\"10\" border=\"1\">
					<thead>
						<tr>
							<th>No</th>
							<th>Rekening Pembeli</th>
							<th>Jumlah Transfer</th>
							<th>Waktu Transfer</th>
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
							echo "<td align ='center' width='30%'></br>" .$row->bank.'</td>';
							echo "<td align ='center' width='25%'></br>".'Rp '. $row->price_beli."</td>";
							echo "<td align ='center' width='20%'></br>". $row->send_date. "</td>";
							echo '<td align ="center" width="25%"><h3>Menunggu konfirmasi Admin</h3>
								<input type="submit" name="btnBayar" class="ui teal button" formaction ="'. base_url().'index.php/AdminController/status_ubah_pembelian_admin" value="Konfirmasi Pembayaran"/></td>';
							echo '</form>';
							echo "<tr>";
							endforeach;
					echo
					"</tbody>
				</table>
			</div>"; }
	?>
 
 </body>
</html>