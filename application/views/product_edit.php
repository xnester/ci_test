<h3>Add New Product</h3>
<?php 
	
	$attributes = array('id' => 'form_product_edit');
	echo form_open('product/update',$attributes);
	// an array of the fields in the student table
	$field_array = array(	
		'name'	=>	'Name',
		'price' =>	'Price'
	);
	echo form_hidden('id', $row->id);
	foreach($field_array as $field => $label) {
		echo '<p>';
		echo form_label($label, $field);
		echo form_input(array('id' => $field,'name' => $field, 'value' => set_value($field,$row->$field)));
		echo '</p>';
	}
	echo '<p>';
	echo form_label('Description','desc');
	echo form_textarea(array('id' => 'desc','name' => 'desc','value' => set_value('desc',$row->desc)));
	echo '</p>';
	echo '<p>';
	echo 'Last Update: '.$row->stamp;
	echo '</p>';
	echo '<p>';
	echo form_submit('submit','Update');
	echo anchor('product','Cancle');
	echo form_close();
	echo '</p>';
?>