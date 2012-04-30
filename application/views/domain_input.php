<h3>Add New Domain</h3>
<?php 
echo anchor('domain','back');

$attributes = array('id' => 'form_add');
echo form_open('domain/savenew',$attributes);

echo form_label('Domain name','domain');
$ddata= array('id'=>'domain','name'=>'domain','size'=>'25');
echo form_input($ddata);

// Whois Button
$wdata=array('id'=>'bwhois','name'=>'bwhois','type'=>'button','value'=>'Whois');
echo form_input($wdata);

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

echo form_submit('submit','Add');
echo form_close();
?>