const URLRole = `/api/roles`;

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
