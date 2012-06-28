<h3>Edit Domain</h3>
<?php 
echo anchor('domain','back');
$attributes = array('id' => 'form_edit');
echo form_open('domain/save',$attributes);

// an array of the fields in the dealer table
	$field_array = array(	
		//'name'	=>	'Domain Name',
		'created'	=>	'Created',
		'changed'	=>	'Changed',
		'expires'	=>	'Expires',
		'registrar'	=>	'Registrar',
		//'nserver'	=>	'Name server'
	
	);
	echo form_hidden('id',$row->id);
	echo form_label('Domain name','name');
	$ddata= array('id'=>'name','name'=>'name','value'=>$row->name);
	echo form_input($ddata);
	// Whois Button
	$wdata=array('id'=>'bwhois','name'=>'bwhois','type'=>'button','value'=>'Whois');
	echo form_input($wdata);
	foreach($field_array as $field => $label) {
		echo '<p>';
		echo form_label($label, $field);
		echo form_input(array('id' => $field,'name' => $field, 'value' => set_value($field,$row->$field)));
		echo '</p>';
	}
	echo form_label('Name server','nserver');
	$ndata= array('id'=>'nserver','name'=>'nserver','rows'=>'4','cols'=>'20','value'=>$row->nserver);
	echo form_textarea($ndata);
	
/*
$idata= array('id'=>$row->id);
echo form_hidden($idata);

echo form_label('Domain name','domain');
$ddata= array('id'=>'domain','name'=>'domain','size'=>'25','value'=>$row->name);
echo form_input($ddata);

echo form_label('Created','created');
$cdata= array('id'=>'created','name'=>'created','size'=>'25','value'=>$row->created);
echo form_input($cdata);

echo form_label('Changed','changed');
$chdata= array('id'=>'changed','name'=>'changed','size'=>'25','value'=>$row->changed);
echo form_input($chdata);

echo form_label('Expires','expires');
$edata= array('id'=>'exoires','name'=>'expires','size'=>'25','value'=>$row->expires);
echo form_input($edata);

echo form_label('Registrar','registrar');
$rdata= array('id'=>'registrar','name'=>'registrar','size'=>'25','value'=>$row->registrar);
echo form_input($rdata);

echo form_label('Name server','nserver');
$ndata= array('id'=>'nserver','name'=>'nserver','size'=>'25','value'=>$row->nserver);
echo form_input($ndata);

//echo form_label('Note','notes');
//$cdata= array('id'=>'notes','name'=>'notes','cols'=>'40','rows'=>'5');
//echo form_textarea($cdata);
*/
echo form_submit('submit','Save');
echo form_close();

echo 'Last Edit: '.$row->stamp;
echo '<br>';
echo form_textarea(array('id'=>'divResult','name'=>'divResult','cols'=>'100','rows'=>'13','readonly'=>'true'));


?>