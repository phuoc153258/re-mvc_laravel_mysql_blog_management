function deleteUserNotice(id, name) {
    swal({
        title: "Are you sure?",
        text: `Delete this user: ${name} ?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            const response = deleteUser(id);
        }
    });
}

function renderDataToTable(data) {
    let str = "";
    data.data.forEach(function (value, i) {
        str += `<tr>
            <th scope="row">${i + 1}</th>
            <td>${value.id}</td>
            <td>${value.username}</td>
            <td><img src="${value.avatar}" class="w-50" alt="Avatar..."></td>
            <td>${formatDate(value.created_at)}</td>
            <td>${formatDate(value.updated_at)}</td>
            <td><a href="/users/${value.id}" style="margin-right: 10px;"><i
            class="fa-solid fa-pencil"></i></a><a href="#"
            onclick="deleteUserNotice('${value.id}','${value.username}')"
            data-toggle="modal" data-target="#exampleModal"><i
            class="fa-solid fa-trash"></i></a></td>
            </tr>`;
    });
    document.getElementById("table-body-js").innerHTML = str;
}

function renderDataUserUpdate(data) {
    let id = (document.getElementById("id-user-update-js").value =
        data.data.id);
    let username = (document.getElementById("username-user-update-js").value =
        data.data.username);
    let fullname = (document.getElementById("fullname-user-update-js").value =
        data.data.fullname);
    let email = (document.getElementById("email-user-update-js").value =
        data.data.email);
    let created_at = (document.getElementById(
        "created_at-user-update-js"
    ).value = data.data.created_at);
    let updated_at = (document.getElementById(
        "updated_at-user-update-js"
    ).value = data.data.updated_at);
}
