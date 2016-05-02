<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<h3>Downloads</h3>
<?php
if(!$allcategories)
{
	echo 'No categories or downloads have been added!';
	$allcategories = array();
}

foreach($allcategories as $category)
{
?>
<div id="<?php echo $category->id;?>"
	<h3><?php echo $category->name?> 
		<span style="font-size: 8pt">
		<a class="btn btn-info" href="<?php echo adminurl('/downloads/editcategory?id='.$category->id);?>">Edit</a>
			
		<button class="ajaxcallconfirm button btn btn-danger {button:{icons:{primary:'ui-icon-trash'}}}" action="deletecategory" id="<?php echo $category->id?>" 
			href="<?php echo adminaction('/downloads')?>">Delete</button>   
            
         <a class="btn btn-success" href="<?php echo adminurl('/downloads/adddownload?cat='.$category->id);?>">Add Category</a>
		</span>
	</h3>
<?php
	$alldownloads = DownloadData::getDownloads($category->id);
	
	if(!$alldownloads)
	{
		echo 'There are no downloads under this category.';
	}
	else
	{
?>
	<table id="tabledlist" class="table">
		<thead>
		<tr>
			<th class="text-center">Download Name</th>
			<th class="text-center">Description</th>
			<th class="text-center">Download Count</th>
			<th class="text-center">Options</th>
		</tr>
		</thead>
		<tbody>
<?php	
foreach($alldownloads as $download) 
{ 
?>
<tr id="row<?php echo $download->id?>">
	<td><?php echo '<a href="'.$download->link.'">'.$download->name.'</a>' ?></td>
	<td><?php echo $download->description==''?'-':$download->description; ?></td>
	<td align="center"><?php echo ($download->hits=='')? '0' : $download->hits?></td>
	
	<td width="1%" nowrap>
        <a class="btn btn-info" href="<?php echo adminurl('/downloads/editdownload?id='.$download->id);?>">Edit</a>
			
		<button class="deleteitem btn btn-danger {button:{icons:{primary:'ui-icon-trash'}}}" action="deletedownload" id="<?php echo $download->id?>"
			href="<?php echo adminaction('/downloads');?>">Delete</button>	
	</td>
</tr>
<?php	
}
?>
		</tbody>
		</table>
<?php
	 }
	 ?>
	 </div>
<?php
}
?>