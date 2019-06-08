
function normalize_string(string) {
	let result = string.replace("_", " ");
	result = result.toLowerCase()
		.split(' ')
		.map((s) => s.charAt(0).toUpperCase() + s.substring(1))
		.join(' ');

	return result;
}

function create_tournament_card(tournament) {

	let card = document.createElement("div");
	card.classList.add("card");

	let span = document.createElement("span");
	span.classList.add("card-header");
	span.innerHTML = tournament['name'];

	card.appendChild(span);

	Object.keys(tournament).forEach(function(key) {
		if(key !== "name") {
			let card_content = document.createElement("div");
			card_content.classList.add("card-content");

			let card_content_title = document.createElement("span");
			card_content_title.classList.add("card-content-title");
			card_content_title.innerHTML = normalize_string(key);

			let card_content_subtitle = document.createElement("span");
			card_content_subtitle.classList.add("card-content-subtitle");
			card_content_subtitle.innerHTML = tournament[key];


			card_content.appendChild(card_content_title);
			card_content.appendChild(card_content_subtitle);

			card.appendChild(card_content);
		}
	});

	let card_footer = document.createElement("div");
	card_footer.classList.add("card-footer");

	let card_footer_action = document.createElement("button");
	card_footer_action.classList.add("card-footer-action");
	card_footer_action.innerHTML = "Go To Tournament";

	// add the function to navigate to the specific function

	card_footer.appendChild(card_footer_action);

	card.appendChild(card_footer);

	return card;
}
