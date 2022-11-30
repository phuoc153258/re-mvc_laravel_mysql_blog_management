async function loginUser() {
    try {
        const username = document.getElementById("username-login-js").value;
        const password = document.getElementById("password-login-js").value;
        const response = await axios({
            method: "post",
            url: "/api/auth/login",
            data: {
                username,
                password,
            },
        });
        if (response.data.status) {
            setCookie("access_token", "Bearer " + response.data.data.token, 1);
            await swal("Login success !!!", "", "success");
            location.replace(`/users`);
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
            url: URLUser + "/me",
            data: {},
            headers: {
                Authorization: getCookie("access_token"),
            },
        });
        if (response.data.status) renderInfoUserToNavbar(response.data.data);
        else {
            location.replace(`/`);
        }
    } catch (error) {
        location.replace(`/`);
        return;
    }
}
