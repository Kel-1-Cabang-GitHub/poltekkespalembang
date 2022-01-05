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
		let nisn = link.split('/')[link.split('/').length - 1].replace(/\D+/, '');
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

// Modal Detail Data
const tombol_detail = document.querySelectorAll("a.detail-data");
const div_detail = document.querySelector("div.detail-pendaftar");
let detail_img = document.querySelector("img#detail-foto");
const div_data_detail = document.querySelector("div.data-detail");
// const bukti_bayar = document.querySelector("a#bukti_pembayaran");
// let href_awal = bukti_bayar.href;
let src_awal = detail_img.src;
const span_detail = document.querySelectorAll("span.detail");
const BULAN = [
	'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
	'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
];
tombol_detail.forEach(el => {
	el.addEventListener("click", () => {
		block.classList.add("active");
		div_detail.classList.add("active");
		let detail_data = data_obj[el.id];
		Object.keys(detail_data).forEach(keys => {
			if (keys === "pas_foto") {
				let src = src_awal + detail_data[keys];
				detail_img.src = src;
			}
			let span_keys = document.querySelector(`span#${keys}`);
			if (span_keys) {
				let value = detail_data[keys];
				if (keys === "berat_badan") value = value + " kg";
				if (keys === "tinggi_badan") value = value + " cm";
				if (keys === "tanggal_lahir") {
					let [tahun, bulan, tanggal] = detail_data[keys].split("-");
					value = `${tanggal} ${BULAN[bulan - 1]} ${tahun}`;
				}
				span_keys.textContent = (value) ? value : "-";
			};
		});
		div_data_detail.scrollTop = 0;
	});
});

//Tutup Modal
const tombol_close = document.querySelector('div.close-btn a.detail');
tombol_close.addEventListener("click", () => {
	div_detail.classList.remove("active");
	block.classList.remove("active");
});
