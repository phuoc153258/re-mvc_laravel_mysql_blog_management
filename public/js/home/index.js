function renderListViewBlog(data) {
    emptyListViewBlog();
    let str = "";

    data.data.forEach((element) => {
        str += `<div class="row mb-3">
                <div class="col-4"><img src="/${element.image}" alt="">
                </div>
                <div class="col-8">
                <a href="/details/${element.id}">
                <h2 class="post-title">${element.title}
                </h2>
                <h6 class="post-subtitle">${element.sub_title}</h6>
                <p class="post-meta">Posted by ${element.username} on ${element.created_at}</p></a></div></div>`;
    });
    document.getElementById("post-preview-blog-js").innerHTML = str;
}

function emptyListViewBlog() {
    document.getElementById("post-preview-blog-js").innerHTML = "";
}

function renderDataDetailBlog(data) {
    emptyDataDetailBlog();
    document.getElementById("title-detail-blog-js").innerHTML = data.title;
    document.getElementById("sub_title-detail-blog-js").innerHTML =
        data.sub_title;
    document.getElementById(
        "post-by-detail-blog-js"
    ).innerHTML = `Posted by ${data.username} on ${data.created_at}`;
    document.getElementById("content-detail-blog-js").innerHTML = data.content;
}

function emptyDataDetailBlog() {
    document.getElementById("title-detail-blog-js").innerHTML = "";
    document.getElementById("sub_title-detail-blog-js").innerHTML = "";
    document.getElementById("post-by-detail-blog-js").innerHTML = "";
    document.getElementById("content-detail-blog-js").innerHTML = "";
}
