<div style='background:red;'>
<?=$errors?>
</div>
<?php echo form_open(base_url().'pembiayaan_gajis/inputgaji_b/'.$id_Pegawai); ?>
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
	'placeholder'=>'ID PEGAWAI',
	'name'=>'id_Pegawai',
	'style'=>'border:1px solid pink;',
	'id'=>'id_Pegawai',
	'value'=>$id_Pegawai,
	'class'=>'form-control',
	'readonly' => 'readonly'
);
echo form_input($data_form);
?></center></td>
    </tr>
    <tr>
    	<td colspan="3"><center>Periode Dibagi Menjadi 4 (1, 2, 3, 4)</center></td>
    </tr>
    <tr>
        <td colspan="3"><center><?php
$data_form=array(
	'placeholder'=>'PERIODE',
	'name'=>'Periode',
	'style'=>'border:1px solid pink;',
	'id'=>'Periode',
	'value'=>set_value('Periode'),
	'class'=>'form-control'
);
echo form_input($data_form);
?></center></td>
    </tr>
    <tr>
    	<td colspan="3"><center>Tanggal</center></td>
    </tr>
    <tr>
    	<td><?php
$options=array(
	''=>'Tgl',
	'1'=>'1',
	'2'=>'2',
	'3'=>'3',
	'4'=>'4',
	'5'=>'5',
	'6'=>'6',
	'7'=>'7',
	'8'=>'8',
	'9'=>'9',
	'10'=>'10',
	'11'=>'11',
	'12'=>'12',
	'13'=>'13',
	'14'=>'14',
	'15'=>'15',
	'16'=>'16',
	'17'=>'17',
	'18'=>'18',
	'19'=>'19',
	'20'=>'20',
	'21'=>'21',
	'22'=>'22',
	'23'=>'23',
	'24'=>'24',
	'25'=>'25',
	'26'=>'26',
	'27'=>'27',
	'28'=>'28',
	'29'=>'29',
	'30'=>'30',
	'31'=>'31'
);
echo form_dropdown('Tanggal',$options,set_value('Tanggal'),'class="form-control"');
?></td>
        <td><?php
$options=array(
	''=>'Bln',
	'1'=>'1',
	'2'=>'2',
	'3'=>'3',
	'4'=>'4',
	'5'=>'5',
	'6'=>'6',
	'7'=>'7',
	'8'=>'8',
	'9'=>'9',
	'10'=>'10',
	'11'=>'11',
	'12'=>'12',
);
echo form_dropdown('Bulan',$options,set_value('Tanggal'),'class="form-control"');
?></td>
        <td><?php
$options=array(
	''=>'Thn',
	'2005'=>'2005',
	'2006'=>'2006',
	'2007'=>'2007',
	'2008'=>'2008',
	'2009'=>'2009',
	'2010'=>'2010',
	'2011'=>'2011',
	'2012'=>'2012',
	'2013'=>'2013',
	'2014'=>'2014',
	'2015'=>'2015'
);
echo form_dropdown('Tahun',$options,set_value('Tanggal'),'class="form-control"');
?></td>
    </tr>
    <tr>
        <td colspan="3"><center><?php
$data_form=array(
	'placeholder'=>'NOMINAL',
	'name'=>'Nominal',
	'style'=>'border:1px solid pink;',
	'id'=>'Nominal',
	'value'=>set_value('Nominal'),
	'class'=>'form-control',
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
