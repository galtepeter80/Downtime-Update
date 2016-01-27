<?php
	//echo "this is something here";
?>

<div class="intro">
Please Log In. 
<br><br>
You know how this works. 
<br><br>

<form action="login.php" method="post">
    <fieldset>	
        <div class="form-group">
			Your username: 
            <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
		<br>
        <div class="form-group">
			Your password: 
            <input class="form-control" name="userpass" placeholder="Password" type="password"/>
        </div>
		<br>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Log In</button>
        </div>
    </fieldset>
</form>
