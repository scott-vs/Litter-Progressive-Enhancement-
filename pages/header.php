<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
	<title><?php echo($title ? $title : "Litter");?></title>
	<?php 
		require_once 'variables.php';
		if ($JS) 
			echo('<script src="js/jquery-1.5.1.min.js"></script>
				  <script src="js/litter.js"></script>');
		if ($CSS)
			echo('<link type="text/css" rel="stylesheet" href="css/litter.css" /> ');
	
	?>
</head>
<body>
<div id="ph_bar">
	<?php 
		require_once 'utils.php';
	  echo($mess.'<br/>');
	  if (isset($BROWSER_NO_COOKIES))
	  	echo ("cookies disabled | ");
	  else {
	 	 echo('<a href="'.encodeURL('./index.php', 'toggle=cookies', true).'"> turn ');
	 	 if ($COOKIES == TRUE)
		  	echo('off');
		  else
		  	echo('on');
		  echo(' cookies</a> | ');
	  }
	  echo('<a href="'.encodeURL('./index.php', 'toggle=js', true).'">turn ');
	  if ($JS == TRUE)
	  	echo('off');
	  else
	  	echo('on');
	  echo(' JavaScript</a> | ');
	  echo('<a href="'.encodeURL('./index.php', 'toggle=css', true).'">turn ');
	  if ($CSS == TRUE)
	  	echo('off');
	  else
	  	echo('on');
	  echo(' CSS</a>');
	?>
</div>