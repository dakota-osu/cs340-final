
function create_nav_bar_at(node_id, current_page) {

	let content = [
		["Tournaments", "tournament.html"],
		["Games", "game.html"],
		["Character Stats", "character_stats.html"]
	];

	if(localStorage.getItem("logged_in") && localStorage.getItem("logged_in") === "true") {
		content.unshift(["Account", "account.html"]);
		content.push(["Logout", "logout.html"]);
	} else {
		content.push(["Login", "login.html"]);
	}

	let nav = document.getElementById(node_id);
	let ul  = document.createElement("ul");
	content.forEach(function(pair) {
		let li = document.createElement("li");
		if(pair[0] === current_page) {
			li.classList.add("active");
		}


		let a  = document.createElement("a");
		a.href = pair[1];
		a.innerHTML = pair[0];

		li.appendChild(a);
		ul.appendChild(li);
	});
	nav.appendChild(ul);
}



