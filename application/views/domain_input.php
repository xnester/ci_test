<h3>Add New Domain</h3>
<?php 
echo anchor('domain','back');

$attributes = array('id' => 'form_add');
echo form_open('domain/savenew',$attributes);


// an array of the fields in the dealer table
	$field_array = array(	
		//'name'		=>	'Domain Name',
		'created'	=>	'Created',
		'changed'	=>	'Changed',
		'expires'	=>	'Expires',
		'registrar'	=>	'Registrar'
		//'nserver'	=>	'Name server'
	
	);

	echo form_label('Domain name','name');
	$ddata= array('id'=>'name','name'=>'name');
	// Whois Button
	echo form_input($ddata);
	$wdata=array('id'=>'bwhois','name'=>'bwhois','type'=>'button','value'=>'Whois');
	echo form_input($wdata);

	foreach($field_array as $field => $label) {
		echo '<p>';
		echo form_label($label, $field);
		echo form_input(array('id' => $field,'name' => $field));
		echo '</p>';
	}
	
	echo form_label('Name server','nserver');
	$ndata= array('id'=>'nserver','name'=>'nserver','rows'=>'4','cols'=>'20');
	echo form_textarea($ndata);
/*
echo form_label('Created','created');
$cdata= array('id'=>'created','name'=>'created','size'=>'25');
echo form_input($cdata);

echo form_label('Changed','changed');
$chdata= array('id'=>'changed','name'=>'changed','size'=>'25');
echo form_input($chdata);


echo form_label('Expires','expires');
$edata= array('id'=>'expires','name'=>'expires','size'=>'25');
echo form_input($edata);

echo form_label('Registrar','registrar');
$rdata= array('id'=>'registrar','name'=>'registrar','size'=>'25');
echo form_input($rdata);

echo form_label('Name server','nserver');
$ndata= array('id'=>'nserver','name'=>'nserver','size'=>'25');
echo form_input($ndata);

//echo form_label('Note','notes');
//$cdata= array('id'=>'notes','name'=>'notes','cols'=>'40','rows'=>'5');
//echo form_textarea($cdata);
*/
echo form_submit('submit','Add');
echo form_close();
?>