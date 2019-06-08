function create_bracket(matches) {

	let round_map = {};

	matches.forEach(function(match) {
		console.log(match["round"]);
		if(!(match["round"] in round_map)) {
			round_map[match["round"]] = [match];
		} else {
			round_map[match["round"]].push(match);
		}
	});

	let bracket = document.createElement("div");

	Object.keys(round_map).forEach(function(round) {
		

		let ul = document.createElement("ul");
		ul.classList.add("round");

		round_map[round].forEach(function(match) {
						
			let li1 = document.createElement("li");
			li1.classList.add("match");
			li1.classList.add("player-one");
			li1.innerHTML = match["player_one"];
			
			let match_spacer = document.createElement("li");
			match_spacer.classList.add("match");
			match_spacer.classList.add("match-spacer");
			match_spacer.innerHTML = "&nbsp;";

			let li2 = document.createElement("li");
			li2.classList.add("match");
			li2.classList.add("player-two");
			li2.innerHTML = match["player_two"];
	
			let spacer = document.createElement("li");
			spacer.classList.add("spacer");
			spacer.innerHTML = "&nbsp;";

			if(match["victor"]) {
				if(match["victor"] === match["player_one"]) {
					li1.classList.add("winner");	
				} else if(match["victor"] === match["player_two"]) {
					li2.classList.add("winner");
				}
			}

			ul.appendChild(spacer);
			ul.appendChild(li1);
			ul.appendChild(match_spacer);
			ul.appendChild(li2);
		});

		let spacer = document.createElement("li");
		spacer.classList.add("spacer");
		spacer.innerHTML = "&nbsp;";

		ul.appendChild(spacer);

		bracket.appendChild(ul);
	});

	bracket.classList.add("bracket");
	return bracket;
}
