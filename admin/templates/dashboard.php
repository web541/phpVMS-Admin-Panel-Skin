<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<h3>Welcome Back, <?php echo Auth::$userinfo->firstname?></h3>

<hr />

<div class="row">
    <div class="col-md-12">
        <div class="content-box-header">
            <div class="panel-title">VA Stats</div>
        </div>
        <div class="content-box-large box-with-header">
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <td><strong>Total Pilots: </strong></td>
                            <td><?php echo StatsData::PilotCount(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Total Flights: </strong></td>
                            <td><?php echo StatsData::TotalFlights(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Flights Today: </strong></td>
                            <td><?php echo StatsData::TotalFlightsToday();?></td>
                        </tr>
                        <tr>
                            <td><strong>Users Online: </strong></td>
                            <td><?php echo count(StatsData::UsersOnline()); ?></td>
                        </tr>
                    </table>
                </div>
                
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <td><strong>Total Hours Flown: </strong></td>
                            <td><?php echo StatsData::TotalHours(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Total Miles Flown: </strong></td>
                            <td><?php echo StatsData::TotalMilesFlown(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Total Schedules: </strong></td>
                            <td><?php echo StatsData::TotalSchedules(); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Guests Online: </strong></td>
                            <td><?php echo count(StatsData::GuestsOnline()); ?></td>
                        </tr>
                    </table>
                </div>
           	</div>
        </div>
    </div>
 </div>
    
	<?php
    MainController::Run('Dashboard', 'CheckInstallFolder');
    echo $updateinfo;
    ?>
    
    <br />

    <div class="row">
        <div class="col-md-12">
            <div class="content-box-header">
                <div class="panel-title">Pilot Reports for the Past Week</div>
            </div>
            <div class="content-box-large box-with-header">
            	<div id="pirepschart" style="height: 250px;"></div>
            </div>
        </div>
    </div>
    
    <br />

<?php
if(Config::Get('VACENTRAL_ENABLED') == true && $unexported_count > 0)
{ ?>

    <div class="row">
        <div class="col-md-12">
            <div class="content-box-header">
                <div class="panel-title">vaCentral Status</div>
            </div>
            <div class="content-box-large box-with-header">
            	<p>You have <strong><?php echo $unexported_count?></strong> PIREPS waiting for export to vaCentral
                <br />
	<a href="<?php echo adminurl('/vacentral/sendqueuedpireps'); ?>">Click here to send them</a> </p>
            </div>
        </div>
    </div>
<?php
} ?>
<?php
/*if(Config::Get('VACENTRAL_ENABLED') == true)
{
?>	
	<h3 style="margin-bottom: 0px;">Latest vaCentral News</h3>
	<?php echo $vacentral_news; ?>
	<p><a href="http://www.vacentral.net" target="_new">View All News</a></p>
<?php
}*/
?>
<script type="text/javascript">
var json = (function () {
                var json = null;
                $.ajax({
                        'async': false,
                        'global': false,
                        'url': "<?php echo adminaction('/dashboard/getpireps');?>",
                        'dataType': "json",
                        'success': function (data) {
                                json = data;
                        }
                });
                return json;
        })
        ();
        
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'pirepschart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: json,
  // The name of the data record attribute that contains x-values.
  xkey: 'ym',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['total'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Flights']
});
</script>