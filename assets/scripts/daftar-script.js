//Perpindahan antar form
const select_data = document.querySelectorAll("div.data");
const tombol_halaman = document.querySelectorAll("a.btn-page");
const tombol_halaman_kembali_ktmse = document.querySelector("a.btn-page3");
const tombol_halaman_lanjut_ktmse = document.querySelector("a.btn-page2");
const select_data_ktmse = document.querySelector("div.data.type2");

select_data.forEach((el) => {
	el.addEventListener("click", () => {
		disableform();
		let form_data_target = document.querySelector(`div.table-form.${el.id}`);
		el.classList.add("active");
		form_data_target.classList.add("active");
	});
});

tombol_halaman.forEach((btn) => {
	btn.addEventListener("click", () => {
		disableform();

		let form_data_target = document.querySelector(`div.table-form#${btn.id}`);
		let select_data_target = document.querySelector(`div.data#${btn.id}`);
		form_data_target.classList.add("active");
		select_data_target.classList.add("active");

		let destination = $("div.data");
		let destinationEl = $(destination);

		$("html").animate(
			{
				scrollTop: destinationEl.offset().top - 50,
			},
			0,
			"swing"
		);
	});
});

if (tombol_halaman_lanjut_ktmse && tombol_halaman_kembali_ktmse) {
	tombol_halaman_lanjut_ktmse.addEventListener("click", () => {
		disableform();
		select_data.forEach((el) => {
			el.style.display = "none";
		});
		select_data_ktmse.style.display = "block";
		select_data_ktmse.classList.add("active");
		let form_data_target = document.querySelector(
			`div.table-form#${tombol_halaman_lanjut_ktmse.id}`
		);
		form_data_target.classList.add("active");

		let destination = $("div.data");
		let destinationEl = $(destination);

		$("html").animate(
			{
				scrollTop: destinationEl.offset().top - 50,
			},
			0,
			"swing"
		);
	});

	tombol_halaman_kembali_ktmse.addEventListener("click", () => {
		disableform();
		select_data.forEach((el) => {
			el.style.display = "flex";
		});
		select_data_ktmse.style.display = "none";
		let form_data_target = document.querySelector(
			`div.table-form#${tombol_halaman_kembali_ktmse.id}`
		);
		let select_data_target = document.querySelector(
			`div.data#${tombol_halaman_kembali_ktmse.id}`
		);
		form_data_target.classList.add("active");
		select_data_target.classList.add("active");

		let destination = $("div.data");
		let destinationEl = $(destination);

		$("html").animate(
			{
				scrollTop: destinationEl.offset().top - 50,
			},
			0,
			"swing"
		);
	});
}

//function menghilangkan semua form
const disableform = () => {
	let select_data_active = document.querySelector("div.data.active");
	let form_data_active = document.querySelector("div.table-form.active");
	select_data_active.classList.remove("active");
	form_data_active.classList.remove("active");
};

//enable dan disable input text dari radio button lainnya
const radio_jpm = document.querySelectorAll("input.jpm_fixed");
const radioLainnya_jpm = document.getElementById(
	"jenis_pendidikan_menengah lainnya1"
);
const radio_jurusan = document.querySelectorAll("input.jurusan_fixed");
const radioLainnya_jurusan = document.getElementById("jurusan lainnya2");
const input_jpm = document.getElementById("jenis_pendidikan_menengah disabled");
const input_jurusan = document.getElementById("jurusan disabled");

radio_jpm.forEach((el) => {
	el.addEventListener("click", () => {
		input_jpm.value = "";
		input_jpm.disabled = true;
		input_jpm.classList.add("disabled");
	});
});
radioLainnya_jpm.addEventListener("click", () => {
	input_jpm.disabled = false;
	input_jpm.classList.remove("disabled");
	input_jpm.focus();
});

radio_jurusan.forEach((el) => {
	el.addEventListener("click", () => {
		input_jurusan.value = "";
		input_jurusan.disabled = true;
		input_jurusan.classList.add("disabled");
	});
});
radioLainnya_jurusan.addEventListener("click", () => {
	input_jurusan.disabled = false;
	input_jurusan.classList.remove("disabled");
	input_jurusan.focus();
});

// Alert Konfirmasi simpan data
const block = document.querySelector("div.block");
const tombol_simpan = document.querySelector("a.simpan-data");
const tombol_batal = document.querySelector("a.batal");
const kotak_alert = document.querySelector("div.confirm-alert");

tombol_simpan.addEventListener("click", () => {
	block.classList.add("active");
	kotak_alert.classList.add("active");
});
tombol_batal.addEventListener("click", () => {
	kotak_alert.classList.remove("active");
	block.classList.remove("active");
});
