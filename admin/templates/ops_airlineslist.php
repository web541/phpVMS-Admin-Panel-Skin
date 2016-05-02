<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<h3>Airlines List</h3>
<?php
if(!$allairlines)
{
	echo '<p id="error">No airlines have been added</p>';
	return;
}
?>
<table id="tabledlist" class="table">
<thead>
<tr>
	<th class="text-center">Code</th>
	<th class="text-center">Name</th>
	<th class="text-center">Enabled</th>
	<th class="text-center">Options</th>
</tr>
</thead>
<tbody>
<?php
foreach($allairlines as $airline)
{
?>
<tr>
	<td class="text-center"><?php echo $airline->code; ?></td>
	<td class="text-center"><?php echo $airline->name; ?></td>
	<td class="text-center"><?php echo ($airline->enabled == 1) ? 'Yes' : 'No'; ?></td>
	<td class="text-center" width="1%" nowrap>
	<a class="btn btn-info" href="<?php echo adminurl('/operations/editairline?id='.$airline->id);?>">Edit</a>
	</td>
</tr>
<?php
}
?>
</tbody>
</table>