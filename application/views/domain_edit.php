<h3>Edit Domain</h3>
<?php
	$attributes = array('id' => 'form_edit');
	echo form_open('domain/save',$attributes);
	// an array of the fields in the dealer table
	$field_array = array(	
		//'name'	=>	'Domain Name',
		'created'	=>	'Created',
		'changed'	=>	'Changed',
		'expires'	=>	'Expires',
		'registrar'	=>	'Registrar'	
	);
	echo form_hidden('id',$row->id);
	echo form_label('Domain name','name');
	$ddata= array('id'=>'name','name'=>'name','value'=>$row->name);
	echo form_input($ddata);
	// Whois Button
	$wdata=array('id'=>'bwhois','name'=>'bwhois','type'=>'button','value'=>'Whois');
	echo form_input($wdata);
	foreach($field_array as $field => $label) 
	{
		echo '<p>';
		echo form_label($label, $field);
		echo form_input(array('id' => $field,'name' => $field, 'value' => set_value($field,$row->$field)));
		echo '</p>';
	}
	echo form_label('Name server','nserver');
	$ndata= array('id'=>'nserver','name'=>'nserver','rows'=>'4','cols'=>'20','value'=>$row->nserver);
	echo form_textarea($ndata);
	//Client Select
	echo '<p>';
	echo form_label('Client','client_id');
	echo form_dropdown('client_id', $options, $row->client_id);
	echo '</p>';
	echo '<p>';
	echo form_submit('submit','Save');
	echo anchor('domain','back');
	echo '<p>';
	echo 'Last Edit: '.$row->stamp;
	echo '<br>';
	echo form_textarea(array('id'=>'divResult','name'=>'divResult','cols'=>'100','rows'=>'13','readonly'=>'true','value'=>$row->note));
	echo form_close();
?>