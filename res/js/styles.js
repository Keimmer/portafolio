function openMenu() {
    var menu = document.getElementById("menu");
    if (menu.className === "dropDownMenu") {
        menu.className = "openDropDownMenu";
    } else {
        menu.className = "dropDownMenu";
    }
}