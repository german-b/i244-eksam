<?php
	
	$file = "comms.txt";

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$comment = ($_POST["comment"]);

		//Kasutatud http://www.w3schools.com/php/php_form_validation.asp abi
		$comment = trim($comment);
		$comment = stripslashes($comment);
		$comment = htmlspecialchars($comment);
		$comment = $comment . "\n";

		$openFile = fopen($file, 'a');

		$addComment = fwrite($openFile, $comment);
		if ($addComment){
			$commentAdded = "Kommentaar lisatud!";
			
		}
		fclose($openFile);
	}
	
?>
<html>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link href="./style.css" rel="stylesheet">
  <head>
    <title>Kommid</title>
    </head>

  <body>
  	<div id="wrap">
  	<h1>Kommentaarid:</h1>
  		<div id="comments">
  		<?php
  		if (isset($commentAdded)) {
  			echo "<span>" . $commentAdded . "</span>";
  		};
  		
  		$readFile = fopen($file,"r");
		while(! feof($readFile)){
			echo "<div class=\"comment\">";		
			echo fgets($readFile);
			echo "</div>";	
		}
  		?>
  		</div>
  		<div id="form">
  			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
  				<span>Sinu kommentaar:</span>
  				<input type="text" name="comment" maxlength="140">
  				<input type="submit" name="submit" value="Kommenteeri">
  			</form>
  		</div>
  	</div>
  </body>