<div style='background:red;'>
<?=$errors?>
</div>
<?php echo form_open(base_url().'penjualan_masuks/inputpenjualan_a'); ?>
<div class="">
<table class="table">
	<tr>
    	<!--<td>
			<span class="form-control" style="width:50px;"><span class="glyphicon glyphicon-asterisk"></span></span>
		</td>-->
    </tr>
    <tr>
        <td colspan="3"><center><?php
$data_form=array(
	'placeholder'=>'ID Penjualan',
	'name'=>'id_Penjualan',
	'style'=>'border:1px solid pink;',
	'id'=>'id_Penjualan',
	'value'=>set_value('id_Penjualan'),
	'class'=>'form-control'
);
echo form_input($data_form);
?></center></td>
    </tr>
    <tr>
        <td colspan="3"><center><?php echo form_submit('','CHECK','class="btn btn-primary btn-lg btn-block"'); ?>
<?php echo form_close(); ?><center></td>
    </tr>
</table>
</form>
