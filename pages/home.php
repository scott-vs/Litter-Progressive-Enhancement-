<?php 
/*
 * home.php
 * 
 * The main page of Litter that displays most recently made litts.
 * 
 * Litter is coded by Scott VonSchilling. He needs a job. If you like
 * what you see, please email scottvonschilling [at] gmail [dot] com.
 * 
 */

	require_once 'variables.php';
	require_once 'classes/Litt.php';
	require 'demoScript.php';
    $title = "Litter Home Page";
	require 'pages/header.php';
	require_once 'utils.php';
	
	$sql = openSQL();
	mysql_select_db("litter", $sql);
?>
	
	<?php require 'pages/id_tag.php'; ?>
	<div id="side_bar"> 
	<!-- &&&&&& add in JS  
    	<div id="user_pane"> 
    		<?php echo($me->printUserPane()); ?>
    	</div>
    	<div id="user_list"> 
    		<?php require_once 'pages/topUsers.php';?>
    	</div>
    -->
    </div>
    <div id="home">
	    <div id="the_scoop">
		    <h2>What's the scoop?</h2>
		    <!-- &&&&&  add in js <div id="reply_to" class="hidden_info"></div> -->
		    <form id="new_litt_form" action="<?php echo(encodeURL('newLitt.php','',true)); ?>" method="post">
		    	<p>
		    		<textarea id="txt_box" name="text" rows="2" cols="20" ></textarea> <br/>
		    		<span id="tiny_text"><!-- &&&&&& add in JS 140 characters left. --></span>
		   			<input id="new_litt" type="submit" value="Litt it!" />
		   		</p>
		    </form>
		    <br/>
	    </div>
	    <div id="litt_space">
	    <?php 

	   		$litt = "litt_".$LITTER_ID;
	   		$user = "users_".$LITTER_ID;
	   		$num = 0;
	   		if (isset($_GET['start']))
	   			$num = $_GET['start'];
	   		$result = mysql_query("SELECT * FROM $litt, $user WHERE $litt.user_id = $user.user_id ORDER BY litt_id DESC LIMIT $num, 20", $sql);
			$isFirst = TRUE;
	   		while ($row = mysql_fetch_array($result)) {
	   			$l = Litt::importFromDB($row);
	   			if ($isFirst){
	   				$littID = $l->getID();
	   				$topID = $littID;
	   				// &&&&&&& add in JS echo("<div id='top_litt' class='hidden_info' >$littID</div>");
	   				$isFirst = FALSE;
	   			}
				echo($l->printLitt());
			}
			$littID = $l->getID();
			// &&&&&&& echo("<div id='bottom_litt' class='hidden_info'>$littID</div>");
	    ?>
	    </div>
	    <?php 
	    	if ($num >= 20)
	    		echo('<a id="loadPrev" href="'.encodeURL('index.php', 'start='.($num - 20), true).'">Load Previous 20</a> | ');
	 
	    ?>
	    <a id="loadNext" href="<?php echo(encodeURL('index.php', 'start='.($num + 20), true));?>"><!-- &&&&& fix in JS Load Next 10 -->Load Next 20</a>
   	</div>
   	
<?php require 'pages/footer.php'; ?>
