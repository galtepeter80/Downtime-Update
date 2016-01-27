<?php

// included files
require("../includes/config.php");

// explode values from post for auto-population
list($num, $char, $ic, $ooc) = explode("_", $_POST['comment'], 4);

// track the comment number
$_SESSION["num"] = $num;

// spawn header
require("../templates/header.php");

// auto-populate the text area fields for editing
?>

<form action="comment_edit.php" method="post">
	<fieldset>	
	
	<div class="comment">
		Your character's name (PC or NPC): 
		<textarea class="forms" name="character"  type="text"><?php echo $char ?></textarea>
	</div>
	<br>
	<div class="comment">
		Write any in-character (speech) comments here: (8000 char max)
		<textarea id="ic_form" name="ic_comment"  type="text"><?php echo $ic ?></textarea>
	</div>
	<br>
	<div class="comment">
		Write any out-of-character comments here: (8000 char max)
		<textarea id="ooc_form" name="ooc_comment"  type="text"><?php echo $ooc ?></textarea>
	</div>
	<Br>
	<div class="form-group">
		<button type="submit" class="btn btn-default">Submit!</button>
	</div>
	</fieldset>
</form>

<?php

// spawn footer
require("../templates/footer.php");




?>