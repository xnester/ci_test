<?php
	$attributes = array('id' => 'form_client');
	echo form_open('client/save',$attributes);
	// an array of the fields in the student table
	$field_array = array(	
		'cus_id'=>	'Cus_ID',
		'name'	=>	'Name',
		'email'	=>	'Email',
		'phone'	=>	'Phone'
	);
	foreach($field_array as $field => $label) {
		echo '<p>';
		echo form_label($label, $field);
		echo form_input(array('id' => $field,'name' => $field, 'value' => set_value($field)));
		echo '</p>';
	}
	echo '<p>';
	echo form_label('Salesperson','dealer_id');
	echo form_dropdown('dealer_id', $options);
	echo '</p>';
	echo '<p>';
	echo form_submit('submit','Add');
	echo anchor('client','back');
	echo '</p>';
	echo form_close();
?>