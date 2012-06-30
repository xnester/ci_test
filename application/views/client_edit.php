<?php 
	echo anchor('client','back');
	
	$attributes = array('id' => 'form_client_edit');
	echo form_open('client/update',$attributes);

	// an array of the fields in the student table
	$field_array = array(	
		'cus_id'=>	'Cus_ID',
		'name'	=>	'Name',
		'email'	=>	'Email',
		'phone'	=>	'Phone'
	);

	echo form_hidden('id',$row->id);
	foreach($field_array as $field => $label) {
		echo '<p>';
		echo form_label($label, $field);
		echo form_input(array('id' => $field,'name' => $field, 'value' => set_value($field,$row->$field)));
		echo '</p>';
	}
	
	echo '<p>';
	echo form_label('Salesperson','dealer_id');
	echo form_dropdown('dealer_id', $options, $row->dealer_id);
	echo '</p>';
	
	echo form_submit('submit','Update');
	echo form_close();
	echo 'Last Edit: '.$row->modified;
?>