<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<div style="padding: 5px;">
    <h3>Reject PIREP</h3>
    <p>Please enter a comment for why you are rejecting this report. It'll be entered in the comments for the report. You do have the option later on to accept this report.</p>
    <form id="form" action="<?php echo SITE_URL?>/admin/index.php/pirepadmin/viewpending" method="post">
    <textarea class="form-control" name="comment" style="width: 90%;"></textarea>
    
    
    <br />
    <input type="hidden" name="pirepid" value="<?php echo $pirepid;?>" />
    <input type="hidden" name="action" value="rejectpirep" />
    <input type="submit" name="submit" class="btn btn-danger" value="Reject this Report" />
    
    </form>
</div>