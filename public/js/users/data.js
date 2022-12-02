const URLUser = `/api/users`;

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
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}

async function getUser() {
    try {
        const response = await axios({
            method: "get",
            url: URLUser + "/" + window.location.pathname.split("/")[2],
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            emptyInfoDetailsUser();
            renderDataDetailsUser(response.data);
            addEventUploadFile();
            addHrefChangePassword(response.data.data.id);
            renderListRoleUser(response.data.data.roles);
            renderListPermissionUser(response.data.data.permissions);
        } else {
            await swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
    } catch (error) {
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
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
            await swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
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
            await swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
        emptyInfoDetailsUser();
        renderDataDetailsUser(response.data);
        swal("Update user success !!!", "", "success");
    } catch (error) {
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
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
            swal("Delete user success !!!", "", "success");
            renderDataToTable(response.data.data);
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
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}

async function changePassword() {
    try {
        const userId = window.location.pathname.split("/")[2];
        const old_password = document.getElementById(
            "old-password-user-js"
        ).value;
        const new_password = document.getElementById(
            "new-password-user-js"
        ).value;
        const re_password = document.getElementById(
            "re-password-user-js"
        ).value;

        if (new_password != re_password) {
            await swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
        const response = await axios({
            method: "patch",
            url: URLUser + `/${userId}/password`,
            data: {
                old_password,
                new_password,
            },
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            await swal("Change password success !!!", "", "success");
            location.replace(`/users/${userId}`);
        } else {
            await swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
    } catch (error) {
        await swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}
