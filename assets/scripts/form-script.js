//Perpindahan antar form
const select_data = document.querySelectorAll("div.data");
const tombol_halaman = document.querySelectorAll("a.btn-page");

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

// API untuk Provinsi dan Kota/Kabupaten Asal Sekolah
// http://api.iksgroup.co.id/lokasi/demolokasi
const render = createwidgetlokasi(
	"provinsi_asal_sekolah",
	"kota_kabupaten_asal_sekolah",
	"kecamatan_asal_sekolah",
	"kelurahan_asal_sekolah"
);

// Alert Konfirmasi simpan data
const block = document.querySelector("div.block");
const tombol_simpan = document.querySelector("a.simpan-data");
const tombol_batal = document.querySelector("a.batal-simpan");
const kotak_alert = document.querySelector("div.confirm-alert");

tombol_simpan.addEventListener("click", () => {
	block.classList.add("active");
	kotak_alert.classList.add("active");
});
tombol_batal.addEventListener("click", () => {
	kotak_alert.classList.remove("active");
	block.classList.remove("active");
});

//scroll-atas
$(window).scroll(function () {
	let wscroll = $(this).scrollTop();
	if (wscroll > 150) {
		$("div.scroll").addClass("show");
	} else {
		$("div.scroll").removeClass("show");
	}
});
$(".scroll").on("click", function () {
	let destination = $("div.data");
	let destinationEl = $(destination);

	$("html").animate(
		{
			scrollTop: destinationEl.offset().top - 50,
		},
		1000,
		"swing"
	);

	event.preventDefault();
});

//Input File
const tombol_upload = document.querySelectorAll('input[type="file"]');

tombol_upload.forEach((e) => {
	e.addEventListener("change", () => {
		let input_target = document.querySelector(`input.text-file.${e.id}`);
		let file = e.value.split("\\");
		let file_name = file[file.length - 1];
		input_target.value = file_name;
	});
});
