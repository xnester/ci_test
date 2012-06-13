<h3>Add New Domain</h3>
<?php 
	echo anchor('domain','back');
	
	$attributes = array('id' => 'form_add');
	echo form_open('client/add',$attributes);

	// an array of the fields in the student table
	$field_array = array(	
		'cus_id'=>	'Cus_ID',
		'name'	=>	'Name',
		'email'	=>	'Email',
		'phone'	=>	'Phone'
	);

	//echo form_hidden('id', $uid);
	
	foreach($field_array as $field => $label) {
		echo '<p>';
		echo form_label($label, $field);
		echo form_input(array('id' => $field,'name' => $field, 'value' => set_value($field)));
		echo '</p>';
	}
	
	echo '<p>';
	echo form_label('Seller','seller');
	//From DB
	$options = array(
                  'small'  => 'Small Shirt',
                  'med'    => 'Medium Shirt',
                  'large'   => 'Large Shirt',
                  'xlarge' => 'Extra Large Shirt',
                );
	echo form_dropdown('seller', $options, 'large');
	echo '</p>';
	
	echo form_submit('submit','Add');
	echo form_close();
?>