const block = document.querySelector("div.block");
const block_info = document.querySelector("div.block-info");
const ca_delete = document.querySelector("a#ca-delete");
const tombol_batal = document.querySelector("a.batal");
const close_info = document.querySelector("a#close-info");
const kotak_alert = document.querySelector("div.confirm-alert");
const tombol_hapus1 = document.querySelectorAll("a.hapus-data");
const kotak_alert_info = document.querySelector("div.info-alert");

tombol_hapus1.forEach((el) => {
	el.addEventListener("click", () => {
		block.classList.add("active");
		kotak_alert.classList.add("active");
		let id = el.id;
		let nama_lengkap = id.split(" ").slice(1).join(" ");
		let link = id.split(" ")[0];
		let nisn = link.split("/")[link.split("/").length - 1].replace(/\D+/, "");
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
if(close_info){
	close_info.addEventListener("click", () => {
		kotak_alert_info.classList.remove("active");
		block_info.classList.remove("active");
	});
}

// Modal Detail Data
const tombol_detail = document.querySelectorAll("a.detail-data");
const div_detail = document.querySelector("div.detail-pendaftar");
let detail_img = document.querySelector("img#detail-foto");
const div_data_detail = document.querySelector("div.data-detail");
const bukti_bayar = document.querySelector("a#bukti_pembayaran");
let href_awal_bukti_bayar = bukti_bayar.href;
const sktm = document.querySelector("a#surat_keterangan_miskin");
let href_awal_sktm = sktm.href;
const skpk = document.querySelector("a#surat_keterangan_penghasilan_keluarga");
let href_awal_skpk = skpk.href;
const foto_rumah = document.querySelector("a#foto_rumah");
let href_awal_foto_rumah = foto_rumah.href;
const prestasi_1 = document.querySelector("a#prestasi_1");
let href_awal_prestasi1 = prestasi_1.href;
const prestasi_2 = document.querySelector("a#prestasi_2");
let href_awal_prestasi2 = prestasi_2.href;
const prestasi_3 = document.querySelector("a#prestasi_3");
let href_awal_prestasi3 = prestasi_3.href;
const prestasi_4 = document.querySelector("a#prestasi_4");
let href_awal_prestasi4 = prestasi_4.href;
const prestasi_5 = document.querySelector("a#prestasi_5");
let href_awal_prestasi5 = prestasi_5.href;
let src_awal = detail_img.src;
const span_detail = document.querySelectorAll("span.detail");
const section_opt = document.querySelector("section.optional");
const BULAN = [
	"Januari",
	"Februari",
	"Maret",
	"April",
	"Mei",
	"Juni",
	"Juli",
	"Agustus",
	"September",
	"Oktober",
	"November",
	"Desember",
];
tombol_detail.forEach((el) => {
	el.addEventListener("click", () => {
		block.classList.add("active");
		div_detail.classList.add("active");
		let detail_data = data_obj[el.id];
		Object.keys(detail_data).forEach((keys) => {
			if (keys === "pas_foto") {
				let src = src_awal + detail_data[keys];
				detail_img.src = src;
			}
			if (keys === "bukti_pembayaran") {
				let newhref_bukti_bayar = detail_data[keys];
				bukti_bayar.href = href_awal_bukti_bayar + newhref_bukti_bayar;
			}
			if (keys === "surat_keterangan_miskin") {
				let newhref_sktm = detail_data[keys];
				sktm.href = href_awal_sktm + newhref_sktm;
			}
			if (keys === "surat_keterangan_penghasilan_keluarga") {
				let newhref_skpk = detail_data[keys];
				skpk.href = href_awal_skpk + newhref_skpk;
			}
			if (keys === "foto_rumah") {
				let newhref_foto_rumah = detail_data[keys];
				foto_rumah.href = href_awal_foto_rumah + newhref_foto_rumah;
			}

			if (keys === "prestasi_1") {
				if (detail_data[keys] === null) {
					prestasi_1.removeAttribute("href");
				} else {
					prestasi_1.href = href_awal_prestasi1 + detail_data[keys];
				}
			}
			if (keys === "prestasi_2") {
				if (detail_data[keys] === null) {
					prestasi_2.removeAttribute("href");
				} else {
					prestasi_2.href = href_awal_prestasi2 + detail_data[keys];
				}
			}
			if (keys === "prestasi_3") {
				if (detail_data[keys] === null) {
					prestasi_3.removeAttribute("href");
				} else {
					prestasi_3.href = href_awal_prestasi3 + detail_data[keys];
				}
			}
			if (keys === "prestasi_4") {
				if (detail_data[keys] === null) {
					prestasi_4.removeAttribute("href");
				} else {
					prestasi_4.href = href_awal_prestasi4 + detail_data[keys];
				}
			}
			if (keys === "prestasi_5") {
				if (detail_data[keys] === null) {
					prestasi_5.removeAttribute("href");
				} else {
					prestasi_5.href = href_awal_prestasi5 + detail_data[keys];
				}
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
				span_keys.textContent = value ? value : "-";
				if (detail_data["jalur_pendaftaran"] === "KTMSE") {
					section_opt.classList.add("active");
				}
			}
		});
		div_data_detail.scrollTop = 0;
	});
});

//Tutup Modal
const tombol_close = document.querySelector("div.close-btn a.detail");
tombol_close.addEventListener("click", () => {
	div_detail.classList.remove("active");
	block.classList.remove("active");
	detail_img.src = src_awal;
	section_opt.classList.remove("active");
});
