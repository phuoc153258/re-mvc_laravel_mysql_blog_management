const URLUser = `/api/admin/users`;

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
                URLUser +
                `?search=${searchItem}&sort=${sortItem}&limit=${entriesItem}&page=${pageItem}`,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        renderDataToTable(response.data.data);
        renderDataToListPage(response.data.data);
    } catch (error) {
        await errorNoti();
        return;
    }
}

async function getUser(id) {
    try {
        const response = await axios({
            method: "get",
            url: URLUser + "/" + id,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            emptyInfoDetailsUser();
            renderDataDetailsUser(response.data);
            await getListRole(false);
            await getListPermission(false);
            renderListRoleUser(response.data.data.roles);
            renderListPermissionUser(response.data.data.permissions);
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        await errorNoti();
        return;
    }
}

async function updateInfoUser() {
    try {
        let userId = document.getElementById("id-user-update-js").value;
        let fullname = document.getElementById("fullname-user-update-js").value;
        let email = document.getElementById("email-user-update-js").value;
        if (
            userId == null ||
            userId == "" ||
            fullname == null ||
            fullname == "" ||
            email == null ||
            email == ""
        ) {
            await errorNoti();
            return;
        }
        const response = await axios({
            method: "put",
            url: URLUser + `/${userId}`,
            data: {
                fullname,
                email,
            },
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (!response.data.status) {
            await errorNoti();
            return;
        }
        await successNoti();
        hideModal();
        getList();
    } catch (error) {
        await errorNoti();
        return;
    }
}

async function deleteUser(id) {
    try {
        const response = await axios({
            method: "delete",
            url: URLUser + `/${id}`,
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
        await errorNoti();
        return;
    }
}

async function resetPassword() {
    try {
        const userId = window.location.pathname.split("/")[3];
        const response = await axios({
            method: "patch",
            url: URLUser + `/${userId}/password`,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            await successNoti();
            emptyInfoDetailsUser();
            renderDataDetailsUser(response.data);
            renderListRoleUser(response.data.data.roles);
            renderListPermissionUser(response.data.data.permissions);
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        await errorNoti();
        return;
    }
}

async function getListRole(is_paginate = true) {
    try {
        const response = await axios({
            method: "get",
            url: `/api/admin/roles` + `?is_paginate=${is_paginate}`,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        renderListRole(response.data.data);
    } catch (error) {
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}

async function getListPermission(is_paginate = true) {
    try {
        const response = await axios({
            method: "get",
            url: `/api/admin/permissions` + `?is_paginate=${is_paginate}`,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        renderListPermission(response.data.data);
    } catch (error) {
        await errorNoti();
        return;
    }
}

async function assignRoleUser(user_id, role_id) {
    try {
        const response = await axios({
            method: "post",
            url: `/api/admin/users/${user_id}/roles/${role_id}`,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        renderListRoleUser(response.data.data.roles);
    } catch (error) {}
}

async function removeRoleUser(user_id, role_id) {
    try {
        const response = await axios({
            method: "delete",
            url: `/api/admin/users/${user_id}/roles/${role_id}`,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        renderListRoleUser(response.data.data.roles);
    } catch (error) {}
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
