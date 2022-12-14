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
        `<div class="content border-top p-2" id="comment-blog-js-${
            data.id
        }"><div class="row">
            <div class="col-1"><img class="w-100 rounded-circle" id="avatar-user-comment-${
                data.id
            }" src="/${data.avatar}" alt="">
            </div><div class="col-11 mt-auto mb-auto"><div class="d-flex align-items-center" style="gap:0 10px;"><div style="border-right: 1px solid #000;
            padding-right: 10px;"><h6 class="m-0"  id="fullname-user-comment-${
                data.id
            }" >${data.fullname}</h6>
            <p class="m-0" style="font-size: 12px !important;"  id="created_at-user-comment-${
                data.id
            }" >${
            data.created_at
        }</p></div><div><p class="mr-2"><b>Rating:</b><span style="font-size: 14px;margin-left: 5px;" id="review-comment-${
            data.id
        }-js">${data.rates.length} reviews</span></p>
        <div id="rate-comment-${data.id}-js">
        ${rateComment(data.rates, data.id)}
        </div>
         </div></div>
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
            },'${data.fullname}')">Reply</a>${sharePost(
            data.id
        )}<div class="dropdown">
        <a style="cursor: pointer;" data-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-ellipsis"></i>
        </a>
        <div class="dropdown-menu">
        ${showDeleteComment(data)}
          <a class="dropdown-item d-flex align-items-center" data-toggle="modal" data-target="#reportCommentModal" 
          style="gap: 0 10px;cursor: pointer;" onclick="setCommentIdToModal(${
              data.id
          })" ><i class="fa-solid fa-flag" style="font-size: 14px;"></i><span>Report</span></a>
        </div>
      </div>
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
    tinymce.get(`post-comment-js${id}`).setContent(`<p>@${fullname}&nbsp</p>`);
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

function rateComment(rates, id) {
    const user_id = document.getElementById("user-id-login-js").value;
    let averageRate = 0;
    let rateByUser = 0;
    rates.map((value) => {
        if (value.user_id == user_id) rateByUser = value.rate_number;
        averageRate += value.rate_number;
    });
    averageRate = averageRate / rates.length;
    let strStar = "";
    for (let index = 1; index <= 5; index++) {
        if (rateByUser != 0) {
            strStar += `<a style="color: #FFEA00;cursor: pointer;"><i class="${
                rateByUser >= index ? `fa-solid fa-star` : `fa-regular fa-star`
            }" onclick="submitRateComment(${id},${index})"></i></a>`;
        } else {
            strStar += `<a style="color: #FFEA00;cursor: pointer;"><i class="${
                averageRate >= index ? `fa-solid fa-star` : `fa-regular fa-star`
            }" onclick="submitRateComment(${id},${index})"></i></a>`;
        }
    }
    return strStar;
}

function sharePost(id) {
    let slug = window.location.href;
    let str = `<div class="dropdown">
    <a class="dropdown-item d-flex align-items-center p-0" style="gap: 0 10px;cursor: pointer;" 
    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><span>Share</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item">
        <div class="input-group">
            <input id="kt_clipboard_${id}" type="text" style="font-size: 14px;min-width: 400px;" class="form-control w-100" placeholder="URL..." value="${slug}" />
            <a class="btn btn-light-primary" onclick="copyURL(${id})">
                Copy
            </a>
    </div></a></div></div>`;
    return str;
}

function showDeleteComment(data) {
    const user_id = document.getElementById("user-id-login-js").value;
    if (data.user_id == user_id || data.blog_user_id == user_id)
        return `<a class="dropdown-item d-flex align-items-center" 
        style="gap: 0 10px;cursor: pointer;" onclick="deleteCommentNotice(${data.id})">
        <i class="fa-solid fa-trash" style="font-size: 14px;"></i><span>Delete</span></a>`;
    else return "";
}

function removeComment(id) {
    document.getElementById("comment-blog-js-" + id).remove();
}

function deleteCommentNotice(id) {
    const cookie = getCookie("X-localization");
    swal({
        title: cookie == "vie" ? "B???n c?? ch???c?" : "Are you sure?",
        text: cookie == "vie" ? `X??a comment n??y?` : `Delete this comment ?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            submitDeleteComment(id);
        }
    });
}

function renderListReport(data) {
    emptyListReport();
    let str = "";
    data.data.map((val) => {
        str += `<option value="${val.id}">${val.name}</option>`;
    });
    document.getElementById("list-report-js").innerHTML = str;
}

function emptyListReport() {
    document.getElementById("list-report-js").innerHTML = "";
}

function setCommentIdToModal(id) {
    emptyDataModalReport();
    document.getElementById("comment-id-report-js").value = id;
}

function emptyContentReport() {
    document.getElementById("content-report-js").value = "";
}

async function emptyDataModalReport() {
    emptyContentReport();
    await getReport();
}
