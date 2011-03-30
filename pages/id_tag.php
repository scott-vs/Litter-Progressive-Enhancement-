<?php 
/*
 * id_tag.php
 * 
 * Part of the main / settings page that identifies the logged in user.
 * 
 * Litter is coded by Scott VonSchilling. He needs a job. If you like
 * what you see, please email scottvonschilling [at] gmail [dot] com.
 * 
 */
	require_once 'utils.php';
   	require_once 'classes/Litt.php';
   	require_once 'variables.php';
   	
   	if (!$sql){
   		$sql = openSQL();
   		mysql_select_db("litter", $sql);
   	}
 
   	$me = new User($LITTER_ID);
    $me->loadInfoFromDB();
    
    $myName = $me->getRealName();
	$myImage = $me->getLargeImageUrl();
?>

<div id="id_tag">
	<p><img src="<?php echo($myImage);?>" width="50" alt="user picture" /> 
	Welcome back to Litter, <?php echo($myName);?>!<br />
	<a href="<?php echo(encodeURL('./settings.php', '', true));?>">Settings</a> | <a href="./signOut.php" id="signMeOff">Sign Out</a></p>
</div>