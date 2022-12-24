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
    listComment.innerHTML = str;
}

function itemComment(data) {
    return `<div class="card mt-3 mb-3" style="padding: 0px;" >
    ${itemCommentUser(data, 1)}
    </div>`;
}

function replyComment(data) {
    let str = "";
    data.replies.forEach((item) => {
        str += itemCommentUser(item);
    });
    return str;
}

function itemCommentUser(data, type = 0) {
    let str = "";
    if (type == 1) {
        str += `<div class="mt-2" id="replies-comment-js${
            data.id
        }">${replyComment(data)}</div>`;
    }
    return (
        `<div class="content border-top p-2"><div class="row">
            <div class="col-1"><img class="w-100 rounded-circle" id="avatar-user-comment-${
                data.id
            }" src="/${data.avatar}" alt="">
            </div><div class="col-11 mt-auto mb-auto"><h6 class="m-0"  id="fullname-user-comment-${
                data.id
            }" >${data.fullname}</h6>
            <p class="m-0" style="font-size: 12px !important;"  id="created_at-user-comment-${
                data.id
            }" >${data.created_at}</p>
            <div class="mt-2" style="font-size: 16px !important;" ><div  id="content-user-comment-${
                data.id
            }" >${data.content}</div><div class="footer d-flex"
            style="gap: 0 15px;align-items: center;"><div class="like border-right d-flex"
            style="gap: 0 5px;align-items: center;"><a onclick="likeComment(${
                data.id
            })" style="cursor: pointer;"  id="icon-user-comment-${data.id}" >${
            isLikeComment(data)
                ? '<i class="fa-solid fa-heart"></i>'
                : '<i class="fa-regular fa-heart"></i>'
        }</a>
            <p style="font-size: 16px;" class="p-0 m-0"  id="like-user-comment-${
                data.id
            }" >${data.likes.length}</p></div>
            <a style="font-size: 16px;cursor: pointer;" onclick="initializeTinyMce(${
                data.id
            },'${
            data.fullname
        }')"  >Reply</a><a href="#" style="font-size: 16px">Report</a>
            </div><div hidden  class="pt-3 pb-3" id="reply-comment-js${
                data.id
            }"><textarea  id="post-comment-js${
            data.id
        }"></textarea><div class="d-flex justify-content-end pt-2 pb-2" style="gap:0 10px;"><a style="cursor: pointer;" onclick="hideTextAreaComment(${
            data.id
        })" class="btn btn-link p-0" >Cancel</a><a style="cursor: pointer;" onclick="postCommentBlog(${
            data.id
        },${
            data.parent_id == null ? data.id : data.parent_id
        })" class="btn btn-link p-0">Reply</a></div></div> ` +
        str +
        "</div></div></div></div>"
    );
}

function isLikeComment(data) {
    const user_id = document.getElementById("user-id-login-js").value;
    for (const item of data.likes) {
        if (item.user_id == user_id) return true;
    }
    return false;
}

async function initializeTinyMce(id, fullname) {
    await tinymce.init({
        selector: `textarea#post-comment-js${id}`,
        height: "250",
    });
    showTextAreaComment(id);
    tinymce.get(`post-comment-js${id}`).setContent(`<p>@${fullname} </p>`);
}

function showTextAreaComment(id) {
    document.getElementById("reply-comment-js" + id).removeAttribute("hidden");
}

function hideTextAreaComment(id) {
    if (id != 0)
        document
            .getElementById("reply-comment-js" + id)
            .setAttribute("hidden", "");
}
