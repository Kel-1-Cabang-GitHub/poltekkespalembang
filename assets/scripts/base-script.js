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

// Hapus Prodi Pilihan 1 di Prodi Pilihan 2 jika Prodi Pilihan 1 sudah diisi
const prodi_pilihan_1 = document.querySelector(
	"select.program_studi_pilihan_1"
);
const prodi_pilihan_2 = document.querySelector(
	"select.program_studi_pilihan_2"
);

// Scroll ke atas button
$(window).scroll(function () {
	let wscroll = $(this).scrollTop();
	wscroll > 150
		? $("div.scroll").addClass("show")
		: $("div.scroll").removeClass("show");
});
$(".scroll").on("click", function () {
	let destination = $("header");
	let destinationEl = $(destination);

	$("html").animate(
		{
			scrollTop: destinationEl.offset().top,
		},
		1000,
		"swing"
	);

	event.preventDefault();
});
