const block = document.querySelector("div.block");
const block_info = document.querySelector("div.block-info");
const tombol_batal = document.querySelector("a.batal");
const tombol_close = document.querySelector("a#close-info");
const kotak_alert = document.querySelector("div.confirm-alert");
const kotak_alert_info = document.querySelector("div.info-alert");
const ubah = document.querySelector("a#ubah");

ubah.addEventListener("click", () => {
	block.classList.add("active");
	kotak_alert.classList.add("active");
});
tombol_batal.addEventListener("click", () => {
	kotak_alert.classList.remove("active");
	block.classList.remove("active");
});
if(tombol_close){
	tombol_close.addEventListener("click", () => {
		kotak_alert_info.classList.remove("active");
		block_info.classList.remove("active");
	});
}
