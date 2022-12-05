function renderListRole(roles) {
    emptyListRole();
    let roleItem = document.getElementById("list-role-js");
    const user_id = document.getElementById("id-user-update-js").value;
    let str = "";
    for (const role of roles) {
        str += `<a class="dropdown-item" onclick="assignRoleUser('${user_id}','${role.id}')" >${role.name}</a>`;
    }
    roleItem.innerHTML = str;
}

function emptyListRole() {
    document.getElementById("list-role-js").innerHTML = "";
}
