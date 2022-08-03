const _menu_mobile = document.getElementById("_menu_mobile");
const menu = document.querySelector(".menu");
function remove_menu_mobile() {
    menu.classList.remove("hidden");

}
if (_menu_mobile) {
    _menu_mobile.addEventListener("click", remove_menu_mobile);
}



const open_menu_mobile = document.getElementById("open_menu_mobile");
function showMenu() {
    menu.classList.add("hidden");
}
if (open_menu_mobile) {
    open_menu_mobile.addEventListener("click", showMenu);
}
