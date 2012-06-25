<?php
echo anchor('domain/addnew','Add New Domain');
echo '<br>';
echo $this->pagination->create_links();
echo $data_table;
?>