const URLUser = `/api/users/me`;

async function getUser() {
    try {
        const response = await axios({
            method: "get",
            url: URLUser,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            emptyInfoDetailsUser();
            renderDataDetailsUser(response.data);
            addEventUploadFile();
            renderEmailVerify(response.data.data);
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
        let fullname = document.getElementById("fullname-user-update-js").value;
        let email = document.getElementById("email-user-update-js").value;
        if (
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
            url: URLUser,
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
        emptyInfoDetailsUser();
        renderDataDetailsUser(response.data);
        swal("Update user success !!!", "", "success");
    } catch (error) {
        await errorNoti();
        return;
    }
}

async function uploadAvatar(event) {
    try {
        const selectedFile = event.target.files[0];
        let id = document.getElementById("id-user-update-js").value;
        let formData = new FormData();
        formData.append("file", selectedFile);
        let response = await axios.post(URLUser + `/avatar`, formData, {
            headers: {
                "Content-Type": "multipart/form-data",
                Authorization: getCookie("access_token"),
            },
        });
        document.getElementById("show-avatar-user-js").src =
            "/" + response.data.data.avatar;
        emptyInfoDetailsUser();
        renderDataDetailsUser(response.data);
        await successNoti("upload");
    } catch (error) {
        await errorNoti();
        return;
    }
}

async function changePassword() {
    try {
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
            await errorNoti();
            return;
        }
        const response = await axios({
            method: "patch",
            url: URLUser + `/password`,
            data: {
                old_password,
                new_password,
            },
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            await successNoti("update");
            location.replace(`/users`);
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        await errorNoti();
        return;
    }
}

async function sendMailVerify() {
    try {
        const response = await axios({
            method: "post",
            url: URLUser + `/verify-mail`,
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            await successNoti();
        } else {
            await errorNoti();
            return;
        }
    } catch (error) {
        await errorNoti();
        return;
    }
}
