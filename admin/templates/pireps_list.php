<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<div id="pireplist">
<?php if($title!='') echo "<h3>$title</h3>"; ?>
<p><?php if(isset($descrip)) { echo $descrip; }?></p>
<?php
if(!$pireps)
{
	echo '<p>No reports have been found</p></div>';
	return;
}
?>
<p>There are a total of <?php echo count($pireps);?> flight reports in this category. <a href="<?php echo SITE_URL?>/admin/index.php/pirepadmin/approveall">Click to approve all</a></p>
<?php
if($_GET['module'] == 'pirepadmin' && $_GET['page'] == 'viewall')
{
	Template::Show('pireps_filter.tpl');
}

if(isset($paginate))
{
?>
	<div style="float: right;">
		<a href="?admin=<?php echo $admin?>&start=<?php echo $start?>">Next Page</a>
		<br />
		</div>
		<?php
	}
	?>
<table id="tabledlist" class="table" style="height: 100%">
<thead>
<tr>
	<th>Pilot Reports</th>
</tr>
</thead>
<tbody>
<?php
foreach($pireps as $pirep)
{	
	if($pirep->accepted == PIREP_PENDING)
		$td_class = 'pending';
	else
		$td_class = '';
	
	$error = false;
?>
<tr class="<?php echo $class?> pirep_list" id="row<?php echo $pirep->pirepid;?>">
	<td align="left" valign="top" nowrap class="<?php echo $td_class;?>">
	<strong><a href="<?php echo SITE_URL?>/admin/index.php/pilotadmin/viewpilots?action=viewoptions&pilotid=<?php echo $pirep->pilotid;?>">
		<?php echo PilotData::GetPilotCode($pirep->code, $pirep->pilotid) . ' - ' .$pirep->firstname .' ' . $pirep->lastname;?></a></strong>
	<strong>Flight:</strong> <?php echo $pirep->code . $pirep->flightnum; ?></div>
	<strong>Dep/Arr: </strong><?php echo $pirep->depicao; ?>/<?php echo $pirep->arricao; ?> 
	<strong>Flight Time: </strong><?php echo $pirep->flighttime; ?> <br />
	<strong>Submit Date: </strong><?php echo date(DATE_FORMAT, $pirep->submitdate); ?> 
<strong>Current Status:	</strong>
	<?php 
	
	if($pirep->accepted == PIREP_ACCEPTED)
		echo 'Accepted';
	elseif($pirep->accepted == PIREP_REJECTED)
		echo 'Rejected';
	elseif($pirep->accepted == PIREP_PENDING)
		echo 'Approval Pending';
	
	?>
	<?php
	# If there was an error, don't allow the PIREP to go through
	if($pirep->aircraft == '')
	{
		$error = true;
	}	
	?>
<table class="table">
<tr>
<td style="border: none;" align="left">

    <button class="btn btn-info"
        href="#" onclick="$('#details_dialog_<?php echo $pirep->pirepid;?>').toggle()">Details</button>
        
    <a data-toggle="modal" class="btn btn-info" href="<?php echo SITE_URL?>/admin/action.php/pirepadmin/viewlog?pirepid=<?php echo $pirep->pirepid;?>" type="button" data-target="#log">Log</a>
    
    <a data-toggle="modal" class="btn btn-info" href="<?php echo SITE_URL?>/admin/action.php/pirepadmin/viewcomments?pirepid=<?php echo $pirep->pirepid;?>" data-target="#comments">Comments <span style="font-size: 12px; margin-top: -3px">(<?php echo PIREPData::getCommentCount($pirep->pirepid); ?>)</a>

    <a data-toggle="modal" class="btn btn-info" href="<?php echo SITE_URL?>/admin/action.php/pirepadmin/addcomment?pirepid=<?php echo $pirep->pirepid;?>" data-target="#addcomment">Add Comment</a>
</td>

<td style="border: none;" align="right">
	<?php
	# If there was an error, don't allow the PIREP to go through
	if($error == false)
	{
	?>
       <button href="<?php echo SITE_URL?>/admin/action.php/pirepadmin/<?php echo $load; ?>?pilotid=<?php echo $pirep->pilotid?>" action="approvepirep"
                id="<?php echo $pirep->pirepid;?>" class="pirepaction btn btn-success">Accept</button>

		<?php
	}
	?>
        <a data-toggle="modal" class="btn btn-danger" href="<?php echo SITE_URL?>/admin/action.php/pirepadmin/rejectpirep?pirepid=<?php echo $pirep->pirepid;?>&pilotid=<?php echo $pirep->pilotid; ?>" data-target="#reject">Reject</a>
      
        <button class="btn btn-primary"
            onclick="window.location = '<?php echo SITE_URL?>/admin/index.php/pirepadmin/editpirep?pirepid=<?php echo $pirep->pirepid;?>&pilotid=<?php echo $pirep->pilotid?>'">Edit</button>
            
        <button href="<?php echo SITE_URL?>/admin/action.php/pirepadmin/<?php echo $load; ?>?pilotid=<?php echo $pirep->pilotid?>" action="deletepirep"
            id="<?php echo $pirep->pirepid;?>" class="deleteitem btn btn-danger">Delete</button>

</td>
</tr>
</table>

<!--<button class="jqModal {button:{icons:{primary:'ui-icon-signal-diag'}}}" id="dialog_route"
		href="<?php echo SITE_URL?>/admin/action.php/operations/viewmap?type=pirep&id=<?php echo $pirep->pirepid;?>">Route</button>-->

</div>
<br />
<?php
# If there was an error, don't allow the PIREP to go through
if($pirep->aircraft == '')
{
	$error = true;
	Template::Set('message', 'No aircraft for this PIREP. You must edit and assign before you can accept it.');
	Template::Show('core_error.tpl');
}	
?>
<table class="table" id="details_dialog_<?php echo $pirep->pirepid;?>" 
	style="display:none; border-left: 3px solid #FF6633; margin-top: 3px;padding-left: 3px;" width="100%">
<tr>
	<td><strong>Client: </strong> <?php echo $pirep->source; ?></td>
	<td><strong>Aircraft: </strong>
			<?php 
			if($pirep->aircraft == '')
			{
				$error = true;
				echo '<span style="color: red">No aircraft! Edit to change</span>';
			}
			else
				echo $pirep->aircraft. " ($pirep->registration)";
			?>
</td>
	<td><strong>Flight Time: </strong> <?php echo $pirep->flighttime_stamp; ?></td>
	<td><strong>Distance: </strong><?php echo $pirep->distance; ?> </td>
	<td><strong>Landing Rate: </strong><?php echo $pirep->landingrate; ?> </td>
</tr>
<tr>
	<td colspan="5"><strong>Route: </strong><?php echo $pirep->route;?> 
<a data-toggle="modal" href="<?php echo SITE_URL?>/admin/action.php/operations/viewmap?type=pirep&id=<?php echo $pirep->pirepid;?>" data-target="#route">View</a>
</td>
</tr>
<tr>
	<td><strong>Load/Price: </strong><?php echo (($pirep->load!='')?$pirep->load:'-').' / '.FinanceData::formatMoney($pirep->price);?></td>
	<td><strong>Pilot Pay: </strong><?php echo FinanceData::formatMoney($pirep->pilotpay);?></td>
	<td><strong>Fuel Used: </strong><?php echo ($pirep->fuelused!='') ? $pirep->fuelused.Config::Get('LIQUID_UNIT_NAMES', Config::Get('LiquidUnit')) : '-';?></td>
	<td><strong>Revenue: </strong><?php echo FinanceData::formatMoney($pirep->revenue);?></td>
	<td><strong>Gross: </strong><?php echo FinanceData::formatMoney($pirep->gross);?></td>

</tr>
<?php
// Get the additional fields
//	I know, badish place to put it, but it's pulled per-PIREP
$fields = PIREPData::GetFieldData($pirep->pirepid);
if(!$fields)
{
	echo 'No additional data found';
}
else
{
	$i=1;
	echo '<tr>';
	
	foreach ($fields as $field)
	{
		if($i == 1)
		{
			echo '<tr>';
		}
		
		echo "<td><strong>{$field->title}:</strong> {$field->value}</td>";
		
		if($i == 5)
		{
			echo '</tr>';
			$i = 0;
		}
		
		$i++;
	}
}

echo '</tr>';
?>
</table>
</td>
</tr>
<?php
} /* Close the PIREPs loop */
?>
</tbody>
</table>
<span style="float: right">* - double click to select</span><br />

<?php
if(isset($paginate))
{
?>
	<div style="float: right;">
	<a href="?admin=<?php echo $admin?>&start=<?php echo $start?>">Next Page</a>
	<br />
	</div>
	<?php
} /* Close the paginate loop */
?>
</div>
<script type="text/javascript">
$("button, input:button, input:submit").button();
</script>
<!-- Modal -->
<div class="modal fade" id="log" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
         <div class="modal-content">
                 <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="myModalLabel">Log for <?php echo $report->code.$report->pirepid?></h4>
                 </div>
                 <div class="modal-body">
                        
                 </div>
                 <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         <button type="button" class="btn btn-primary">Save changes</button>
                 </div>
         </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="comments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
         <div class="modal-content">
                 <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="myModalLabel"></h4>
                 </div>
                 <div class="modal-body" style="padding:5px;">
                        
                 </div>
                 <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         <button type="button" class="btn btn-primary">Save changes</button>
                 </div>
         </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addcomment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
         <div class="modal-content">
                 <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="myModalLabel">Add Comment For <?php echo $report->code.$report->pirepid?></h4>
                 </div>
                 <div class="modal-body" style="padding:5px;">
                        
                 </div>
                 <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         <button type="button" class="btn btn-primary">Save changes</button>
                 </div>
         </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
         <div class="modal-content">
                 <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="myModalLabel">Reject Pilot Report <?php echo $report->code.$report->pirepid?></h4>
                 </div>
                 <div class="modal-body">
                        
                 </div>
                 <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         <button type="button" class="btn btn-primary">Save changes</button>
                 </div>
         </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="route" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
         <div class="modal-content">
                 <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="myModalLabel"></h4>
                 </div>
                 <div class="modal-body">
                        
                 </div>
                 <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         <button type="button" class="btn btn-primary">Save changes</button>
                 </div>
         </div>
</div>
</div>