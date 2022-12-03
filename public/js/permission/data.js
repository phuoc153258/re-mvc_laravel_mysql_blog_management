const URLPermission = `/api/permissions`;

async function getListPermission() {
    try {
        const response = await axios({
            method: "get",
            url: URLPermission + `?is_paginate=false`,
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
            url: `/api/users/${user_id}/permissions/${permission_id}`,
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
            url: `/api/users/${user_id}/permissions/${permission_id}`,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        renderListPermissionUser(response.data.data.permissions);
    } catch (error) {}
}
