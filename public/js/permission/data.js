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
