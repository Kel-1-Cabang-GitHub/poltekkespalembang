//Perpindahan form data pribadi ke form data sekolah
const select_data_sekolah = document.querySelector("div.data.sekolah");
const select_data_pribadi = document.querySelector("div.data.pribadi");
const form_data_sekolah = document.querySelector("div.table-form.sekolah");
const form_data_siswa = document.querySelector("div.table-form.siswa");

select_data_pribadi.addEventListener('click', () => {
    select_data_sekolah.classList.remove("active");
    select_data_pribadi.classList.add("active");
    form_data_sekolah.classList.remove("active");
    form_data_siswa.classList.add("active");
});
select_data_sekolah.addEventListener('click', () => {
    select_data_pribadi.classList.remove("active");
    select_data_sekolah.classList.add("active");
    form_data_siswa.classList.remove("active");
    form_data_sekolah.classList.add("active");
});


//enable dan disable input text dari radio button lainnya
const radio_jpm = document.querySelectorAll("input.jpm_fixed");
const radioLainnya_jpm = document.getElementById("jenis_pendidikan_menengah lainnya1");
const radio_jurusan = document.querySelectorAll("input.jurusan_fixed");
const radioLainnya_jurusan = document.getElementById("jurusan lainnya2");
const input_jpm = document.getElementById("jenis_pendidikan_menengah disabled");
const input_jurusan = document.getElementById("jurusan disabled");

radio_jpm.forEach(el => {
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

radio_jurusan.forEach(el => {
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

// API Nama Daerah
let render = createwidgetlokasi("provinsi", "kabupaten", "kecamatan", "kelurahan");

//script input file
// document.getElementById("pas_foto").onchange = function(){
//     document.getElementById("upload_file").value = this.value;
// };