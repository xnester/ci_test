<h3>Edit Domain</h3>
<?php 
echo anchor('domain','back');
echo form_open('domain/savedomain');

$idata= array('id'=>$row->id);
echo form_hidden($idata);

echo form_label('Domain name','domain');
$ddata= array('id'=>'domain','name'=>'domain','size'=>'25','value'=>$row->name);
echo form_input($ddata);

echo form_label('Created','created');
$cdata= array('id'=>'created','name'=>'created','size'=>'25','value'=>$row->created);
echo form_input($cdata);

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

echo form_submit('submit','Save');
echo form_close();

echo 'Last Edit: '.$row->stamp;

?>