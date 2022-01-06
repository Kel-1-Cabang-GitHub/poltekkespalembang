const block = document.querySelector("div.block");
const ca_logout = document.querySelector("a#ca-logout");
const tombol_batal = document.querySelector("a#ca-cancel");
const kotak_alert = document.querySelector("div.confirm-alert");
const logout = document.querySelector("a#logout");

logout.addEventListener("click", () =>{
    block.classList.add("active");
    kotak_alert.classList.add("active");
});
tombol_batal.addEventListener("click",() => {
    kotak_alert.classList.remove("active");
    block.classList.remove("active");
});
