async function getList() {
    try {
        const pageItem = getPageItem();
        const response = await axios({
            method: "get",
            url: "/api/blogs/views?page=" + pageItem.value,
        });
        if (response.data.status) {
            renderListViewBlog(response.data.data);
            renderDataToListPage(response.data.data);
        }
    } catch (error) {
        await errorNoti();
        return;
    }
}

async function getBlog() {
    try {
        const response = await axios({
            method: "get",
            url: "/api/blogs/views/" + window.location.pathname.split("/")[2],
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        renderDataDetailBlog(response.data.data);
    } catch (error) {
        return history.go(-1);
    }
}

async function checkLoginToComment() {
    const successLogin = document.getElementById(
        "comment-user-success-login-js"
    );
    const failedLogin = document.getElementById("comment-user-failed-login-js");
    try {
        const resposne = await getInfoUser();
        document.getElementById("user-id-login-js").value =
            resposne.data.data.id;
        if (resposne.data.status) successLogin.classList.remove("d-none");
    } catch (error) {
        failedLogin.classList.remove("d-none");
    }
}

async function getCommentBlog() {
    try {
        const response = await axios({
            method: "get",
            url: `/api/blogs/views/${
                window.location.pathname.split("/")[2]
            }/comments`,
        });
        renderCommentsBlog(response.data.data);
    } catch (error) {
        console.log(error);
    }
}

async function postCommentBlog() {
    try {
        const comment = tinymce.get("post-comment-js").getContent();
        const response = await axios({
            method: "post",
            url: `/api/blogs/views/${
                window.location.pathname.split("/")[2]
            }/comments`,
            data: {
                comment,
            },
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        document.getElementById("list-comment-js").innerHTML += itemComment(
            response.data.data
        );
        tinymce.get("post-comment-js").setContent("");
        await successNoti();
    } catch (error) {}
}

async function likeComment(id, index) {
    try {
        const user_id = document.getElementById("user-id-login-js").value;
        const response = await axios({
            method: "post",
            url: `/api/comments/${id}/users/${user_id}`,
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        const commentLikeIdx = document.getElementById(
            `comment-like-js-${index}`
        );
        commentLikeIdx.innerHTML = "";
        commentLikeIdx.innerHTML = itemDetailComment(response.data.data, index);
    } catch (error) {}
}
