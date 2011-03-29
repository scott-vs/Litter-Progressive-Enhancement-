<?php
/*
 * variables.php
 * 
 * Your one-stop shop for all system configurations and large lists
 * of strings.
 * 
 * Litter is coded by Scott VonSchilling. He needs a job. If you like
 * what you see, please email scottvonschilling [at] gmail [dot] com.
 * 
 */

	// MySQL configurations
	$DB_URL = ':/Applications/MAMP/tmp/mysql/mysql.sock';
	$DB_USERNAME = 'root';
	$DB_PASSWORD = 'root';
	
	// Set global variables
	$COOKIES = "n";
	$CSS = "n";
	$JS = "n";
	$LITTER_ID = "n";
	
	if ($_GET['ck'] == -1) $BROWSER_NO_COOKIES = true;
	
	if (isset ($BROWSER_NO_COOKIES) || isset($_GET['ck'])) {
		$COOKIES = FALSE;
		$CSS = (isset($_GET['css'])) ? ($_GET['css'] == 1) : true;
	  	$JS = (isset($_GET['js'])) ? ($_GET['js'] == 1) : true;
	  	$LITTER_ID = (isset($_GET['id'])) ? $_GET['id'] : 'null';
	  	
	} else{
		$COOKIES = true;
		$CSS = (isset($_COOKIE['css'])) ? ($_COOKIE['css'] == 1) : true;
	  	$JS = (isset($_COOKIE['js'])) ? ($_COOKIE['js'] == 1) : true;
	  	$LITTER_ID = (isset($_COOKIE['litterID'])) ? $_COOKIE['litterID'] : 'null';
	}

	$COOKIES = false;
	$JS = false;
	$CSS = false;
	
	
	// Download link for code source.
	$SRC_URL = 'https://github.com/scott-vs/Litter-Progressive-Enhancement-';
	
	// Inital set of users to be imported from Twitter.
	$USER_LIST = array(	"sockington",
					   	"ceiling_cat",
						"MissKittyThing",
						"thesmerz",
						"mcthecat",
						"shelbythecat",
						"furryfluffyfab",
						"hooterthecat",
						"Boo_Biggins",
						"Gabby_da_Tabby",
						"Pandafur",
						"TuffyCat",
						"LibbyLibou",
						"iamtammycat",
						"toughteddybear",
						"sophiaredmoon",
						"StephenFrysCat",
						"Lucy_Cat",
						"BeaverWonderCat",
						"Vincentmycat",
						"pennycat",
						"PuffyandLily",
						"MightyMason",
						"flothecat",
						"mickeychat",
						"yogithecat",
						"MissGypsyKitty",
						"mishakidd",
						"Simchaonline"
						);
						
	// Favorite toys and spots to be randomly assigned to Litter users.
	$FAV_TOYS = array(	"catnip mouse",
					  	"cardboard boxes",
					  	"laser pointer",
						"ball of yarn",
						"power cords",
						"plastic bags",
						"jingle balls",
						"cat dancer"
						
					  );
	$FAV_SPOT = array(	"chair",
					  	"your lap",
						"clean laundry",
						"pillow",
						"laptop computer",
						"stack of towels"
					  );
	
					  
	// Messages to be randomly inserted by Mimi.
	$MIMI_THOUGHTS = array (	"I am Mimi. That is all that matters.",
							"A lot of cats on the internet have poor English. I pity those cats.",
							"Man, I'm tired! I only got 18 hours of sleep yesterday.",
							"Did I say meow? I meant feed me!"
					 );
					 
	$MIMI_REPLIES = array (	"God, do you ever stop talking?",
							"Hey, did you hear the food machine go off? I think it's time to eat!",
							"hiss...",
							"Hey, do you know when Scott will be back? I've got an itch that needs scratching."
					);
					  
	
?>