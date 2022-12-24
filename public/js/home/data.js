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
        renderCommentsBlog(response.data);
    } catch (error) {}
}

async function postCommentBlog(id = 0, parent_id = null) {
    try {
        const comment = tinymce.get("post-comment-js" + id);
        socket.emit("post-comment", {
            slug: window.location.pathname.split("/")[2],
            comment: comment.getContent(),
            token: getCookie("access_token"),
            parent_id,
        });
        comment.setContent("");
        hideTextAreaComment(id);
    } catch (error) {
        console.log(error);
    }
}

async function likeComment(id) {
    try {
        const user_id = document.getElementById("user-id-login-js").value;
        await socket.emit("like-comment", {
            id,
            user_id,
            token: getCookie("access_token"),
        });
    } catch (error) {}
}
