<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<div class="container-fluid">
<h3><?php echo $pilotinfo->firstname . ' ' . $pilotinfo->lastname; ?></h3>
<hr>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
  
  	<?php if(PilotGroups::group_has_perm(Auth::$usergroups, EDIT_PILOTS)) { ?>
    <li role="presentation" class="active"><a href="#pilotdetails" aria-controls="pilotdetails" role="tab" data-toggle="tab">Pilot Details</a></li>
    <?php } if(PilotGroups::group_has_perm(Auth::$usergroups, EDIT_GROUPS)) { ?>
    <li role="presentation"><a href="#pilotgroups" aria-controls="pilotgroups" role="tab" data-toggle="tab">Pilot Groups</a></li>
    <?php } if(PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) { ?>
    <li role="presentation"><a href="#pilotawards" aria-controls="pilotawards" role="tab" data-toggle="tab">Pilot Awards</a></li>
    <?php } if(PilotGroups::group_has_perm(Auth::$usergroups, MODERATE_PIREPS)) { ?>
    <li role="presentation"><a href="#viewpireps" aria-controls="viewpireps" role="tab" data-toggle="tab">View PIREPS</a></li>
    <?php } if(PilotGroups::group_has_perm(Auth::$usergroups, FULL_ADMIN)) { ?>
    <li role="presentation"><a href="#pilotoptions" aria-controls="pilotoptions" role="tab" data-toggle="tab">Pilot Options</a></li>
    <?php } ?>
  </ul>

<div class="tab-content">
  
  <?php if(PilotGroups::group_has_perm(Auth::$usergroups, EDIT_PILOTS)) { ?>
  <div role="tabpanel" class="tab-pane fade in active" id="pilotdetails">
  	<?php Template::Show('pilots_details.tpl'); ?>
  </div>
  
  <?php } if(PilotGroups::group_has_perm(Auth::$usergroups, EDIT_GROUPS)) { ?>
  <div role="tabpanel" class="tab-pane fade" id="pilotgroups">
	<?php Template::Show('pilots_groups.tpl'); 
          Template::Show('pilots_addtogroup.tpl');
    ?>
  </div>
  
  <?php } if(PilotGroups::group_has_perm(Auth::$usergroups, EDIT_AWARDS)) { ?>
  <div role="tabpanel" class="tab-pane fade" id="pilotawards">
	<?php Template::Show('pilots_awards.tpl'); 
		  Template::Show('pilots_addawards.tpl');
	?>
  </div>
  
  <?php } if(PilotGroups::group_has_perm(Auth::$usergroups, MODERATE_PIREPS)) { ?>
  <div role="tabpanel" class="tab-pane fade" id="viewpireps">
  	<?php Template::Show('pireps_list.tpl'); ?>
  </div>
  
  <?php } if(PilotGroups::group_has_perm(Auth::$usergroups, FULL_ADMIN)) { ?>
  <div role="tabpanel" class="tab-pane fade" id="pilotoptions">
  	<?php Template::Show('pilots_options.tpl'); ?>
  </div>
  		<?php } ?>
	</div>