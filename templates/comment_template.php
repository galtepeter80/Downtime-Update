

	<form action="comment_go.php" method="post">
		<fieldset>	
		
        <div class="comment">
			Your character's name (PC or NPC): 
            <textarea class="forms" name="character" placeholder="Character Name" type="text"></textarea>
        </div>
		<br>
        <div class="comment">
			Write any in-character (speech) comments here: (8000 char max)
            <textarea id="ic_form" name="ic_comment" placeholder="In-Character Comments" type="text"></textarea>
        </div>
		<br>
		<div class="comment">
			Write any out-of-character comments here: (8000 char max)
            <textarea id="ooc_form" name="ooc_comment" placeholder="Out-of-Character Comments" type="text"></textarea>
        </div>
		<Br>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Submit!</button>
        </div>
		</fieldset>
		
	</form>
	
	<div>
		<img alt="Divider" class="div_middle" src="../public/images/divider.png"/>
	</div>
	
	<p>Care to roll some dice? Use the following dice-roller to automatically add your rolls to the out-of-character comments. </p>
	
	
	<! adds selector buttons for dice / simple total >
	<p>Enter the following information to roll a simple total: </p>
		
	<script>quantities(10);</script>
	D
	<select id="dice_sides">
		<option value="4">Four-Sided</option>
		<option value="6">Six-Sided</option>
		<option value="8">Eight-Sided</option>
		<option value="10">Ten-Sided</option>
		<option value="12">Twelve-Sided</option>
		<option value="20">Twenty-Sided</option>
	</select>
	+
	<script>bonuses(20);</script>
	-
	<script>penalties(20);</script>
	
	<button onclick="roll_total()">Roll!</button><br>
	
		
	
	<! adds extra buttons for hits test>
	
	<p>(OPTIONAL) or add a TARGET NUMBER for a Hits / Successes test)</p>
	
	<p>Target: <script>target_numbers(10);</script>
	
	<button onclick="roll_hits()">Roll!</button></p>
	
	
	
	

	