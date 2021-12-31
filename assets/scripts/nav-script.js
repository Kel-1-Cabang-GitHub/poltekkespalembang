const logo = document.querySelector("nav img");
const brand = document.querySelector("nav div.brand");
const nav_link = [logo, brand];
nav_link.forEach((el) => {
	el.addEventListener("click", () => {
		window.location = "<?= base_url() ?>";
	});
});
