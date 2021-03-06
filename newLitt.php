<?php
/*
 * newLitt.php
 * 
 * AJAX call to add a new litt from logged in user.
 *  
 * Litter is coded by Scott VonSchilling. He needs a job. If you like
 * what you see, please email scottvonschilling [at] gmail [dot] com.
 * 
 */

	require_once 'utils.php';
	require_once 'classes/Litt.php';
	require_once 'variables.php';
	
	$return;
	$return->status = "ok";
	($_POST["reply"]) ? $replyTo = new BigInt(substr($_POST["reply"], 1)) : $replyTo = 0;
	
	$me = new User($LITTER_ID);
	$me->loadInfoFromDB();
	
	$newlitt = Litt::createNewLitt($me, $_POST["text"], $replyTo);
	$newlitt->saveToMasterDB($sql,$LITTER_ID);
	$return->id = encodeURL('getLitts.php','before='.$newlitt->getID());
	$return->text = $newlitt->printLitt();
	
	if (isset($_POST['ajax']))
		echo(json_encode($return));
	else 
		header( 'Location: '.encodeURL('./index.php') ) ;

?>