function emptyTable() {
    document.getElementById("table-body-js").innerHTML = "";
}

function emptyListPage() {
    document.getElementById("pagination-js").innerHTML = "";
}

function renderListPage(page, last_page) {
    let listPage = ``;
    for (let index = 1; index <= last_page; index++) {
        if (index == page)
            listPage += `<li class="page-item" onclick="setDataPageItem(${index})"><a class="page-link text-dark bg-primary">${index}</a></li>`;
        else
            listPage += `<li class="page-item" onclick="setDataPageItem(${index})"><a class="page-link">${index}</a></li>`;
    }
    return listPage;
}

function renderPrePage(page, last_page, cookie) {
    let prePage = ``;
    if (page > 1 && last_page > 1)
        prePage += `<li class="page-item" onclick="setDataPageItem(${
            page - 1
        })"><a class="page-link">${
            cookie == "vie" ? "Trước" : "Previous"
        }</a></li>`;
    return prePage;
}

function renderNextPage(page, last_page, cookie) {
    let nextPage = ``;
    if (page < last_page)
        nextPage += `<li class="page-item" onclick="setDataPageItem(${
            page + 1
        })"><a class="page-link">${
            cookie == "vie" ? "Tiếp theo" : "Next"
        }</a></li></ul></nav>`;
    return nextPage;
}

function emptyInfoDetailsUser() {
    document.getElementById("id-user-update-js").value = "";
    document.getElementById("fullname-user-update-js").value = "";
    document.getElementById("email-user-update-js").value = "";
}

function formatDate(date) {
    return new Date(date).toLocaleDateString();
}
function setDataEntriesItem(data) {
    let entriesItem = (document.getElementById("entries-js").innerHTML = data);
    getList();
}

function setDataSortItem(data, value) {
    let sortItem = document.getElementById("sort-js");
    sortItem.innerHTML = data;
    sortItem.value = value;
    getList();
}

function setDataPageItem(data) {
    let pageItem = document.getElementById("page-input-js");
    pageItem.value = data;
    getList();
}

function renderDataToListPage(data) {
    const cookie = getCookie("X-localization");
    let str = `<h5 id="total-entries-js">${
        cookie == "vie"
            ? `Tổng cộng: ${data.total} blog`
            : `Total: ${data.total} blog`
    } </h5>
        <nav aria-label="Page navigation example">
            <ul class="pagination">`;
    str += renderPrePage(data.page, data.last_page, cookie);
    str += renderListPage(data.page, data.last_page);
    str += renderNextPage(data.page, data.last_page, cookie);
    document.getElementById("pagination-js").innerHTML = str;
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

function getUserIdHidden() {
    return document.getElementById("user-id-navbar-hidden-js").value;
}
