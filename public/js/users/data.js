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
        swal({
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
            swal({
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
        });
        if (!response.data.status) {
            swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
        emptyInfoUpdateUser();
        renderDataUserUpdate(response.data);
    } catch (error) {
        swal({
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
        });
        if (response.data.status) {
            swal("Delete user success !!!", "", "success");
            renderDataToTable(response.data.data);
            renderDataToListPage(response.data.data);
        } else {
            swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
    } catch (error) {
        swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}

async function changePassword() {
    try {
        const id = document.getElementById("id-user-js").value;
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
            swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
        const response = await axios({
            method: "patch",
            url: URLUser + `/${id}/password`,
            data: {
                old_password,
                new_password,
            },
        });
        if (response.data.status) {
            await swal("Change password success !!!", "", "success");
            location.replace(`/users/${id}`);
        } else {
            swal({
                title: "Some thing went wrong!!!",
                icon: "error",
                button: "OK",
            });
            return;
        }
    } catch (error) {
        swal({
            title: "Some thing went wrong!!!",
            icon: "error",
            button: "OK",
        });
        return;
    }
}

window.onload = function () {
    getInfoUserLogin();
    getList();
};
