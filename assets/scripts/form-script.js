const select_data_sekolah = document.querySelector("div.data.sekolah");
const select_data_pribadi = document.querySelector("div.data.pribadi");
const form_data_sekolah = document.querySelector("div.table-form.sekolah");
const form_data_siswa = document.querySelector("div.table-form.siswa");

select_data_pribadi.addEventListener('click',() => {
    select_data_sekolah.classList.remove("active");
    select_data_pribadi.classList.add("active");
    form_data_sekolah.classList.remove("active");
    form_data_siswa.classList.add("active");
});
select_data_sekolah.addEventListener('click',() => {
    select_data_pribadi.classList.remove("active");
    select_data_sekolah.classList.add("active");
    form_data_siswa.classList.remove("active");
    form_data_sekolah.classList.add("active");
});