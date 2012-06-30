<h3>Add New Domain</h3>
<?php 
	$attributes = array('id' => 'form_add');
	echo form_open('domain/savenew',$attributes);
	// an array of the fields in the dealer table
	$field_array = array(	
		//'name'		=>	'Domain Name',
		'created'	=>	'Created',
		'changed'	=>	'Changed',
		'expires'	=>	'Expires',
		'registrar'	=>	'Registrar'	
	);
	echo form_label('Domain name','name');
	$ddata= array('id'=>'name','name'=>'name');
	// Whois Button
	echo form_input($ddata);
	$wdata=array('id'=>'bwhois','name'=>'bwhois','type'=>'button','value'=>'Whois');
	echo form_input($wdata);
	foreach($field_array as $field => $label) 
	{
		echo '<p>';
		echo form_label($label, $field);
		echo form_input(array('id' => $field,'name' => $field));
		echo '</p>';
	}
	echo form_label('Name server','nserver');
	$ndata= array('id'=>'nserver','name'=>'nserver','rows'=>'4','cols'=>'20');
	echo form_textarea($ndata);
	//Client Select
	echo '<p>';
	echo form_label('Client','client_id');
	echo form_dropdown('client_id', $options);
	echo '</p>';
	echo '<p>';
	echo form_submit('submit','Add');
	echo anchor('domain','back');
	echo '</p>';
	
	echo '<br>';
	echo form_textarea(array('id'=>'divResult','name'=>'divResult','cols'=>'100','rows'=>'13','readonly'=>'true'));
	echo form_close();
?>