<?php 
	echo anchor('host','back');
	
	$attributes = array('id' => 'form_host_edit');
	echo form_open('host/update',$attributes);

	// an array of the fields in the student table
	$field_array = array(	
		'name'	=>	'Name',
		'desc'	=>	'Description',
		'space'	=>	'Space'
	);

	echo form_hidden('id',$row->id);
	foreach($field_array as $field => $label) {
		echo '<p>';
		echo form_label($label, $field);
		echo form_input(array('id' => $field,'name' => $field, 'value' => set_value($field,$row->$field)));
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
	echo form_dropdown('status', $options,$row->status);
	echo '</p>';
	
	echo form_submit('submit','Update');
	echo form_close();
	echo 'Last Update: '.$row->stamp;
?>