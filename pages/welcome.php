<?php 
/*
 * welcome.php
 * 
 * The slash screen the user first enounters when loading Litter.
 * 
 * Litter is coded by Scott VonSchilling. He needs a job. If you like
 * what you see, please email scottvonschilling [at] gmail [dot] com.
 * 
 */
	require 'pages/header.php';
	require_once 'variables.php';
	
	
?>
<div id="welcome">
    <h2>Welcome to Litter!</h2>
    
	<img src="./images/thisisyou.png" id="thisIsYou" width="200" alt="You are my cat Tiger." /><p><strong>Litter</strong> is the hottest new <strong>micro-blogging service</strong> for cats all over the world. Find a new <strong>sunny spot</strong> in the living room? Finally <strong>catch that mouse</strong> you've been after? Eating a particularly <strong>tasty tuna</strong> tonight? Tell it to all your furry friends in little <strong>140 character</strong> sized updates called <strong>Litts</strong>.</p>
	<p>In this demo, you will be playing the role of Scott VonSchilling's curious tabby cat <strong>Tiger</strong>, aka Wild_Tiger. <strong>Litt out</strong> anything that's on your mind. <strong>Reply</strong> to other cats' litts. Change your <strong>settings</strong>. And stick around to see if your friend <strong>Mimi</strong> replies to any of your litts.</p>
	<p>This demo is set up from scratch specifically for you, so <strong>play around</strong> with it as much as you like. No one else will be able to see what you write, and everything will be <strong>automatically deleted</strong> off my database after two hours, or after you sign off of Litter.</p>
	<p>And of course, feel free to <strong>download</strong> the complete source code <a href="<?php echo($SRC_URL);?>">here</a>.</p>
	<div id="setup_litter">
		<form action="<?php echo(encodeURL('index.php','login=true',true));?>" method="post">
			<p>ID Number:
			<input id='id_number' name='id_number' type="text" />
			<input type="submit" value="login" />
			</p>
		</form>
		<p>No ID? <a href="<?php echo(encodeURL('./index.php',"setup=true", true));?>">Click here to set up Litter</a> 
		</p>
	</div>
</div>
 
<?php require 'pages/footer.php'; ?>
