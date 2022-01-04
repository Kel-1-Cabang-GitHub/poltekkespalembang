// link di navbar
const logo = document.querySelector("nav img");
const brand = document.querySelector("nav div.brand");
const target = brand.id;
const nav_link = [logo, brand];
nav_link.forEach((el) => {
	el.addEventListener("click", () => {
		window.location = target;
	});
});

// Scroll ke atas button
$(window).scroll(function () {
	let wscroll = $(this).scrollTop();
	(wscroll > 150) ? $("div.scroll").addClass("show") : $("div.scroll").removeClass("show");
});
$(".scroll").on("click", function () {
	let destination = $("div.data");
	let destinationEl = $(destination);

	$("html").animate(
		{
			scrollTop: destinationEl.offset().top - 50,
		},
		1000,
		"swing"
	);

	event.preventDefault();
});
