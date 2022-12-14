const URLPermission = `/api/admin/permissions`;

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
                URLPermission +
                `?search=${searchItem}&sort=${sortItem}&limit=${entriesItem}&page=${pageItem}`,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        renderDataToTablePermission(response.data.data);
        renderDataToListPage(response.data.data);
    } catch (error) {
        await errorNoti();
        return;
    }
}

async function getPermission() {
    try {
        const response = await axios({
            method: "get",
            url: URLPermission + "/" + window.location.pathname.split("/")[3],
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            emptyDataDetailsPermission();
            renderDataDetailsPermission(response.data.data);
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        return history.go(-1);
    }
}

async function createPermission() {
    try {
        const name = document.getElementById("name-create-js").value;
        const response = await axios({
            method: "post",
            url: URLPermission,
            data: { name },
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            await successNoti();
            location.replace(`/admin/permissions/${response.data.data.id}`);
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        await errorNoti();
        return history.go(-1);
    }
}

async function updatePermission() {
    try {
        const id = document.getElementById("id-role-js").value;
        const name = document.getElementById("name-role-js").value;
        const response = await axios({
            method: "put",
            url: URLPermission + `/${id}`,
            data: { name },
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            await successNoti();
            emptyDataDetailsPermission();
            renderDataDetailsPermission(response.data.data);
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        await errorNoti();
        return history.go(-1);
    }
}

async function deletePermission(id) {
    try {
        const response = await axios({
            method: "delete",
            url: URLPermission + `/${id}`,
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            await successNoti();
            renderDataToTablePermission(response.data.data);
            renderDataToListPage(response.data.data);
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        await errorNoti();
        return history.go(-1);
    }
}
