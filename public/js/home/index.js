function renderListViewBlog(data) {
    emptyListViewBlog();
    let str = "";

    data.data.forEach((element) => {
        str += `<div class="row">
                <div class="col-4"><img src="/${element.image}" alt="">
                </div>
                <div class="col-8">
                <a href="/blogs/views/${element.id}">
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
