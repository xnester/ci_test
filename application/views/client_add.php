<h3>Add New Client</h3>
<?php 
	echo anchor('client','back');

	$attributes = array('id' => 'client_add');
	echo form_open('client/create',$attributes);
	
	// an array of the fields in the student table
	$field_array = array('cus_id' => 'Customer ID','c_name' => 'Client Name','phone' => 'Phone','email' => 'Email');
	
	foreach($field_array as $field => $label) {
	  echo '<p>';
	  echo form_label($label, $field);
	  echo form_input(array('name' => $field, 'value' => set_value($field)));
	  echo '</p>';
	}
	
	// not setting the value attribute omits the submit from the $_POST array
	echo form_submit('submit', 'Add'); 
	echo form_close();

/* End of file student_add.php */
/* Location: ./system/application/views/student_add.php */
?>