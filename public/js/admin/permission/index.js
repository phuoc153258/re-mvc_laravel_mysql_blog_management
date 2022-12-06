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

function deletePermissionNotice(id) {
    swal({
        title: "Are you sure?",
        text: `Delete this permission ?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            const response = deletePermission(id);
        }
    });
}

function renderDataToTablePermission(data) {
    let str = "";
    data.data.forEach(function (value, i) {
        str += `<tr>
            <th scope="row">${i + 1}</th>
            <td>${value.id}</td>
            <td>${value.name}</td>
            <td>${formatDate(value.created_at)}</td>
            <td>${formatDate(value.updated_at)}</td>
            <td><a href="/admin/permissions/${
                value.id
            }" style="margin-right: 10px;"><i
            class="fa-solid fa-pencil"></i></a><a style="color: #0d6efd;"
            onclick="deletePermissionNotice('${value.id}')"><i
            class="fa-solid fa-trash"></i></a></td>
    </tr>`;
    });
    document.getElementById("table-body-js").innerHTML = str;
}

function renderDataDetailsPermission(data) {
    document.getElementById("id-role-js").value = data.id;
    document.getElementById("name-role-js").value = data.name;
    document.getElementById("guard-name-role-js").value = data.guard_name;
    document.getElementById("created_at-role-js").value = data.created_at;
    document.getElementById("updated_at-role-js").value = data.updated_at;
}

function emptyDataDetailsPermission() {
    document.getElementById("id-role-js").value = "";
    document.getElementById("name-role-js").value = "";
    document.getElementById("guard-name-role-js").value = "";
    document.getElementById("created_at-role-js").value = "";
    document.getElementById("updated_at-role-js").value = "";
}
