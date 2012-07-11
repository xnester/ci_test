<?php
echo $data_table;
//echo $data_ip;
echo '<table cellspacing="2" cellpadding="4" border="1" id=ip>
<thead>
<tr class="table_header">
	<th>IP</th>
	<th>Vlan</th>
	<th>Description</th>
	<th>Actions</th>
</tr>
</thead>
<tbody>';

if($data_ip)
{
	foreach ($data_ip->result() as $ips)
	{
		echo '<tr id="'.$ips->id.'">';
		echo '<td>';
		echo empty($ips->ip)?'&nbsp;':$ips->ip;
		echo '</td>';
		echo '<td>';
		echo empty($ips->int)?'&nbsp;':$ips->int;
		echo '</td>';
		echo '<td>';
		echo empty($ips->desc)?'&nbsp;':$ips->desc;
		echo '</td>';
		echo '<td><span style="white-space: nowrap">' .
				anchor('host/ip/edit/'.$ips->host_id.'/'. $ips->id, 'edit') . ' | ' .
				anchor('host/ip/del/'.$ips->host_id.'/'. $ips->id, 'delete',
						"onclick=\" return confirm('Are you sure you want to '
					+ 'delete the record for ".addslashes($ips->ip)."?')\"") .
					'</span></td>';
		echo '</tr>';
	}
}else{
	
	echo '<tr class="no_ip">';
	echo '<td colspan="4">No ip</td>';
	echo '</tr>';
}
echo'	
	</tbody>
	<tfoot>
		<tr>
			<td>'.form_input(array('id' => 'ips','name' => 'ips')).'</td>
			<td>'.form_input(array('id' => 'vlan','name' => 'vlan')).'</td>
			<td>'.form_input(array('id' => 'desc','name' => 'desc')).'</td>
			<td>'.form_button(array('id' => $host_id,'name' => 'add_ip','class'=>'add_ip'),'Add IP').'</td>
		</tr>
	</tfoot>
</table>';