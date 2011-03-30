<?php
/*
 * topUsers.php
 * 
 * Box on the side of the main page that displays the top 20 users of
 * Litter.
 * 
 * Litter is coded by Scott VonSchilling. He needs a job. If you like
 * what you see, please email scottvonschilling [at] gmail [dot] com.
 * 
 */


if (!$sql){
	$sql = openSQL();
   	mysql_select_db("litter", $sql);
 }

$littTbl = "litt_".$LITTER_ID;
$userTbl = "users_".$LITTER_ID;
$q = "SELECT *, COUNT( DISTINCT litt_id ) AS ltts FROM $littTbl, $userTbl WHERE $littTbl.user_id = $userTbl.user_id GROUP BY $littTbl.user_id ORDER BY ltts DESC LIMIT 0, 20 ";
$result = mysql_query($q, $sql);

echo("<p>Top Users:<br/>");
$count = 0;
while ($row = mysql_fetch_array($result)){
	$u = User::importFromDB($row);
	
	echo("<span class='user_picture'><img src='".$u->getImageUrl()."' alt='someones picture'/><input type='hidden' value='".$u->getID()."' /></span>");
	$count++;
	if ($count % 4 == 0)
		echo("<br/>");
}
echo('<input id="ajax_getuserpane" type="hidden" value="'.encodeURL('getUserPane.php','',true).'" />');
echo('</p>');

?>