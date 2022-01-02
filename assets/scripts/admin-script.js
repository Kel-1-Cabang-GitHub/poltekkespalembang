const block = document.querySelector("div.block");
const ca_delete = document.querySelector("a#ca-delete");
const tombol_batal = document.querySelector("a.batal");
const kotak_alert = document.querySelector("div.confirm-alert");
const tombol_hapus1 = document.querySelectorAll("a.hapus-data");

tombol_hapus1.forEach(el => {
	el.addEventListener("click", () => {
		block.classList.add("active");
		kotak_alert.classList.add("active");
		let id = el.id;
		let nama_lengkap = id.split(" ").slice(1).join(" ");
		let link = id.split(" ")[0];
		let nisn = link.split('/')[8].replace(/\D+$/, '');
		let span_nama = document.querySelector("span#ubah-nama");
		let span_nisn = document.querySelector("span#ubah-nisn");
		span_nama.textContent = nama_lengkap;
		span_nisn.textContent = nisn;
		ca_delete.href = link;
	});
});
tombol_batal.addEventListener("click", () => {
	kotak_alert.classList.remove("active");
	block.classList.remove("active");
});
