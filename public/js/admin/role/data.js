const URLRole = `/api/admin/roles`;

async function getListRole() {
    try {
        const response = await axios({
            method: "get",
            url: URLRole + `?is_paginate=false`,
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
