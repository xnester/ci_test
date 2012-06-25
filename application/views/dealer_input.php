<h3>Add New Dealer</h3>
<?php 
	echo anchor('dealer','back');
	
	$attributes = array('id' => 'form_dealer');
	echo form_open('dealer/save',$attributes);

	// an array of the fields in the dealer table
	$field_array = array(	
		'name'=>	'Name',
		'email'	=>	'Email',
		'phone'	=>	'Phone'
	);
	
	foreach($field_array as $field => $label) {
		echo '<p>';
		echo form_label($label, $field);
		echo form_input(array('id' => $field,'name' => $field));
		echo '</p>';
	}
	
	echo form_submit('submit','Add');
	echo form_close();
?>