<table class="table">
<?php echo form_open(base_url().'penjualan_masuks/datapenjualan'); ?>
	<tr>
    	<td colspan="3"><center>Tanggal Awal<input type="date" name="tgl-awal" value="<?=set_value('tgl-awal')?>" style="border:1px solid pink" /></center></td>
    	<td colspan="3"><center>Tanggal Akhir<input type="date" name="tgl-akhir" value="<?=set_value('tgl-akhir')?>" style="border:1px solid pink" /></center></td>
    	<td colspan="3"><center><?php echo form_submit('','CARI','class="btn btn-primary btn-lg btn-block"'); ?>
    </tr>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<tr>
    	<th><center>No.</center></th>
        <th><center>ID PENJUALAN MASUK</center></th>
        <th><center>ID PENJUALAN</center></th>
        <th><center>Tanggal Masuk</center></th>
        <th><center>Nominal</center></th>
        <th><center>Option</center></th>
    </tr>
<?php
	$i = 1;
?>    
    <?php
	foreach($penjualan as $data){ //$penjualan dari dalam controller pada fungsi datapenjualan
		echo "<tr>
			<td>" . $i . "</td> 
			<td>" . $data['id_Penjualan_Masuk'] . "</td>
			<td>" . $data['id_Penjualan'] . "</td>
			<td>" . date("d-M-Y",strtotime($data['Tanggal_Penjualan_Masuk'])) . "</td>
			<td>Rp. " . number_format($data['Nominal'],0,'.','.') . ",00</td>
			<td><a href=" . base_url() . "penjualan_masuks/editpenjualan/" . $data['id_Penjualan_Masuk'] . ">Edit</a> |
				<a href=" . base_url() . "penjualan_masuks/hapuspenjualan/" . $data['id_Penjualan_Masuk'] . ">Hapus</a></td>
			</tr>";
			$i++;
	}
	?>
	<?php echo form_close(); ?><center></td>
</table>