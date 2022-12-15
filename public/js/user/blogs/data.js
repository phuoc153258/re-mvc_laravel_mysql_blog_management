const URLBlog = `/api/blogs`;

async function getList() {
    try {
        const sortItem = getSortItem();
        const entriesItem = getEntriesItem();
        const searchItem = getSearchItem();
        const pageItem = getPageItem();
        const userId = getUserIdHidden();
        emptyTable();
        const response = await axios({
            method: "get",
            url:
                URLBlog +
                `?search=${searchItem.value}&sort=${sortItem.value}&limit=${entriesItem.textContent}&page=${pageItem.value}`,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        renderDataToTableUser(response.data.data);
        renderDataToListPage(response.data.data);
    } catch (error) {
        return location.replace(`/`);
    }
}

async function getBlog(id) {
    try {
        const response = await axios({
            method: "get",
            url: URLBlog + "/" + id,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            emptyDataDetailsBlogUser();
            emptyContentBlog();
            renderDataDetailsBlogUser(response.data.data);
            renderContentBlog(response.data.data);
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
        const userId = getUserIdHidden();
        const response = await axios({
            method: "delete",
            url: URLBlog + `/${id}?condition=${userId}`,
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            await successNoti("delete");
            renderDataToTableUser(response.data.data);
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
        const content = tinymce.get("content-create-js").getContent();
        const image = document.getElementById("image-blog-create-js").files[0];
        let formData = new FormData();
        formData.append("title", title);
        formData.append("file", image);
        formData.append("sub_title", sub_title);
        formData.append("content", content);
        let response = await axios.post(URLBlog, formData, {
            headers: {
                "Content-Type": "multipart/form-data",
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            await successNoti("create");
            hideModal();
            getList();
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
        const content = tinymce.get("content-blog-js").getContent();
        const response = await axios({
            method: "put",
            url: URLBlog + `/${id}`,
            data: { title, sub_title, content },
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            await successNoti("update");
            hideModal();
            getList();
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        return history.go(-1);
    }
}
