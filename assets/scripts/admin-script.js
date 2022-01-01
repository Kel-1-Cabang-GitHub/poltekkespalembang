const block = document.querySelector("div.block");
const ca_delete = document.querySelector("a#ca-delete");
const tombol_batal = document.querySelector("a.batal");
const kotak_alert = document.querySelector("div.confirm-alert");
const tombol_hapus1 = document.querySelectorAll("a.hapus-data");

tombol_hapus1.forEach(el => {
    el.addEventListener("click", () => {
        block.classList.add("active");
	    kotak_alert.classList.add("active");
        ca_delete.href = el.id;
    });
});
tombol_batal.addEventListener("click", () => {
	kotak_alert.classList.remove("active");
	block.classList.remove("active");
});