function getSortItem() {
    return document.getElementById("sort-js");
}

function getEntriesItem() {
    return document.getElementById("entries-js");
}

function getSearchItem() {
    return document.getElementById("input-search-user-js");
}

function getPageItem() {
    return document.getElementById("page-input-js");
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
