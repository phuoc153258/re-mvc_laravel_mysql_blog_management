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
    } catch (error) {}
}
