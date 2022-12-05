function deleteBlogNotice(id, name) {
    swal({
        title: "Are you sure?",
        text: `Delete this blog: ${name} ?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            const response = deleteBlog(id);
        }
    });
}

function renderDataToTable(data) {
    let str = "";
    data.data.forEach(function (value, i) {
        str += `<tr>
            <th scope="row">${i + 1}</th>
            <td>${value.id}</td>
            <td>${value.title}</td>
            <td class="w-25"><img src="/${
                value.image
            }" class="w-50" alt="Avatar..."></td>
            <td>${formatDate(value.created_at)}</td>
            <td>${formatDate(value.updated_at)}</td>
            <td><a href="/blogs/${value.id}" style="margin-right: 10px;"><i
            class="fa-solid fa-pencil"></i></a><a href="#"
            onclick="deleteBlogNotice('${value.id}','${value.title}')"><i
            class="fa-solid fa-trash"></i></a></td>
    </tr>`;
    });
    document.getElementById("table-body-js").innerHTML = str;
}
