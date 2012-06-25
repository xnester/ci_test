<h3>Add New Dealer</h3>
<?php 
	echo anchor('dealer','back');
	
	$attributes = array('id' => 'form_dealer');
	echo form_open('dealer/update',$attributes);

	// an array of the fields in the dealer table
	$field_array = array(	
		'name'=>	'Name',
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
	
	echo form_submit('submit','Update');
	echo form_close();
?>