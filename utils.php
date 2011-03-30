<?php
/*
 * utils.php
 * 
 * Utility functions to be used through out Litter.
 *  
 * Litter is coded by Scott VonSchilling. He needs a job. If you like
 * what you see, please email scottvonschilling [at] gmail [dot] com.
 * 
 */
	require_once 'variables.php';
	
	
	//
	function encodeURL($url, $extraParams = "", $w3c = false){
		global $COOKIES, $CSS, $JS, $LITTER_ID, $BROWSER_NO_COOKIES;
		$url .= "?"; 
		if (isset($BROWSER_NO_COOKIES) || $COOKIES == FALSE){
			$url .= "ck=".((isset($BROWSER_NO_COOKIES)) ? '-1' : '1');
			$url .= "&css=".(($CSS) ? '1' : '0');
			$url .= "&js=".(($JS) ? '1' : '0');
			if ($LITTER_ID != "null")
				$url .= "&id=".$LITTER_ID;
			if ($extraParams != "")
				$url .= "&";
		}
		$url .= $extraParams;
		if ($w3c)
			$url = str_replace("&","&amp;", $url);
		return $url;
	}
	
	// Output string with significant spacing. 
	function debug($s) {
		echo('<br/>************<br/>
		      '.$s.'<br/>
		      ************<br/>');
	}
	
	// Open MySQL database
	function openSQL(){
		global $DB_URL, $DB_USERNAME, $DB_PASSWORD;
		$sql = mysql_connect($DB_URL, $DB_USERNAME, $DB_PASSWORD) OR DIE ('Unable to connect to database! Please try again later.');
		return $sql;
	}
	
	// Makes string safe to be sent to MySQL
	function sqlSafe($str) {
		$output = '';
		
		for ($c = 0; $c < strlen($str); ++$c) {
			if (($str[$c]=='\\') || ($str[$c]=="'"))
				$output.='\\';
			$output.=$str[$c];
		}
		
		return $output;
	}
	
?>