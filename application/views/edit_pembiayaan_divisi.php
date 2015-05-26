</div>
<?php echo form_open(base_url().'pembiayaan_divisis/editpembiayaan/'.$this->uri->segment(3)); ?>
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
	'placeholder'=>'ID PEMBIAYAAN',
	'name'=>'id_Pembiayaan',
	'style'=>'border:1px solid pink;',
	'id'=>'id_Pembiayaan',
	'value'=>$terserah['id_Pembiayaan'],
	'class'=>'form-control',
	'readonly' => 'readonly'
);
echo form_input($data_form);
?></center></td>
    </tr>
    <tr>
        <td colspan="3"><center><?php
$data_form=array(
	'placeholder'=>'DIVISI',
	'name'=>'Divisi',
	'style'=>'border:1px solid pink;',
	'id'=>'Divisi',
	'value'=>$terserah['Divisi'],
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
	'value'=>$terserah['Nominal'],
	'class'=>'form-control'
);
echo form_input($data_form);
?></center></td>
    </tr>
    <tr>
        <td colspan="3"><center><?php
$data_form=array(
	'placeholder'=>'ID KEPENTINGAN',
	'name'=>'id_Kepentingan',
	'style'=>'border:1px solid pink;',
	'id'=>'id_Kepentingan',
	'value'=>$terserah['id_Kepentingan'],
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
	'value'=>$terserah['Keterangan'],
	'class'=>'form-control'
);
echo form_input($data_form);
?></center></td>
    </tr>
    <tr>
        <td colspan="3"><center><p><?php echo form_submit('','SUBMIT'); ?></p>
<?php echo form_close(); ?><center></td>
    </tr>
</table>
</form>
