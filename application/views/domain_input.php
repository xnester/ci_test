<h3>Add New Domain</h3>
<?php 
echo anchor('domain','back');
echo form_open('domain/savenewdomain');
echo form_label('Domain name','domain');
$ddata= array('id'=>'domain','name'=>'domain','size'=>'25');
echo form_input($ddata);

echo form_label('Created','created');
$cdata= array('id'=>'created','name'=>'created','size'=>'25');
echo form_input($cdata);

echo form_label('Expires','expires');
$edata= array('id'=>'exoires','name'=>'expires','size'=>'25');
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