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
		let nisn = link.split('/');
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
const tabel_detail = document.querySelector("table.detail");
const div_detail = document.querySelector("div.detail-pendaftar");
const foto_detail = document.querySelector("img#detail-foto");
let detail_img = document.querySelector("img#detail-foto");
let src_awal = detail_img.src;
tombol_detail.forEach(el => {
el.addEventListener("click", () => {
	block.classList.add("active");
	div_detail.classList.add("active");
	let detail_data = data_obj[el.id];
	Object.keys(detail_data).forEach(keys => {
		if(keys === "pas_foto"){
			detail_img = document.querySelector("img#detail-foto");
			let src = detail_img.src.split("/");
			src[src.length-3] = "uploads/img";
			src[src.length-2] = "pas_foto"
			src[src.length-1] = detail_data[keys];
			src = src.join("/")
			detail_img.src = src;
		}else{
			if(detail_data["jalur_pendaftaran"] === "KTMSE"){
				let key = keys.split("_").map(el => el.charAt(0).toUpperCase()+el.slice(1)).join(" ");
				let tr = document.createElement("tr");
				let td_key = document.createElement("td");
				let td_colon = document.createElement("td");
				let td_values = document.createElement("td");
				let key_text = document.createTextNode(key);
				let colon_text = document.createTextNode(":");
				let values_text = document.createTextNode("-");
				if(detail_data[keys] !== null){
					values_text = document.createTextNode(detail_data[keys]);
				}
				td_key.appendChild(key_text);
				td_colon.appendChild(colon_text);
				td_values.appendChild(values_text);
				tr.appendChild(td_key);
				tr.appendChild(td_colon);
				tr.appendChild(td_values);
				tabel_detail.appendChild(tr);
			}else{
				if(keys !== "surat_keterangan_miskin" && keys !== "surat_keterangan_penghasilan_keluarga" && keys !== "foto_rumah") {
					let key = keys.split("_").map(el => el.charAt(0).toUpperCase()+el.slice(1)).join(" ");
					let tr = document.createElement("tr");
					let td_key = document.createElement("td");
					let td_colon = document.createElement("td");
					let td_values = document.createElement("td");
					let key_text = document.createTextNode(key);
					let colon_text = document.createTextNode(":");
					let values_text = document.createTextNode("-");
					if(detail_data[keys] !== null){
						values_text = document.createTextNode(detail_data[keys]);
					}
					td_key.appendChild(key_text);
					td_colon.appendChild(colon_text);
					td_values.appendChild(values_text);
					tr.appendChild(td_key);
					tr.appendChild(td_colon);
					tr.appendChild(td_values);
					tabel_detail.appendChild(tr);
				}
			}
		}
	});
});
});

//Tutup Modal
const tombol_close = document.querySelector('div.close-btn a.detail');
tombol_close.addEventListener("click",() => {
	div_detail.classList.remove("active");
	while(tabel_detail.hasChildNodes()){
		tabel_detail.removeChild(tabel_detail.lastChild);
	}
	detail_img.src = src_awal;
	block.classList.remove("active");
});
