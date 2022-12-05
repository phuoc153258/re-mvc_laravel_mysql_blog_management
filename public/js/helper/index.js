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

function renderPrePage(page, last_page) {
    let prePage = ``;
    if (page > 1 && last_page > 1)
        prePage += `<li class="page-item" onclick="setDataPageItem(${
            page - 1
        })"><a class="page-link">Previous</a></li>`;
    return prePage;
}

function renderNextPage(page, last_page) {
    let nextPage = ``;
    if (page < last_page)
        nextPage += `<li class="page-item" onclick="setDataPageItem(${
            page + 1
        })"><a class="page-link">Next</a></li></ul></nav>`;
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
    let str = `<h5 id="total-entries-js">Total: ${data.total} entries</h5>
        <nav aria-label="Page navigation example">
            <ul class="pagination">`;
    str += renderPrePage(data.page, data.last_page);
    str += renderListPage(data.page, data.last_page);
    str += renderNextPage(data.page, data.last_page);
    document.getElementById("pagination-js").innerHTML = str;
}

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(";");
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

var deleteCookie = function (name) {
    document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:01 GMT;";
};

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
