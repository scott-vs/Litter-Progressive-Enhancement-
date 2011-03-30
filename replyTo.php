<?php 
/*
 * replyTo.php
 * 
 * .
 *  
 * Litter is coded by Scott VonSchilling. He needs a job. If you like
 * what you see, please email scottvonschilling [at] gmail [dot] com.
 * 
 */
	$title = "Reply To";
	require 'pages/header.php'; 
	require 'pages/id_tag.php';
	
	
?>

<div id="replyTo">

<?php 

	if (!$sql){
		$sql = openSQL();
		mysql_select_db("litter", $sql);
	}
		
	$littTbl = "litt_".$LITTER_ID;
	$userTbl = "users_".$LITTER_ID;
		
	$q ="SELECT * FROM $littTbl, $userTbl WHERE $littTbl.user_id = $userTbl.user_id AND $littTbl.litt_id = ".$_GET['rid'];
	$result = mysql_query($q,$sql);
	$row = mysql_fetch_array($result);

	echo("<img src='".$row["image_URL"]."'  alt='' /> ".$row["text"]);
?>

	<form id="new_litt_form" action="<?php echo(encodeURL('newLitt.php','',true)); ?>" method="post">
		<p>
	 		<textarea id="txt_box" name="text" rows="2" cols="20" >@<?php echo($row["user_name"]); ?></textarea> <br/>
		   	<span id="tiny_text"></span>
		   	<input name="reply" type="hidden" value="l<?php echo($_GET['rid']);?>" />
			<input id="new_litt" type="submit" value="Reply" />
			<a href="<?php echo(encodeURL('./index.php','',true));?>">cancel</a>
		</p>
	</form>

   
</div>
 
<?php require 'pages/footer.php'; ?>