<?php defined("NET2FTP") or die("Direct access to this location is not allowed."); ?>
<!-- Template /skins/blue/statusbar.template.php begin -->
	<script type="text/javascript" src="skins/blue/status/status.js"></script>
	<div id="p_ba7428_progress" class="p_ba7428" style="height:0px;position:relative;z-index:5;width:100%;top:25px;background:transparent;">
		<table border="0" cellspacing="0" cellpadding="0" style="margin-left: auto; margin-right: auto;">
			<tr>
				<td class="progressBar">
					<div class="progressBarBorder">
					<div id="p_561b57_progressCell0I" class="cellI" style="position:absolute;top:2px;<?php echo __("left"); ?>:2px;">&nbsp;</div>
					<div id="p_561b57_progressCell1I" class="cellI" style="position:absolute;top:2px;<?php echo __("left"); ?>:19px;">&nbsp;</div>
					<div id="p_561b57_progressCell2I" class="cellI" style="position:absolute;top:2px;<?php echo __("left"); ?>:36px;">&nbsp;</div>
					<div id="p_561b57_progressCell3I" class="cellI" style="position:absolute;top:2px;<?php echo __("left"); ?>:53px;">&nbsp;</div>
					<div id="p_561b57_progressCell4I" class="cellI" style="position:absolute;top:2px;<?php echo __("left"); ?>:70px;">&nbsp;</div>
					<div id="p_561b57_progressCell5I" class="cellI" style="position:absolute;top:2px;<?php echo __("left"); ?>:87px;">&nbsp;</div>
					<div id="p_561b57_progressCell6I" class="cellI" style="position:absolute;top:2px;<?php echo __("left"); ?>:104px;">&nbsp;</div>
					<div id="p_561b57_progressCell7I" class="cellI" style="position:absolute;top:2px;<?php echo __("left"); ?>:121px;">&nbsp;</div>
					<div id="p_561b57_progressCell8I" class="cellI" style="position:absolute;top:2px;<?php echo __("left"); ?>:138px;">&nbsp;</div>
					<div id="p_561b57_progressCell9I" class="cellI" style="position:absolute;top:2px;<?php echo __("left"); ?>:155px;">&nbsp;</div>
					<div id="p_561b57_progressCell0A" class="cellA" style="position:absolute;top:2px;<?php echo __("left"); ?>:2px;">&nbsp;</div>
					<div id="p_561b57_progressCell1A" class="cellA" style="position:absolute;top:2px;<?php echo __("left"); ?>:19px;">&nbsp;</div>
					<div id="p_561b57_progressCell2A" class="cellA" style="position:absolute;top:2px;<?php echo __("left"); ?>:36px;">&nbsp;</div>
					<div id="p_561b57_progressCell3A" class="cellA" style="position:absolute;top:2px;<?php echo __("left"); ?>:53px;">&nbsp;</div>
					<div id="p_561b57_progressCell4A" class="cellA" style="position:absolute;top:2px;<?php echo __("left"); ?>:70px;">&nbsp;</div>
					<div id="p_561b57_progressCell5A" class="cellA" style="position:absolute;top:2px;<?php echo __("left"); ?>:87px;">&nbsp;</div>
					<div id="p_561b57_progressCell6A" class="cellA" style="position:absolute;top:2px;<?php echo __("left"); ?>:104px;">&nbsp;</div>
					<div id="p_561b57_progressCell7A" class="cellA" style="position:absolute;top:2px;<?php echo __("left"); ?>:121px;">&nbsp;</div>
					<div id="p_561b57_progressCell8A" class="cellA" style="position:absolute;top:2px;<?php echo __("left"); ?>:138px;">&nbsp;</div>
					<div id="p_561b57_progressCell9A" class="cellA" style="position:absolute;top:2px;<?php echo __("left"); ?>:155px;">&nbsp;</div>
					</div>
				</td>
				<td class="installationProgress" id="p_561b57_installationProgress">
				</td>
			</tr>
		</table>
	</div>
	<div style="float: right; text-align: left;">
		<form id="StatusbarForm" method="post" action="<?php echo $net2ftp_globals["action_url"]; ?>">
		<span style="color:black;font-family: 'Trebuchet MS', 'Lucida Grande', Verdana, Arial, Sans-Serif; text-align: <?php echo __("right"); ?>; font-size: 2em;"><?php echo $net2ftp_globals["ftpserver"]; ?></span><br />
<?php			printLoginInfo(); ?>
		<input type="hidden" name="state"     value="browse" />
		<input type="hidden" name="state2"    value="main" />
		<input type="hidden" name="directory" value="<?php echo $net2ftp_globals["directory_html"]; ?>" />
		<input type="hidden" name="url"       value="<?php echo printPHP_SELF("bookmark"); ?>" />
		<input type="hidden" name="text"      value="net2ftp <?php echo $net2ftp_globals["ftpserver"]; ?>" />
<?php			if ($net2ftp_globals["state"] != "bookmark") { printActionIcon("bookmark", "document.forms['StatusbarForm'].state.value='bookmark';document.forms['StatusbarForm'].submit();"); } ?>
<?php			printActionIcon("logout",   "document.forms['StatusbarForm'].state.value='logout';document.forms['StatusbarForm'].submit();"); ?>
		</form>
	</div>
<!-- Template /skins/blue/statusbar.template.php end -->
