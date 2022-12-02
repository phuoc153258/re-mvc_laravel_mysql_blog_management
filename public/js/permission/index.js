function renderListPermission(permissions) {
    emptyListPermission();
    let permissionItem = document.getElementById("list-permission-js");

    let str = "";
    for (const permission of permissions) {
        str += `<a class="dropdown-item">${permission.name}</a>`;
    }
    permissionItem.innerHTML = str;
}

function emptyListPermission() {
    document.getElementById("list-permission-js").innerHTML = "";
}
