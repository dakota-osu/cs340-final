function create_card_content(title, subtitle) {
	let div = document.createElement("div");
	div.classList.add("card-content");

	let card_title = document.createElement("span");
	card_title.classList.add("card-content-title");
	card_title.innerHTML = title;

	let card_subtitle = document.createElement("span");
	card_subtitle.classList.add("card-content-subtitle");
	card_subtitle.innerHTML = subtitle;

	div.appendChild(card_title);
	div.appendChild(card_subtitle);

	return div;
}

function create_character_card(character) {
	let card = document.createElement("div");
	card.classList.add("card");

	let card_header = document.createElement("span");
	card_header.classList.add("card-header");

	let card_header_img = document.createElement("img");
	card_header_img.classList.add("card-header-img");
	card_header_img.src = "https://web.engr.oregonstate.edu/~altond" + character["pic_url"];

	card_header.appendChild(card_header_img);
	
	let card_content1 = create_card_content(character["id"], character["game"]);
	let card_content2 = create_card_content("Pick Rate", character["pick_rate"])

	card.appendChild(card_header);
	card.appendChild(card_content1);
	card.appendChild(card_content2);

	return card;
}
