function renderListPermission(permissions) {
    emptyListPermission();
    let permissionItem = document.getElementById("list-permission-js");
    const user_id = document.getElementById("id-user-update-js").value;
    let str = "";
    for (const permission of permissions) {
        str += `<a class="dropdown-item" onclick="givePermissionUser('${user_id}','${permission.id}')">${permission.name}</a>`;
    }
    permissionItem.innerHTML = str;
}

function emptyListPermission() {
    document.getElementById("list-permission-js").innerHTML = "";
}
