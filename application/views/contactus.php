<h3>Contact Us</h3>
<?php 
echo form_open('contact/contactus');
echo form_label('Your name','name');
$ndata= array('id'=>'name','name'=>'name','size'=>'25');
echo form_input($ndata);


echo form_label('Your email','email');
$edata= array('id'=>'email','name'=>'email','size'=>'25');
echo form_input($edata);

echo form_label('Note','notes');
$cdata= array('id'=>'notes','name'=>'notes','cols'=>'40','rows'=>'5');
echo form_textarea($cdata);

echo form_submit('submit','Send');
echo form_close();
?>