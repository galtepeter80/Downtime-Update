// rolls a set number and type of dice, then returns result string
function roll_total() {
	var num = document.getElementById("dice_number").value;
	var sides = document.getElementById("dice_sides").value;
	var bonuses = document.getElementById("dice_bonuses").value;
	var penalties = document.getElementById("dice_penalties").value;
	var total = 0 + bonuses - penalties;
	
	dice_string = (num + "D" + sides + " = ( ");
				
	for (i = 0; i < num; i++) {
		var roll = Math.floor((Math.random() * sides) + 1);
		total += roll;
		dice_string += (roll + " ");
	}
	
	dice_string += (") ");
	
	if (bonuses != 0) {
		dice_string += ("+ " + bonuses + " ");
	}
	if (penalties != 0) {
		dice_string += ("- " + penalties);
	}
	
	dice_string += (" Total: " + total);

	document.getElementById("ooc_form").innerHTML += (" --Result: " + dice_string);
}

function roll_hits() {
	var num = document.getElementById("dice_number").value;
	var sides = document.getElementById("dice_sides").value;
	var bonuses = document.getElementById("dice_bonuses").value;
	var penalties = document.getElementById("dice_penalties").value;
	var target = document.getElementById("target_number").value;
	var modified_roll = 0;
	var hits = 0;
	
	dice_string = (num + "D" + sides + " = ( ");
				
	for (i = 0; i < num; i++) {
		var roll = Math.floor((Math.random() * sides) + 1);
		modified_roll = ((roll + parseInt(bonuses)) - parseInt(penalties));
		if (modified_roll >= target) {
			hits++;
		}
		dice_string += (roll + "(" + modified_roll + ") ");
	}
	
	dice_string += (") ");
	
	
	dice_string += (" Hits: " + hits);

	document.getElementById("ooc_form").innerHTML += (" --Result: " + dice_string);
}

// adds an extraneous paragraph node
function addpara() {
	var ptags = document.createElement("P");
	var text = document.createTextNode("and then... ");
	ptags.appendChild(text);
	document.body.appendChild(ptags);
}		

// iterates a series of dice selectors for different quantities
function quantities(n) {
	document.write("<select id='dice_number'>");
	for (var i = 1; i <= n; i++) {
		document.write("<option value=" + i + ">" + i + "</option>");
	}
	document.write("</select>");
}

// iterates a series of selectors for different target numbers
function target_numbers(n) {
	document.write("<select id='target_number'>");
	for (var i = 1; i <= n; i++) {
		document.write("<option value=" + i + ">" + i + "</option>");
	}
	document.write("</select>");
}

// adds options for bonuses to dice roll
function bonuses(n) {
	document.write("<select id='dice_bonuses'>");
	for (var i = 0; i <= n; i++) {
		document.write("<option value=" + i + ">" + i + "</option>");
	}
	document.write("</select>");
}

function penalties(n) {
	document.write("<select id='dice_penalties'>");
	for (var i = 0; i <= n; i++) {
		document.write("<option value=" + i + ">" + i + "</option>");
	}
	document.write("</select>");
}