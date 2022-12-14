const URLRole = `/api/admin/roles`;

async function getList(is_paginate = true) {
    try {
        let sortItem = document.getElementById("sort-js").value;
        let entriesItem = document.getElementById("entries-js").textContent;
        let searchItem = document.getElementById("input-search-user-js").value;
        let pageItem = document.getElementById("page-input-js").value;
        emptyTable();
        const response = await axios({
            method: "get",
            url:
                URLRole +
                `?search=${searchItem}&sort=${sortItem}&limit=${entriesItem}&page=${pageItem}`,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        renderDataToTableRole(response.data.data);
        renderDataToListPage(response.data.data);
    } catch (error) {
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}

async function getRole(id) {
    try {
        const response = await axios({
            method: "get",
            url: URLRole + "/" + id,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            emptyDataDetailsRole();
            renderDataDetailsRole(response.data.data);
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        return history.go(-1);
    }
}

async function createRole() {
    try {
        const name = document.getElementById("name-create-js").value;
        const response = await axios({
            method: "post",
            url: URLRole,
            data: { name },
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            await successNoti();
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

async function updateRole() {
    try {
        const id = document.getElementById("id-role-js").value;
        const name = document.getElementById("name-role-js").value;
        const response = await axios({
            method: "put",
            url: URLRole + `/${id}`,
            data: { name },
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            await successNoti();
            emptyDataDetailsRole();
            renderDataDetailsRole(response.data.data);
            hideModal();
            await getList();
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        return history.go(-1);
    }
}

async function deleteRole(id) {
    try {
        const response = await axios({
            method: "delete",
            url: URLRole + `/${id}`,
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            await successNoti();
            renderDataToTableRole(response.data.data);
            renderDataToListPage(response.data.data);
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        return history.go(-1);
    }
}
