<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<h3><?php echo $title?></h3>
<form id="flashForm" action="<?php echo adminaction('/operations/airports');?>" method="post">
<dl>
<dt>Airport ICAO Code *</dt>
<dd><input id="airporticao" class="form-control" name="icao" type="text" value="<?php echo $airport->icao?>" /> 
	<button class="btn btn-success" id="lookupicao" onclick="lookupICAO(); return false;">Look Up</button>
</dd>

<dt></dt>
<dd><div id="statusbox"></div></dd>
<dt>Airport Name *</dt>
<dd><input id="airportname" class="form-control" name="name" type="text" value="<?php echo $airport->name?>" /></dd>

<dt>Country Name *</dt>
<dd><input id="airportcountry" class="form-control" name="country" type="text" value="<?php echo $airport->country?>"  /></dd>

<dt>Latitude *</dt>
<dd><input id="airportlat" class="form-control" name="lat" type="text" value="<?php echo $airport->lat?>" /></dd>

<dt>Longitude *</dt>
<dd><input id="airportlong" class="form-control" name="lng" type="text" value="<?php echo $airport->lng?>" /></dd>

<dt>Chart Link</dt>
<dd><input id="chartlink" class="form-control" name="chartlink" type="text" value="<?php echo $airport->chartlink?>" /></dd>

<dt>Fuel Price *</dt>
<dd><input id="fuelprice" class="form-control" name="fuelprice" type="text" value="<?php echo $airport->fuelprice?>" />
<p>This is the price per <?php echo Config::Get('LIQUID_UNIT_NAMES', Config::Get('LiquidUnit'))?>. Leave blank or 0 (zero) to use the default value of <?php echo Config::Get('FUEL_DEFAULT_PRICE');?> (when live pricing is disabled).</p>
</dd>

<dt>Hub</dt>
<?php
	if($airport->hub == '1')
		$checked = 'checked ';
	else
		$checked = '';
?>
<dd><input name="hub" type="checkbox" value="true" <?php echo $checked?>/></dd>

<dt></dt>
<dd><input type="hidden" name="action" value="<?php echo $action?>" />
	<input type="submit" name="submit" class="btn btn-success" value="<?php echo $title?>" />
</dd>
</dl>
</form>