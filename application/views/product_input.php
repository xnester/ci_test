<h3>Add New Product</h3>
<?php 
	echo anchor('product','back');
	$attributes = array('id' => 'form_product');
	echo form_open('product/insert',$attributes);
	// an array of the fields in the student table
	$field_array = array(	
		'name'	=>	'Name',
		'price' =>	'Price'
	);
	//echo form_hidden('id', $row->id);
	foreach($field_array as $field => $label) {
		echo '<p>';
		echo form_label($label, $field);
		echo form_input(array('id' => $field,'name' => $field, 'value' => set_value($field)));
		echo '</p>';
	}
	echo form_label('Description','desc');
	echo form_textarea(array('id' => 'desc','name' => 'desc'));
	echo '<p>';
	echo form_submit('submit','Add');
	echo form_close();
	echo '</p>';
?>