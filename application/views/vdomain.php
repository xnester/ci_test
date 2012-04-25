<?php
echo anchor('domain/addnew','Add New Domain');
echo '<br>';
echo $this->pagination->create_links();
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	<th>No.</th>
    <th>Name</th>
    <th>Registrar</th>
    <th>Created</th>
    <th>Expires</th>
    <th>Changed</th>
    <th>NS</th>
    <th>Client</th>
    <th>Actions</th>
  </tr>
  
<?php
$i=1+$offset;
foreach ($query->result() as $row)
{
	echo '<tr>
	<td>'.$i.'</td>
	<td>'.$row->name.'</td>
    <td>'.$row->registrar.'</td>
    <td>'.$row->created.'</td>
    <td>'.$row->expires.'</td>
    <td>'.$row->changed.'</td>
    <td>'.$row->nserver.'</td>
    <td>'.$row->client_id.'</td>
    <td>'.anchor('domain/edit/'.$row->id,'edit').'   '.anchor('domain/del/'.$row->id,'del').'</td>
    </tr>';
	$i++;
}
?>
</table>