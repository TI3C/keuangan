<table class="table">
<?php echo form_open(base_url().'pembiayaan_gajis/datagaji'); ?>
	<tr>
    	<td colspan="3"><center>Periode Awal<input type="" name="awal" value="<?=set_value('awal')?>" style="border:1px solid pink" /></center></td>
    	<td colspan="3"><center>Periode Akhir<input type="" name="akhir" value="<?=set_value('akhir')?>" style="border:1px solid pink" /></center></td>
    	<td colspan="3"><center><?php echo form_submit('','CARI','class="btn btn-primary btn-lg btn-block"'); ?>
    </tr>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<tr>
    	<th><center>No.</center></th>
        <th><center>ID Gaji</center></th>
        <th><center>ID Pegawai</center></th>
        <th><center>Periode</center></th>
        <th><center>Tanggal</center></th>
        <th><center>Nominal</center></th>
        <th><center>Option</center></th>
    </tr>
<?php
	$i = 1;
?>    
    <?php
	foreach($pembiayaan_gaji as $data){
		echo "<tr>
			<td>" . $i . "</td> 
			<td>" . $data['id_Gaji'] . "</td>
			<td>" . $data['id_Pegawai'] . "</td>
			<td>" . $data['Periode'] . "</td>
			<td>" . date("d-M-Y",strtotime($data['Tanggal'])) . "</td>
			<td>Rp. " . number_format($data['Nominal'],0,'.','.') . ",00</td>
			<td><a href=" . base_url() . "pembiayaan_gajis/editgaji/" . $data['id_Gaji'] . ">Edit</a> |
				<a href=" . base_url() . "pembiayaan_gajis/hapusgaji/" . $data['id_Gaji'] . ">Hapus</a></td>
			</tr>";
			$i++;
	}
	?>
	<?php echo form_close(); ?><center></td>
</table>