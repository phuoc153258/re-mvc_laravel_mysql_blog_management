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
            <td class="w-25"><img src="${
                value.image
            }" class="w-50" alt="Avatar..."></td>
            <td>${value.username}</td>
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

function uploadImageBlog(event) {
    let preview = document.querySelector("#show-image-blog-create-js");
    var file = document.querySelector("#image-blog-create-js").files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}

function renderDataDetailsBlog(data) {
    document.getElementById("show-image-blog-js").src = "/" + data.image;
    document.getElementById("id-blog-js").value = data.id;
    document.getElementById("title-blog-js").value = data.title;
    document.getElementById("sub_title-blog-js").value = data.sub_title;
    document.getElementById("content-blog-js").value = data.content;
    document.getElementById("username-blog-js").value = data.username;
    document.getElementById("created_at-blog-js").value = data.created_at;
    document.getElementById("updated_at-blog-js").value = data.updated_at;
}

function emptyDataDetailsBlog() {
    document.getElementById("show-image-blog-js").src = "";
    document.getElementById("id-blog-js").value = "";
    document.getElementById("title-blog-js").value = "";
    document.getElementById("sub_title-blog-js").value = "";
    document.getElementById("content-blog-js").value = "";
    document.getElementById("username-blog-js").value = "";
    document.getElementById("created_at-blog-js").value = "";
    document.getElementById("updated_at-blog-js").value = "";
}
