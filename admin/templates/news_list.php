<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<h3>Posted News</h3>
<?php
if(!$allnews) {
	echo '<p>No news items have been posted yet</p>';
	return;
}
?>
<table id="tabledlist" class="table">
<thead>
<tr>
	<th>Subject</th>
	<th>Poster</th>
	<th>Posted Date</th>
	<th>Options</th>
</tr>
</thead>
<tbody>
<?php
foreach($allnews as $news) {
?>
<tr id="row<?php echo $news->id;?>">
	<td align="center"><?php echo $news->subject;?></td>
	<td align="center"><?php echo $news->postedby;?></td>
	<td align="center"><?php echo date(DATE_FORMAT, $news->postdate);?></td>
	<td align="center" width="1%" nowrap>
        <button class="btn btn-primary {button:{icons:{primary:'ui-icon-wrench'}}}" onclick="window.location='<?php echo adminaction('/sitecms/bumpnews?id='.$news->id);?>';">
			Bump
		</button>
		<button class="btn btn-info {button:{icons:{primary:'ui-icon-wrench'}}}" onclick="window.location='<?php echo adminurl('/sitecms/editnews?id='.$news->id);?>';">
			Edit
		</button>
		<button class="deleteitem btn btn-danger {button:{icons:{primary:'ui-icon-trash'}}}" 
			href="<?php echo adminaction('/sitecms/viewnews');?>" action="deleteitem" id="<?php echo $news->id;?>">Delete</button>
	</td>
</tr>
<?php
}
?>
</tbody>
</table>