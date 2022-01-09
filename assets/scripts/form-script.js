// Membuat ukuran textarea dinamis
const textarea = document.querySelector("textarea");
textAreaAdjust(textarea);

function textAreaAdjust(element) {
    element.style.height = "1px";
    element.style.height = (25+element.scrollHeight)+"px";
}

// Disable value di prodi 2 jika sudah dipilih di prodi 1
prodi_pilihan_1.addEventListener("change", () => {
	const prodi_pilihan_2_option = prodi_pilihan_2.querySelectorAll("option");
	prodi_pilihan_2_option.forEach(
		(el) => (el.disabled = el.value == prodi_pilihan_1.value)
	);
});

// Masukkan nama file yang diupload di input file
const tombol_upload = document.querySelectorAll('input[type="file"]');

tombol_upload.forEach((e) => {
	e.addEventListener("change", () => {
		let input_target = document.querySelector(`input.text-file.${e.id}`);
		let file = e.value.split("\\");
		let file_name = file[file.length - 1];
		input_target.value = file_name;
	});
});
