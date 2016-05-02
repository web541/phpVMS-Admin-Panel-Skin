<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<h3>Custom PIREP Fields</h3>
<?php
if(!$allfields)
{
	echo '<p>You have not added any custom PIREP fields</p><br />';
	return;
}
?>

<table id="tabledlist" class="table">
<thead>
	<tr>
		<th>Field Name</th>
		<th>Values</th>
		<th>Options</th>
	</tr>
</thead>
<tbody>
<?php
foreach($allfields as $field)
{
?>
<tr>
	<td align="center"><?php echo $field->title;?></td>
	<td align="center">
	<?php
		if($field->type == '')
			echo '-';
		elseif($field->type == 'text')
			echo '<input type="text" class="form-control" name="" value="'.$field->options.'" />';
		elseif($field->type == 'dropdown')
		{
			$values = explode(',', $field->options);
			
			echo '<select class="form-control" name="'.$field->name.'">';
			foreach($values as $value)
			{
				$value = trim($value);
				echo '<option value="'.$value.'">'.$value.'</option>';
			}
			echo '</select>';	
		}
	?>
	</td>
	<td align="left" width="1%" nowrap>
		<a class="btn btn-info" href="<?php echo SITE_URL?>/admin/action.php/settings/editpirepfield?id=<?php echo $field->fieldid;?>"></a>
        
        <a class="btn btn-danger" href="<?php echo SITE_URL?>/admin/action.php/settings/pirepfields" action="deletefield" id="<?php echo $field->fieldid;?>" class="ajaxcall">Delete</a>

	</td>
</tr>
<?php
}
?>
</tbody>
</table>