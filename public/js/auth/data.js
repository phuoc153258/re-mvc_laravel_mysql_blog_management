const URLAuth = "/api/auth";

async function loginUser() {
    try {
        const username = document.getElementById("username-login-js").value;
        const password = document.getElementById("password-login-js").value;
        const response = await axios({
            method: "post",
            url: URLAuth + "/login",
            data: {
                username,
                password,
            },
        });
        if (response.data.status) {
            setCookie("access_token", "Bearer " + response.data.data.token, 1);
            await swal("Login success !!!", "", "success");
            location.replace(`/`);
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

async function getInfoUserLogin() {
    try {
        const response = await axios({
            method: "get",
            url: "/api/users/me",
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) renderInfoUserToNavbar(response.data.data);
        else {
            location.replace(`/`);
            return;
        }
    } catch (error) {
        location.replace(`/`);
        return;
    }
}

async function logoutUser() {
    try {
        const response = await axios({
            method: "post",
            url: URLAuth + "/logout",
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) {
            deleteCookie("access_token");
            await swal("Logout success !!!", "", "success");
            location.replace(`/`);
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
