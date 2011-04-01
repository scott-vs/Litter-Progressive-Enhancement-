<?php
/*
 * index.php
 * 
 * The launching pad of the Litter front end.
 *  
 * Litter is coded by Scott VonSchilling. He needs a job. If you like
 * what you see, please email scottvonschilling [at] gmail [dot] com.
 * 
 */
 require_once 'variables.php';
 require_once 'utils.php';

// Toggle Progressive Enhancement elements
if (isset($_GET["toggle"])){
	$t = strtoupper($_GET["toggle"]);
	$$t = !($$t);
	$x = ($$t == true) ? 1 : 0;
	setcookie(strtolower($t) , $x);
	
	header( 'Location: '.encodeURL('./index.php') ) ;
}

if (isset($_GET['setup'])){
	require_once 'createNewSession.php';
}

if (isset($_GET['login'])){
	$sql = openSQL();
	mysql_select_db("litter", $sql);
	$id = $_POST['id_number'];
	
	$q = "SELECT * FROM tolkens WHERE litter_id = $id";
	$result = mysql_query($q,$sql);
	if (mysql_num_rows($result) != 0)
		$LITTER_ID =$id;
	mysql_close($sql);
}



if($LITTER_ID != "null"){
	if ($COOKIES == false)
		$mess = 'Your demo will end when you leave the site.';
	require_once 'pages/home.php';
}else if (isset($_GET["check"])){
	if (!isset($_COOKIE['test']))
		$BROWSER_NO_COOKIES = true;
	require_once 'pages/welcome.php';
}else {
	setcookie("test",1);
	header( 'Location: '.encodeURL('./index.php','check=true') ) ;
}
	

?>