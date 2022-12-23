function renderListViewBlog(data) {
    emptyListViewBlog();
    let str = "";

    data.data.forEach((element) => {
        str += `<div class="row mb-3">
                <div class="col-4"><img src="/${element.image}" style="max-width: 300px;" alt="">
                </div>
                <div class="col-8">
                <a href="/details/${element.slug}">
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
    document.getElementById("blog-id-details-js").value = data.id;
}

function emptyDataDetailBlog() {
    document.getElementById("title-detail-blog-js").innerHTML = "";
    document.getElementById("sub_title-detail-blog-js").innerHTML = "";
    document.getElementById("post-by-detail-blog-js").innerHTML = "";
    document.getElementById("content-detail-blog-js").innerHTML = "";
}

function renderCommentsBlog(data) {
    let listComment = document.getElementById("list-comment-js");
    let str = "";
    data.data.forEach((value) => {
        str += itemComment(value);
    });
    if (str == "")
        return (listComment.innerHTML = `<h5 class="mt-4">This blog has no comments !!!</h5>`);
    listComment.innerHTML = str;
}

function itemComment(data) {
    return `<div class="card mt-3 mb-3" style="padding: 0px;" id="comment-like-js-${
        data.id
    }">
    ${itemDetailComment(data)}
    </div>`;
}

function itemDetailComment(data) {
    return `<div class="card-body p-2"><div class="content"><div class="row">
    <div class="col-1"><img class="w-100 rounded-circle"
    src="/${data.avatar}" alt="">
    </div><div class="col-11 mt-auto mb-auto">
    <h6 class="m-0">${data.fullname}</h6>
    <p class="m-0" style="font-size: 12px !important;">${data.created_at}</p>
    <div class="mt-2" style="font-size: 16px !important;">
    <p >${data.content}</p>
    <div class="footer d-flex" style="gap: 0 15px;align-items: center;">
    <div class="like border-right d-flex" style="gap: 0 5px;align-items: center;">
    <a onclick="likeComment(${data.id})" style="cursor: pointer;" >${
        isLikeComment(data)
            ? '<i class="fa-solid fa-heart"></i>'
            : '<i class="fa-regular fa-heart"></i>'
    }</a>
    <p style="font-size: 16px;" class="p-0 m-0">${data.likes.length}</p></div>
    <a href="#" style="font-size: 16px">Reply</a>
    <a href="#" style="font-size: 16px">Report</a></div></div> </div></div></div></div>`;
}

function isLikeComment(data) {
    const user_id = document.getElementById("user-id-login-js").value;
    for (const item of data.likes) {
        if (item.user_id == user_id) return true;
    }
    return false;
}
