<h3>Add New Host</h3>
<?php 
	$attributes = array('id' => 'form_host');
	echo form_open('host/insert',$attributes);
	// an array of the fields in the student table
	$field_array = array(	
		'name'	=>	'Name',
		'description'	=>	'Description',
		'space'	=>	'Space',
		//'ip'	=>	'IP'
	);
	//echo form_hidden('id', $uid);
	foreach($field_array as $field => $label) {
		echo '<p>';
		echo form_label($label, $field);
		echo form_input(array('id' => $field,'name' => $field, 'value' => set_value($field)));
		echo '</p>';
	}
	echo '<p>';
	echo form_label('Status','status');
	//From DB
	$options = array(
					'Online'=>'Online',
					'Down'=>'Down',
					'HW Error'=>'HW Error',
					'Remove'=>'Remove'
                );
	echo form_dropdown('status', $options, 'Online');
	echo '</p>';
	
	echo form_label('IP', 'ips').'<a href="#" class="add" rel=".copy">Add More</a>';
	echo '<p class="copy">';
	echo form_input(array('id' => 'ips','name' => 'ips[]'));
	echo '</p>';
	echo '<p>';
	echo form_submit('submit','Add');
	echo anchor('host','back');
	echo '</p>';
	echo form_close();
?>