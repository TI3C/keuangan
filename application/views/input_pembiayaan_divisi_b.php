<div style='background:red;'>
<?=$errors?>
</div>
<?php echo form_open(base_url().'pembiayaan_divisis/inputpembiayaan_b/'.$id_Kepentingan); ?>
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
	'placeholder'=>'DIVISI',
	'name'=>'Divisi',
	'style'=>'border:1px solid pink;',
	'id'=>'DIvisi',
	'value'=>set_value('Divisi'),
	'class'=>'form-control'
);
echo form_input($data_form);
?></center></td>
    </tr>
    <tr>
        <td colspan="3"><center><?php
$data_form=array(
	'placeholder'=>'NOMINAL',
	'name'=>'Nominal',
	'style'=>'border:1px solid pink;',
	'id'=>'Nominal',
	'value'=>set_value('Nominal'),
	'class'=>'form-control'
);
echo form_input($data_form);
?></center></td>
    </tr>
    <tr>
        <td colspan="3"><center><?php
$data_form=array(
	'placeholder'=>'ID Kepentingan',
	'name'=>'id_Kepentingan',
	'style'=>'border:1px solid pink;',
	'id'=>'id_Kepentingan',
	'value'=>$id_Kepentingan,
	'class'=>'form-control',
	'readonly' => 'readonly'
);
echo form_input($data_form);
?></center></td>
    </tr>
    <tr>
        <td colspan="3"><center><?php
$data_form=array(
	'placeholder'=>'KETERANGAN',
	'name'=>'Keterangan',
	'style'=>'border:1px solid pink;',
	'id'=>'Keterangan',
	'value'=>set_value('Keterangan'),
	'class'=>'form-control'
);
echo form_input($data_form);
?></center></td>
    </tr>
   
	<tr>
    	<td colspan="3"><center>Kode Captcha : <br /> <?=$captcha?> <br /></center></td>
	</tr>
	<tr><td colspan="3"><center><?php
		$data_form=array(
			'name'=>'captcha',
			'class'=>'form-control'
		);
		echo form_input($data_form);
		?></center></td>
    </tr>
    <tr>
        <td colspan="3"><center><?php echo form_submit('','SUBMIT','class="btn btn-primary btn-lg btn-block"'); ?>
<?php echo form_close(); ?><center></td>
    </tr>
</table>
</form>
