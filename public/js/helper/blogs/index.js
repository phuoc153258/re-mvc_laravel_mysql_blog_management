function deleteBlogNotice(id, name) {
    const cookie = getCookie("X-localization");
    swal({
        title: cookie == "vie" ? "Bạn có chắc?" : "Are you sure?",
        text: cookie == "vie" ? `Xóa blog ${name}?` : `Delete blog ${name} ?`,
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
            <td>${value.username}</td>
            <td>${formatDate(value.created_at)}</td>
            <td>${formatDate(value.updated_at)}</td>
            <td><a style="margin-right: 10px;cursor: pointer;color: #0d6efd;"
            data-toggle="modal" data-target="#detail-blog-modal-js" onclick="getBlog('${
                value.id
            }')" ><i
            class="fa-solid fa-pencil"></i></a><a href="#"
            onclick="deleteBlogNotice('${value.id}','${value.title}')"><i
            class="fa-solid fa-trash"></i></a></td>
    </tr>`;
    });
    document.getElementById("table-body-js").innerHTML = str;
}

function renderDataDetailsBlog(data) {
    document.getElementById("show-image-blog-js").src = "/" + data.image;
    document.getElementById("id-blog-js").value = data.id;
    document.getElementById("title-blog-js").value = data.title;
    document.getElementById("sub_title-blog-js").value = data.sub_title;
    document.getElementById("slug-blog-js").value = data.slug;
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
    document.getElementById("slug-blog-js").value = "";
    document.getElementById("content-blog-js").value = "";
    document.getElementById("username-blog-js").value = "";
    document.getElementById("created_at-blog-js").value = "";
    document.getElementById("updated_at-blog-js").value = "";
}

function renderDataToTableUser(data) {
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
            <td><a style="margin-right: 10px;cursor: pointer;color: #0d6efd;"
             data-toggle="modal" data-target="#detail-blog-modal-js" onclick="getBlog('${
                 value.id
             }')"><i
            class="fa-solid fa-pencil"></i></a><a href="#"
            onclick="deleteBlogNotice('${value.id}','${value.title}')"><i
            class="fa-solid fa-trash"></i></a></td>
    </tr>`;
    });
    document.getElementById("table-body-js").innerHTML = str;
}

function renderDataDetailsBlogUser(data) {
    document.getElementById("show-image-blog-js").src = "/" + data.image;
    document.getElementById("id-blog-js").value = data.id;
    document.getElementById("title-blog-js").value = data.title;
    document.getElementById("sub_title-blog-js").value = data.sub_title;
    document.getElementById("slug-blog-js").value = data.slug;
    document.getElementById("content-blog-js").value = data.content;
    document.getElementById("username-blog-js").value = data.username;
    document.getElementById("created_at-blog-js").value = data.created_at;
    document.getElementById("updated_at-blog-js").value = data.updated_at;
}

function emptyDataDetailsBlogUser() {
    document.getElementById("show-image-blog-js").src = "";
    document.getElementById("id-blog-js").value = "";
    document.getElementById("title-blog-js").value = "";
    document.getElementById("sub_title-blog-js").value = "";
    document.getElementById("slug-blog-js").value = "";
    document.getElementById("content-blog-js").value = "";
    document.getElementById("created_at-blog-js").value = "";
    document.getElementById("updated_at-blog-js").value = "";
}

function emptyInfoCreateBlog() {
    document.getElementById("show-image-blog-create-js").src =
        "/image/image_default.png";
    document.getElementById("image-blog-create-js").value = "";
    document.getElementById("title-create-js").value = "";
    document.getElementById("sub_title-create-js").value = "";
    tinymce.get("content-create-js").setContent("");
}

function renderContentBlog(data) {
    tinymce.get("content-blog-js").setContent(data.content);
}

function emptyContentBlog() {
    tinymce.get("content-blog-js").setContent("");
}
