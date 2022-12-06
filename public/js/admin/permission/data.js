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
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
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
            await swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
    } catch (error) {
        console.log(error);
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
            await swal("Create permission success !!!", "", "success");
            location.replace(`/admin/permissions/${response.data.data.id}`);
        } else {
            await swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
    } catch (error) {
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
            await swal("Update permission success !!!", "", "success");
            emptyDataDetailsPermission();
            renderDataDetailsPermission(response.data.data);
        } else {
            await swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
    } catch (error) {
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
            swal("Delete permission success !!!", "", "success");
            renderDataToTablePermission(response.data.data);
            renderDataToListPage(response.data.data);
        } else {
            await swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
    } catch (error) {
        return history.go(-1);
    }
}

async function getListPermission(is_paginate = true) {
    try {
        const response = await axios({
            method: "get",
            url: URLPermission + `?is_paginate=${is_paginate}`,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        renderListPermission(response.data.data);
    } catch (error) {
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}

async function givePermissionUser(user_id, permission_id) {
    try {
        const response = await axios({
            method: "post",
            url: `/api/admin/users/${user_id}/permissions/${permission_id}`,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        renderListPermissionUser(response.data.data.permissions);
    } catch (error) {}
}

async function revokePermissionUser(user_id, permission_id) {
    try {
        const response = await axios({
            method: "delete",
            url: `/api/admin/users/${user_id}/permissions/${permission_id}`,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        renderListPermissionUser(response.data.data.permissions);
    } catch (error) {}
}
