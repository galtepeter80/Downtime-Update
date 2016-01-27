<?php


?>
	
<div class="intro">

Go ahead and register for Downtime. It doesn't hurt. You'll need to be able to log in before you can edit any storylines. 
<br><br>

<form action="register.php" method="post">
    <fieldset>
		<div class="form-group">
			Your name:
            <input autofocus class="form-control" name="realname" placeholder="~Real Name" type="text"/>
        </div>
		<br>
		<div class="form-group">
			Your email: 
            <input autofocus class="form-control" name="email" placeholder="email" type="text"/>
        </div>
		<Br>
        <div class="form-group">
			Pick a username: 
            <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
		<br>
        <div class="form-group">
			Password: 
            <input class="form-control" name="userpass" placeholder="Password" type="password"/>
        </div>
		<br>
		<div class="form-group">
		Confirm password: 
            <input class="form-control" name="confirmation" placeholder="Confirm Password" type="password"/>
        </div>
		<br>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Register</button>
        </div>
    </fieldset>
</form>

</div>
