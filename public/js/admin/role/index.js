function deleteRoleNotice(id, name) {
    const cookie = getCookie("X-localization");
    swal({
        title: cookie == "vie" ? "Bạn có chắc?" : "Are you sure?",
        text: cookie == "vie" ? `Xóa role ${name}?` : `Delete role ${name} ?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            const response = deleteRole(id);
        }
    });
}

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

function renderDataToTableRole(data) {
    let str = "";
    data.data.forEach(function (value, i) {
        str += `<tr>
            <th scope="row">${i + 1}</th>
            <td>${value.id}</td>
            <td>${value.name}</td>
            <td>${formatDate(value.created_at)}</td>
            <td>${formatDate(value.updated_at)}</td>
            <td><a href="/admin/roles/${
                value.id
            }" style="margin-right: 10px;"><i
            class="fa-solid fa-pencil"></i></a><a style="color: #0d6efd;"
            onclick="deleteRoleNotice('${value.id}', '${value.name}')"><i
            class="fa-solid fa-trash"></i></a></td>
    </tr>`;
    });
    document.getElementById("table-body-js").innerHTML = str;
}

function renderDataDetailsRole(data) {
    document.getElementById("id-role-js").value = data.id;
    document.getElementById("name-role-js").value = data.name;
    document.getElementById("guard-name-role-js").value = data.guard_name;
    document.getElementById("created_at-role-js").value = data.created_at;
    document.getElementById("updated_at-role-js").value = data.updated_at;
}

function emptyDataDetailsRole() {
    document.getElementById("id-role-js").value = "";
    document.getElementById("name-role-js").value = "";
    document.getElementById("guard-name-role-js").value = "";
    document.getElementById("created_at-role-js").value = "";
    document.getElementById("updated_at-role-js").value = "";
}
