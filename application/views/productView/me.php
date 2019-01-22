<div class="twelve wide column except">
	<h1 class="ui dividing header"><?=$title?></h1>
	<table class="ui celled structured table">
		<thead>
			<tr>
				<th rowspan="2" class="center aligned">No</th>
				<th rowspan="2">Nama Barang</th>
				<th colspan="5" class="center aligned">Detail</th>
			</tr>
			<tr>
				<th>Deskripsi</th>
				<th>Qty</th>
				<th>Harga</th>
				<th>Kondisi</th>
				<th>&nbsp;</th>
			</tr>	
		</thead>
		<tbody>
		<?php
		if (count($query->result() > 0)) {
			$no = 1;
			foreach ($query->result() as $item):
		?>
		<tr>
			<td class="center aligned"><?php echo $no; ?></td>
			<td><a href="<?php echo $item->id_products; ?>"><?php echo $item->name_products; ?></a></td>
			<td><?php echo substr($item->description, 0, 80); ?> ...</td>
			<td class="center aligned"><?php echo $item->qty; ?></td>
			<td class="right aligned"><?php echo $this->lib->format_rupiah($item->price); ?></td>
			<td class="center aligned"><b><?php echo strtoupper($item->kondisi); ?></b></td>
			<td>
				<div class="ui icon buttons">
				  <a href="" class="positive ui button"><i class="edit icon"></i></a>
				  <a href="" class="negative ui positive button"><i class="remove circle icon"></i></a>
				</div>
			</td>
		</tr>
		<?php
		$no++;
			endforeach;
		}else{
			echo "Tidak ada barang";
		}
		?>
		</tbody>
	</table>
</div>
      </div>
    </div>
  </div>