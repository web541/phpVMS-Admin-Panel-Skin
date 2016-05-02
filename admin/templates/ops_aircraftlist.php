<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<h3>Aircraft List</h3>
<p>These are all the aircraft that your airline operates.</p>
<?php
if(!$allaircraft)
{
	echo '<p id="error">No aircraft have been added</p>';
	return;
}
?>
<table id="tabledlist" class="table">
<thead>
<tr>
	<th class="text-center">ICAO</th>
	<th class="text-center">Name/Type</th>	
	<th class="text-center">Full Name</th>
	<th class="text-center">Registration</th>
    <th class="text-center">Airline</th>
	<th class="text-center">Max Pax</th>
	<th class="text-center">Max Cargo</th>
	<th class="text-center">Options</th>
</tr>
</thead>
<tbody>
<?php
foreach($allaircraft as $aircraft)
{
?>
<tr class="<?php echo ($aircraft->enabled==0)?'disabled':''?>">
	<td class="text-center"><?php echo $aircraft->icao; ?></td>
	<td class="text-center"><?php echo $aircraft->name; ?></td>
	<td class="text-center"><?php echo $aircraft->fullname; ?></td>
	<td class="text-center"><?php echo $aircraft->registration; ?></td>
    <td class="text-center"><?php echo $aircraft->airline; ?></td>
	<td class="text-center"><?php echo $aircraft->maxpax; ?></td>
	<td class="text-center"><?php echo $aircraft->maxcargo; ?></td>
	<td class="text-center" width="1%" nowrap>
		<button class="btn btn-info {button:{icons:{primary:'ui-icon-wrench'}}}" 
			onclick="window.location='<?php echo adminurl('/operations/editaircraft?id='.$aircraft->id.'&icao='.$aircraft->airline);?>';">Edit</button>
	</td>
</tr>
<?php
}
?>
</tbody>
</table>
