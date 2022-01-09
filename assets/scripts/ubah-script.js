const block = document.querySelector("div.block");
const tombol_batal = document.querySelector("a.batal");
const kotak_alert = document.querySelector("div.confirm-alert");
const ubah = document.querySelector("a#ubah");

ubah.addEventListener("click", () => {
	block.classList.add("active");
	kotak_alert.classList.add("active");
});
tombol_batal.addEventListener("click", () => {
	kotak_alert.classList.remove("active");
	block.classList.remove("active");
});
