<h3>Add Setting</h3>
<form id="form" action="<?php echo SITE_URL?>/admin/action.php/settings/settings" method="post">
<p>Name's are converted to upper case. Values of "true" or "false" are converted to boolean, and the setting above will have "Enabled" or "Disabled" as options</p>
<dl>
	<dt>Setting Name:</dt>
	<dd><input class="form-control" name="name" type="text" value="" /></dd>
	
	<dt>Setting Value:</dt>
	<dd><input class="form-control" name="value" type="text" value="" /></dd>
	
	<dt>Description</dt>
	<dd><input class="form-control" name="descrip" type="text" value="" /></dd>
	
	<dt></dt>
	<dd><input type="hidden" name="action" value="addsetting">
		<input type="submit" name="submit" class="btn btn-success" value="Add Setting" /></dd>
</form>