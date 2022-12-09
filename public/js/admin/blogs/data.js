const URLBlog = `/api/admin/blogs`;

async function getList() {
    try {
        let sortItem = document.getElementById("sort-js").value;
        let entriesItem = document.getElementById("entries-js").textContent;
        let searchItem = document.getElementById("input-search-user-js").value;
        let pageItem = document.getElementById("page-input-js").value;
        emptyTable();
        const response = await axios({
            method: "get",
            url:
                URLBlog +
                `?search=${searchItem}&sort=${sortItem}&limit=${entriesItem}&page=${pageItem}`,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        renderDataToTable(response.data.data);
        renderDataToListPage(response.data.data);
    } catch (error) {
        return location.replace(`/`);
    }
}

async function getBlog() {
    try {
        const response = await axios({
            method: "get",
            url: URLBlog + "/" + window.location.pathname.split("/")[3],
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            emptyDataDetailsBlog();
            renderDataDetailsBlog(response.data.data);
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        return history.go(-1);
    }
}

async function deleteBlog(id) {
    try {
        const response = await axios({
            method: "delete",
            url: URLBlog + `/${id}`,
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            await successNoti();
            renderDataToTable(response.data.data);
            renderDataToListPage(response.data.data);
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        return history.go(-1);
    }
}

async function createBlog() {
    try {
        const title = document.getElementById("title-create-js").value;
        const sub_title = document.getElementById("sub_title-create-js").value;
        const content = document.getElementById("content-create-js").value;
        const image = document.getElementById("image-blog-create-js").files[0];
        const user_id = document.getElementById(
            "user-id-navbar-hidden-js"
        ).value;
        let formData = new FormData();
        formData.append("title", title);
        formData.append("file", image);
        formData.append("sub_title", sub_title);
        formData.append("content", content);
        formData.append("user_id", user_id);
        let response = await axios.post(URLBlog, formData, {
            headers: {
                "Content-Type": "multipart/form-data",
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            await successNoti();
            location.replace(`/admin/blogs/${response.data.data.id}`);
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        return history.go(-1);
    }
}

async function updateBlog() {
    try {
        const id = document.getElementById("id-blog-js").value;
        const title = document.getElementById("title-blog-js").value;
        const sub_title = document.getElementById("sub_title-blog-js").value;
        const content = document.getElementById("content-blog-js").value;
        const response = await axios({
            method: "put",
            url: URLBlog + `/${id}`,
            data: { title, sub_title, content },
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            await successNoti();
            emptyDataDetailsBlog();
            renderDataDetailsBlog(response.data.data);
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        return history.go(-1);
    }
}
