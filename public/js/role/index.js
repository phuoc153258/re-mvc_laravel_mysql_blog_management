function renderListRole(roles) {
    console.log(roles);
    emptyListRole();
    let roleItem = document.getElementById("list-role-js");

    let str = "";
    for (const role of roles) {
        str += `<a class="dropdown-item">${role.name}</a>`;
    }
    roleItem.innerHTML = str;
}

function emptyListRole() {
    document.getElementById("list-role-js").innerHTML = "";
}
