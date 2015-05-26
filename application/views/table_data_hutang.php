<table class="table">
<?php echo form_open(base_url().'keuangans/datahutang'); ?>
	<tr>
    	<td colspan="3"><center>Tanggal Awal<input type="date" name="tgl-awal" value="<?=set_value('tgl-awal')?>" style="border:1px solid pink" /></center></td>
    	<td colspan="3"><center>Tanggal Akhir<input type="date" name="tgl-akhir" value="<?=set_value('tgl-akhir')?>" style="border:1px solid pink" /></center></td>
    	<td colspan="3"><center><?php echo form_submit('','CARI','class="btn btn-primary btn-lg btn-block"'); ?>
    </tr>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<tr>
    	<th><center>No.</center></th>
        <th><center>ID Hutang</center></th>
        <th><center>Tanggal Masuk</center></th>
        <th><center>Nominal</center></th>
        <th><center>Keterangan</center></th>
        <th><center>Option</center></th>
    </tr>
<?php
	$i = 1;
?>    
    <?php
	foreach($keuangan as $data){
		echo "<tr>
			<td>" . $i . "</td> 
			<td>" . $data['id_Hutang'] . "</td>
			<td>" . date("d-M-Y",strtotime($data['Tanggal'])) . "</td>
			<td>Rp. " . number_format($data['Nominal'],0,'.','.') . ",00</td>
			<td>" . $data['Keterangan'] . "</td>
			<td><a href=" . base_url() . "keuangans/edithutang/" . $data['id_Hutang'] . ">Edit</a> |
				<a href=" . base_url() . "keuangans/hapushutang/" . $data['id_Hutang'] . ">Hapus</a></td>
			</tr>";
			$i++;
	}
	?>
	<?php echo form_close(); ?><center></td>
</table>